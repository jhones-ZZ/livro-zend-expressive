<?php

declare(strict_types=1);

namespace App\Handler\Mensagem;

use App\Handler\HandlerAbstract;
use App\Service\MensagemService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Json\Json;

/**
 * Class MensagemCriarHandler
 * @package App\Handler\Mensagem
 */
class MensagemCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

        $service = $this->container->get(MensagemService::class);
        $message = $service->insert($data);

        return new JsonResponse([
            'data' => $message
        ], 200);
    }
}
