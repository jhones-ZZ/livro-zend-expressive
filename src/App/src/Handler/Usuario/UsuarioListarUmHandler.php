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
 * Class UsuarioListarUmHandler
 * @package App\Handler\Usuario
 */
class UsuarioListarUmHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = (int)$request->getAttribute('id');

        $service = $this->container->get(UsuarioService::class);
        $resultWithDQL = $service->getOne($id);
        $resultWithoutDQL = $service->getOneWithDQL($id);

        if (!empty($resultWithDQL) && !empty($resultWithoutDQL)) {
            return new JsonResponse([
                'result_with_dql' => $resultWithDQL,
                'result_without_dql' => $resultWithoutDQL
            ], 200);
        }

        return new JsonResponse([
            'error' => true,
            'message' => 'Nenhum registro encontrado'
        ], 404);
    }
}
