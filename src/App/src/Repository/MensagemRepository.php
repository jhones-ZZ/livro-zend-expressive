<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class MensagemRepository
 * @package App\Repository
 */
class MensagemRepository extends EntityRepository implements RepositoryInterface
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
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagem m
        INNER JOIN m.usuario u
        ORDER BY m.dataMensagem DESC
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
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagem m
        INNER JOIN m.usuario u
        WHERE 
            m.id = $id
DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    /**
     * @param int $userId
     * @return array|null
     */
    public function getMessagesFromUser(int $userId): ?array
    {
        $dql = <<<DQL
       SELECT
            m.id,
            m.mensagem,
            m.resposta,
            m.dataMensagem,
            m.ativo,
            u.id as usuario
        FROM App\Entity\Mensagem m
        INNER JOIN m.usuario u
        WHERE 
            u.id = $userId
DQL;

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}