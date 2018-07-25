<?php

declare(strict_types=1);

namespace App\Handler\Factory\TipoUsuario;

use App\Handler\TipoUsuario\TipoUsuarioListarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class TipoUsuarioListarHandlerFactory
 * @package App\Handler\Factory\TipoUsuario
 */
class TipoUsuarioListarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TipoUsuarioListarHandler
     */
    public function __invoke(ContainerInterface $container): TipoUsuarioListarHandler
    {
        return new TipoUsuarioListarHandler($container);
    }
}
