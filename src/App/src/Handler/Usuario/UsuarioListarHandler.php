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
 * Class UsuarioListarHandler
 * @package App\Handler\Usuario
 */
class UsuarioListarHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $service = $this->container->get(UsuarioService::class);
        $resultWithDQL = $service->getAll();
        $resultWithoutDQL = $service->getAllWithDQL();

        return new JsonResponse([
            'result_with_dql' => $resultWithDQL,
            'result_without_dql' => $resultWithoutDQL
        ], 200);
    }
}
