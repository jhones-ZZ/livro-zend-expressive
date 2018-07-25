<?php

declare(strict_types=1);

namespace App\Handler\Factory\Usuario;

use App\Handler\Usuario\UsuarioDeletarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class UsuarioDeletarHandlerFactory
 * @package App\Handler\Factory\Usuario
 */
class UsuarioDeletarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuarioDeletarHandler
     */
    public function __invoke(ContainerInterface $container): UsuarioDeletarHandler
    {
        return new UsuarioDeletarHandler($container);
    }
}
