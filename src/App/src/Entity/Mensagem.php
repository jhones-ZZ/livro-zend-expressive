<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;

/**
 * Mensagem
 *
 * @ORM\Table(name="tb_mensagem", indexes={@ORM\Index(name="fk_tb_mensagem_tb_usuario_idx", columns={"usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\MensagemRepository")
 */
class Mensagem
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
     * @ORM\Column(name="ds_mensagem", type="text", length=65535, nullable=false, options={"comment"="Descrição da mensagem"})
     */
    private $mensagem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ds_resposta", type="text", length=65535, nullable=true)
     */
    private $resposta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_mensagem", type="datetime", nullable=false, options={"comment"="Data da mensagem"})
     */
    private $dataMensagem;

    /**
     * @var bool
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false, options={"default"="1","comment"="Está ativo?
0 - Não
1 - Sim"})
     */
    private $ativo = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $criadoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_alterado_em", type="datetime", nullable=true)
     */
    private $alteradoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_deletado_em", type="datetime", nullable=true)
     */
    private $deletadoEm;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * Usuario constructor.
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
    public function getMensagem(): string
    {
        return $this->mensagem;
    }

    /**
     * @param string $mensagem
     * @return Mensagem
     */
    public function setMensagem(string $mensagem): Mensagem
    {
        $this->mensagem = $mensagem;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getResposta(): ?string
    {
        return $this->resposta;
    }

    /**
     * @param null|string $resposta
     * @return Mensagem
     */
    public function setResposta(?string $resposta): Mensagem
    {
        $this->resposta = $resposta;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataMensagem(): \DateTime
    {
        return $this->dataMensagem;
    }

    /**
     * @param \DateTime $dataMensagem
     * @return Mensagem
     */
    public function setDataMensagem(): Mensagem
    {
        $this->dataMensagem = new \DateTime('now');
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
     * @return Mensagem
     */
    public function setAtivo(bool $ativo): Mensagem
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
     * @return Mensagem
     */
    public function setCriadoEm(): Mensagem
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
     * @return Mensagem
     */
    public function setAlteradoEm(): Mensagem
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
     * @return Mensagem
     */
    public function setDeletadoEm(): Mensagem
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return Mensagem
     */
    public function setUsuario(Usuario $usuario): Mensagem
    {
        $this->usuario = $usuario;
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
