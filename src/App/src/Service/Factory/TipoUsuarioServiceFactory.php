<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\TipoUsuarioService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

/**
 * Class TipoUsuarioServiceFactory
 * @package App\Service\Factory
 */
class TipoUsuarioServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return TipoUsuarioService
     */
    public function __invoke(ContainerInterface $container): TipoUsuarioService
    {
        $em = $container->get(EntityManager::class);
        return new TipoUsuarioService($em);
    }
}
