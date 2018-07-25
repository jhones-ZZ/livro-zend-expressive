<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TipoUsuario;
use App\Entity\Usuario;
use Zend\Hydrator\ClassMethods;

/**
 * Class UsuarioService
 * @package App\Service
 */
class UsuarioService extends ServiceAbstract
{
    protected $entity = Usuario::class;

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insert(array $data)
    {
        try {
            $entity = new $this->entity();

            $userType = $this->em->getReference(TipoUsuario::class, $data['tipoUsuario']);
            $data['tipoUsuario'] = $userType;
            $data['dataNascimento'] = new \DateTime($data['dataNascimento']);

            $classMethods = new ClassMethods();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function update(array $data): array
    {
        try {
            $entity = $this->em->getReference($this->entity, $data['id']);

            if (!empty($data['tipoUsuario'])) {
                $userType = $this->em->getReference(TipoUsuario::class, $data['tipoUsuario']);
                $data['tipoUsuario'] = $userType;
            }

            if (!empty($data['dataNascimento'])) {
                $data['dataNascimento'] = new \DateTime($data['dataNascimento']);
            }

            $classMethods = new ClassMethods();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}