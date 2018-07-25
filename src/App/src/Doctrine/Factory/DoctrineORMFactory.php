<?php

declare(strict_types=1);

namespace App\Doctrine\Factory;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Interop\Container\ContainerInterface;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

class DoctrineORMFactory
{
    public function __invoke(ContainerInterface $container): EntityManager
    {
        $config = $container->has('config') ? $container->get('config') : [];
        $proxyDir = (isset($config['doctrine']['connection']['orm']['proxy_dir'])) ?
            $config['doctrine']['connection']['orm']['proxy_dir'] : 'data/cache/EntityProxy';
        $proxyNamespace = (isset($config['doctrine']['connection']['orm']['proxy_namespace'])) ?
            $config['doctrine']['connection']['orm']['proxy_namespace'] : 'EntityProxy';
        $autoGenerateProxyClasses = (isset($config['doctrine']['connection']['orm']['auto_generate_proxy_classes'])) ?
            $config['doctrine']['connection']['orm']['auto_generate_proxy_classes'] : true;
        $underscoreNamingStrategy = (isset($config['doctrine']['connection']['orm']['underscore_naming_strategy'])) ?
            $config['doctrine']['connection']['orm']['underscore_naming_strategy'] : true;

        $doctrine = new Configuration();
        $doctrine->setProxyDir($proxyDir);
        $doctrine->setProxyNamespace($proxyNamespace);
        $doctrine->setAutoGenerateProxyClasses($autoGenerateProxyClasses);
        if ($underscoreNamingStrategy) {
            $doctrine->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        AnnotationRegistry::registerFile(__DIR__ . '/../../../../../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
        $driver = new AnnotationDriver(
            new AnnotationReader(),
            [__DIR__ . '/../../../src/Entity']
        );
        $doctrine->setMetadataDriverImpl($driver);

        return EntityManager::create($config['doctrine']['connection']['orm_default'], $doctrine);
    }
}
