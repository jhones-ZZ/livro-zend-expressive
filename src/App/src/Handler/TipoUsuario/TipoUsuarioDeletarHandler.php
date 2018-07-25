<?php

declare(strict_types=1);

namespace App\Handler\TipoUsuario;

use App\Handler\HandlerAbstract;
use App\Service\TipoUsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class TipoUsuarioDeletarHandler
 * @package App\Handler\TipoUsuario
 */
class TipoUsuarioDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $service = $this->container->get(TipoUsuarioService::class);
        $userTypeDeleted = $service->delete($id);

        return new JsonResponse([
            'data' => $userTypeDeleted
        ], 200);
    }
}
