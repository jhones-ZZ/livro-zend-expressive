<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class UsuarioRepository
 * @package App\Repository
 */
class UsuarioRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * @return array|null
     */
    public function getAll(): ?array
    {
        $data = $this->findAll();
        $dataArray = [];

        foreach ($data as $object) {
            $dataArray[] = $object->toArray();
        }

        return $dataArray;
    }

    /**
     * @param int $id
     * @return mixed|null|object
     */
    public function getOne(int $id)
    {
        return $this->findOneBy(['id' => $id])->toArray();
    }

    /**
     * @return array|null
     */
    public function getAllWithDQL(): ?array
    {
        $dql = <<<DQL
        SELECT
            u.id,
            u.nomeCompleto,
            u.ativo,
            u.cpf,
            u.dataNascimento,
            u.email,
            u.ativo,
            t.id as tipoUsuario
        FROM App\Entity\Usuario u
        INNER JOIN u.tipoUsuario t
        ORDER BY u.nomeCompleto ASC
DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getOneWithDQL(int $id): ?array
    {
        $dql = <<<DQL
        SELECT
            u.id,
            u.nomeCompleto,
            u.ativo,
            u.cpf,
            u.dataNascimento,
            u.email,
            u.ativo,
            t.id as tipoUsuario
        FROM App\Entity\Usuario u
        INNER JOIN u.tipoUsuario t
        WHERE 
            u.id = $id
DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}