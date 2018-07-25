<?php

declare(strict_types=1);

namespace App\Handler\Factory\Mensagem;

use App\Handler\Mensagem\MensagemListarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class MensagemListarHandlerFactory
 * @package App\Handler\Factory\Mensagem
 */
class MensagemListarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagemListarHandler
     */
    public function __invoke(ContainerInterface $container): MensagemListarHandler
    {
        return new MensagemListarHandler($container);
    }
}
