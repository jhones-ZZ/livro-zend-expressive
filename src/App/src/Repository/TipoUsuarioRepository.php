<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class TipoUsuarioRepository
 * @package App\Repository
 */
class TipoUsuarioRepository extends EntityRepository implements RepositoryInterface
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
     * @return null|object
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
            t.id,
            t.tipo,
            t.ativo
        FROM App\Entity\TipoUsuario t
        ORDER BY t.tipo ASC
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
            t.id,
            t.tipo,
            t.ativo
        FROM App\Entity\TipoUsuario t
        WHERE
            t.id = $id
DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}