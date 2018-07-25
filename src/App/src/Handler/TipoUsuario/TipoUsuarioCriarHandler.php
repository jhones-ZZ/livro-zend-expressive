<?php

declare(strict_types=1);

namespace App\Handler\TipoUsuario;

use App\Handler\HandlerAbstract;
use App\Service\TipoUsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Json\Json;

/**
 * Class TipoUsuarioCriarHandler
 * @package App\Handler\TipoUsuario
 */
class TipoUsuarioCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

        $service = $this->container->get(TipoUsuarioService::class);
        $userType = $service->insert($data);

        return new JsonResponse([
            'data' => $userType
        ], 200);
    }
}
