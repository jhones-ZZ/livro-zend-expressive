<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../vendor/autoload.php';

/** @var \Interop\Container\ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = $container->get(EntityManager::class);

return ConsoleRunner::createHelperSet($em);