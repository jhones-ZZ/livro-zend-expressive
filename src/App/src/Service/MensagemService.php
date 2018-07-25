<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Mensagem;
use App\Entity\Usuario;
use Zend\Hydrator\ClassMethods;

/**
 * Class MensagemService
 * @package App\Service
 */
class MensagemService extends ServiceAbstract
{
    protected $entity = Mensagem::class;

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insert(array $data)
    {
        try {
            $entity = new $this->entity();

            $user = $this->em->getReference(Usuario::class, $data['usuario']);
            $data['usuario'] = $user;
            $data['dataMensagem'] = new \DateTime('now');

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

            if (!empty($data['usuario'])) {
                $user = $this->em->getReference(Usuario::class, $data['usuario']);
                $data['usuario'] = $user;
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
