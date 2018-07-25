<?php

declare(strict_types=1);

namespace App\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class TestDoctrineConnectionHandler implements RequestHandlerInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $isConnected = $this->em->getConnection()->connect();
        return new JsonResponse(['doctrine_is_connected' => $isConnected]);
    }
}
