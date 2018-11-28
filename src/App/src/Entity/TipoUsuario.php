<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;

/**
 * TipoUsuario
 *
 * @ORM\Table(name="tb_tipo_usuario")
 * @ORM\Entity(repositoryClass="App\Repository\TipoUsuarioRepository")
 */
class TipoUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nm_tipo", type="string", length=45, nullable=false, options={"comment"="Tipo"})
     */
    private $tipo;

    /**
     * @var bool
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false, options={"default"="1","comment"="Está ativo?
0 - Não
1 - Sim"})
     */
    private $ativo = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP","comment"="Data de criação"})
     */
    private $criadoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_alterado_em", type="datetime", nullable=true, options={"comment"="Data de alteração"})
     */
    private $alteradoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_deletado_em", type="datetime", nullable=true, options={"comment"="Data de exclusão"})
     */
    private $deletadoEm;

    /**
     * TipoUsuario constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->criadoEm = new \DateTime('now');
        (new ClassMethods())->hydrate($data, $this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return TipoUsuario
     */
    public function setTipo(string $tipo): TipoUsuario
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return TipoUsuario
     */
    public function setAtivo(bool $ativo): TipoUsuario
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCriadoEm(): \DateTime
    {
        return $this->criadoEm;
    }

    /**
     * @param \DateTime $criadoEm
     * @return TipoUsuario
     */
    public function setCriadoEm(): TipoUsuario
    {
        $this->criadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getAlteradoEm(): ?\DateTime
    {
        return $this->alteradoEm;
    }

    /**
     * @param \DateTime|null $alteradoEm
     * @return TipoUsuario
     */
    public function setAlteradoEm(): TipoUsuario
    {
        $this->alteradoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletadoEm(): ?\DateTime
    {
        return $this->deletadoEm;
    }

    /**
     * @param \DateTime|null $deletadoEm
     * @return TipoUsuario
     */
    public function setDeletadoEm(): TipoUsuario
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethods())->extract($this);
    }
}
