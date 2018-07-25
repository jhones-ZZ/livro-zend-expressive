<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\TestDoctrineConnectionHandler;
use Psr\Container\ContainerInterface;

class TestDoctrineConnectionHandlerFactory
{
    public function __invoke(ContainerInterface $container): TestDoctrineConnectionHandler
    {
        $em = $container->get('Doctrine\ORM\EntityManager');
        return new TestDoctrineConnectionHandler($em);
    }
}
