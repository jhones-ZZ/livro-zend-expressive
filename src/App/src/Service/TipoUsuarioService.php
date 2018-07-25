<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TipoUsuario;

/**
 * Class TipoUsuarioService
 * @package App\Service
 */
class TipoUsuarioService extends ServiceAbstract
{
    protected $entity = TipoUsuario::class;
}