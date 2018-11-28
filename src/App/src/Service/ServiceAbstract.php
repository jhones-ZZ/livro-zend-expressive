<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Zend\Hydrator\ClassMethods;

/**
 * Class ServiceAbstract
 * @package App\Service
 */
abstract class ServiceAbstract
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var string
     */
    protected $entity;

    /**
     * ServiceAbstract constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @throws \Exception
     */
    public function getAll()
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getAll();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function getOne(int $id)
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getOne($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getAllWithDQL(): array
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getAllWithDQL();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getOneWithDQL(int $id): array
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getOneWithDQL($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insert(array $data)
    {
        try {
            $entity = new $this->entity();

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
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function delete(int $id)
    {
        try {
            $entity = $this->em->getReference($this->entity, $id);

            $this->em->remove($entity);
            $this->em->flush();

            return $entity;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}