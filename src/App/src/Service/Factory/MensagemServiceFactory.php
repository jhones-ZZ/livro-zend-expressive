<?php

declare(strict_types=1);

namespace App\Service\Factory;

use App\Service\MensagemService;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

/**
 * Class MensagemServiceFactory
 * @package App\Service\Factory
 */
class MensagemServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagemService
     */
    public function __invoke(ContainerInterface $container): MensagemService
    {
        $em = $container->get(EntityManager::class);
        return new MensagemService($em);
    }
}
