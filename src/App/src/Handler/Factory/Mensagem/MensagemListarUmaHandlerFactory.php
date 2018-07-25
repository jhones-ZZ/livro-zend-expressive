<?php

declare(strict_types=1);

namespace App\Handler\Factory\Mensagem;

use App\Handler\Mensagem\MensagemListarUmaHandler;
use Interop\Container\ContainerInterface;

/**
 * Class MensagemListarUmaHandlerFactory
 * @package App\Handler\Factory\Mensagem
 */
class MensagemListarUmaHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagemListarUmaHandler
     */
    public function __invoke(ContainerInterface $container): MensagemListarUmaHandler
    {
        return new MensagemListarUmaHandler($container);
    }
}
