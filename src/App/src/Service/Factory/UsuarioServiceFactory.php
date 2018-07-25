<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\UsuarioService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

/**
 * Class UsuarioServiceFactory
 * @package App\Service\Factory
 */
class UsuarioServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuarioService
     */
    public function __invoke(ContainerInterface $container): UsuarioService
    {
        $em = $container->get(EntityManager::class);
        return new UsuarioService($em);
    }
}
