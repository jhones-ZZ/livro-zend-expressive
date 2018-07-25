<?php

declare(strict_types=1);

namespace App\Handler\Usuario;

use App\Handler\HandlerAbstract;
use App\Service\UsuarioService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class UsuarioDeletarHandler
 * @package App\Handler\Usuario
 */
class UsuarioDeletarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $service = $this->container->get(UsuarioService::class);
        $userDeleted = $service->delete($id);

        return new JsonResponse([
            'data' => $userDeleted
        ], 200);
    }
}
