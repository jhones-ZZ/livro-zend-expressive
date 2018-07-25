<?php

declare(strict_types=1);

namespace App\Handler\Factory\Usuario;

use App\Handler\Usuario\UsuarioAlterarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class UsuarioAlterarHandlerFactory
 * @package App\Handler\Factory\Usuario
 */
class UsuarioAlterarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return UsuarioAlterarHandler
     */
    public function __invoke(ContainerInterface $container): UsuarioAlterarHandler
    {
        return new UsuarioAlterarHandler($container);
    }
}
