<?php

declare(strict_types=1);

namespace App\Handler\Factory\Mensagem;

use App\Handler\Mensagem\MensagemCriarHandler;
use Interop\Container\ContainerInterface;

/**
 * Class MensagemCriarHandlerFactory
 * @package App\Handler\Factory\Mensagem
 */
class MensagemCriarHandlerFactory
{
    /**
     * @param ContainerInterface $container
     * @return MensagemCriarHandler
     */
    public function __invoke(ContainerInterface $container): MensagemCriarHandler
    {
        return new MensagemCriarHandler($container);
    }
}
