<?php

declare(strict_types=1);

namespace App\Handler\Factory\TipoUsuario;

use App\Handler\TipoUsuario\TipoUsuarioCriarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class TipoUsuarioCriarHandlerFactory
 * @package App\Handler\Factory\TipoUsuario
 */
class TipoUsuarioCriarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return TipoUsuarioCriarHandler
     */
    public function __invoke(ContainerInterface $container): TipoUsuarioCriarHandler
    {
        return new TipoUsuarioCriarHandler($container);
    }
}
