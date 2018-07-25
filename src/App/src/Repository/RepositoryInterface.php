<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * Interface RepositoryInterface
 * @package App\Repository
 */
interface RepositoryInterface
{
    /**
     * @return array|null
     */
    public function getAll(): ?array;

    /**
     * @param int $id
     * @return mixed
     */
    public function getOne(int $id);

    /**
     * @return array|null
     */
    public function getAllWithDQL(): ?array;

    /**
     * @param int $id
     * @return array|null
     */
    public function getOneWithDQL(int $id): ?array;
}