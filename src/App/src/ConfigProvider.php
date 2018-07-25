<?php

declare(strict_types=1);

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
                Handler\PingHandler::class => Handler\PingHandler::class,
            ],
            'factories'  => [
                Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,
                Handler\TestDoctrineConnectionHandler::class => Handler\Factory\TestDoctrineConnectionHandlerFactory::class,

                //Handlers de Tipos de Usuário
                Handler\TipoUsuario\TipoUsuarioListarHandler::class => Handler\Factory\TipoUsuario\TipoUsuarioListarHandlerFactory::class,
                Handler\TipoUsuario\TipoUsuarioListarUmHandler::class => Handler\Factory\TipoUsuario\TipoUsuarioListarUmHandlerFactory::class,
                Handler\TipoUsuario\TipoUsuarioCriarHandler::class => Handler\Factory\TipoUsuario\TipoUsuarioCriarHandlerFactory::class,
                Handler\TipoUsuario\TipoUsuarioAlterarHandler::class => Handler\Factory\TipoUsuario\TipoUsuarioAlterarHandlerFactory::class,
                Handler\TipoUsuario\TipoUsuarioDeletarHandler::class => Handler\Factory\TipoUsuario\TipoUsuarioDeletarHandlerFactory::class,

                //Handlers de Usuários
                Handler\Usuario\UsuarioListarHandler::class => Handler\Factory\Usuario\UsuarioListarHandlerFactory::class,
                Handler\Usuario\UsuarioListarUmHandler::class => Handler\Factory\Usuario\UsuarioListarUmHandlerFactory::class,
                Handler\Usuario\UsuarioCriarHandler::class => Handler\Factory\Usuario\UsuarioCriarHandlerFactory::class,
                Handler\Usuario\UsuarioAlterarHandler::class => Handler\Factory\Usuario\UsuarioAlterarHandlerFactory::class,
                Handler\Usuario\UsuarioDeletarHandler::class => Handler\Factory\Usuario\UsuarioDeletarHandlerFactory::class,

                //Handlers de Mensagens
                Handler\Mensagem\MensagemListarHandler::class => Handler\Factory\Mensagem\MensagemListarHandlerFactory::class,
                Handler\Mensagem\MensagemListarUmaHandler::class => Handler\Factory\Mensagem\MensagemListarUmaHandlerFactory::class,
                Handler\Mensagem\MensagemCriarHandler::class => Handler\Factory\Mensagem\MensagemCriarHandlerFactory::class,
                Handler\Mensagem\MensagemAlterarHandler::class => Handler\Factory\Mensagem\MensagemAlterarHandlerFactory::class,
                Handler\Mensagem\MensagemDeletarHandler::class => Handler\Factory\Mensagem\MensagemDeletarHandlerFactory::class,

                //Registrando Serviços
                Service\TipoUsuarioService::class => Service\Factory\TipoUsuarioServiceFactory::class,
                Service\UsuarioService::class => Service\Factory\UsuarioServiceFactory::class,
                Service\MensagemService::class => Service\Factory\MensagemServiceFactory::class
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
