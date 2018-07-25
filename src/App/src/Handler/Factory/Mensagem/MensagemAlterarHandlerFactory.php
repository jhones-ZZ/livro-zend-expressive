<?php

declare(strict_types=1);

namespace App\Handler\Factory\Mensagem;

use App\Handler\Mensagem\MensagemAlterarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class MensagemAlterarHandlerFactory
 * @package App\Handler\Factory\Mensagem
 */
class MensagemAlterarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagemAlterarHandler
     */
    public function __invoke(ContainerInterface $container): MensagemAlterarHandler
    {
        return new MensagemAlterarHandler($container);
    }
}
