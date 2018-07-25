<?php

declare(strict_types=1);

namespace App\Handler\Factory\TipoUsuario;

use App\Handler\TipoUsuario\TipoUsuarioListarUmHandler;
use Interop\Container\ContainerInterface;

/**
 * Class TipoUsuarioListarUmHandlerFactory
 * @package App\Handler\Factory\TipoUsuario
 */
class TipoUsuarioListarUmHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TipoUsuarioListarUmHandler
     */
    public function __invoke(ContainerInterface $container): TipoUsuarioListarUmHandler
    {
        return new TipoUsuarioListarUmHandler($container);
    }
}
