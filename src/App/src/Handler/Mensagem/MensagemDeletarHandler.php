<?php

declare(strict_types=1);

namespace App\Handler\Mensagem;

use App\Handler\HandlerAbstract;
use App\Service\MensagemService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class MensagemDeletarHandler
 * @package App\Handler\Mensagem
 */
class MensagemDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $service = $this->container->get(MensagemService::class);
        $messageDeleted = $service->delete($id);

        return new JsonResponse([
            'data' => $messageDeleted
        ], 200);
    }
}
