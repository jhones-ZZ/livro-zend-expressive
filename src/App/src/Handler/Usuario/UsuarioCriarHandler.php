<?php

declare(strict_types=1);

namespace App\Handler\Usuario;

use App\Handler\HandlerAbstract;
use App\Service\UsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Json\Json;

/**
 * Class UsuarioCriarHandler
 * @package App\Handler\Usuario
 */
class UsuarioCriarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

        $service = $this->container->get(UsuarioService::class);
        $user = $service->insert($data);

        return new JsonResponse([
            'data' => $user
        ], 200);
    }
}
