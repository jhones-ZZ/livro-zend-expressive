<?php

declare(strict_types=1);

namespace App\Handler;

use Interop\Container\ContainerInterface;

/**
 * Class HandlerAbstract
 * @package App\Handler
 */
abstract class HandlerAbstract
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * HandlerAbstract constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}