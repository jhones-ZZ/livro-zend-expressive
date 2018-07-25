<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;

/**
 * Usuario
 *
 * @ORM\Table(name="tb_usuario", indexes={@ORM\Index(name="fk_tb_usuario_tb_tipo_usuario1_idx", columns={"tipo_usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="nm_nome_completo", type="string", length=150, nullable=false, options={"comment"="Nome completo do usuário"})
     */
    private $nomeCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="cd_cpf", type="string", length=11, nullable=false, options={"comment"="CPF"})
     */
    private $cpf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_nascimento", type="date", nullable=false, options={"comment"="Data de nascimento"})
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="nm_email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nm_senha", type="string", length=255, nullable=false, options={"comment"="Senha"})
     */
    private $senha;

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
     * @ORM\Column(name="dt_criado_em", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP","comment"="Data de criação do registro"})
     */
    private $criadoEm = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_alterado_em", type="datetime", nullable=true, options={"comment"="Data de alteração do registro"})
     */
    private $alteradoEm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_deletado_em", type="datetime", nullable=true, options={"comment"="Data de exclusão do registro"})
     */
    private $deletadoEm;

    /**
     * @var TipoUsuario
     *
     * @ORM\ManyToOne(targetEntity="TipoUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_usuario_id", referencedColumnName="id")
     * })
     */
    private $tipoUsuario;

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
    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    /**
     * @param string $nomeCompleto
     * @return Usuario
     */
    public function setNomeCompleto(string $nomeCompleto): Usuario
    {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return Usuario
     */
    public function setCpf(string $cpf): Usuario
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     * @return Usuario
     */
    public function setDataNascimento(\DateTime $dataNascimento): Usuario
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuario
     */
    public function setEmail(string $email): Usuario
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Usuario
     */
    public function setSenha(string $senha): Usuario
    {
        $this->senha = $this->encriptarSenha($senha);
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
     * @return Usuario
     */
    public function setAtivo(bool $ativo): Usuario
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
     * @return Usuario
     */
    public function setCriadoEm(): Usuario
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
     * @return Usuario
     */
    public function setAlteradoEm(): Usuario
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
     * @return Usuario
     */
    public function setDeletadoEm(): Usuario
    {
        $this->deletadoEm = new \DateTime('now');
        return $this;
    }

    /**
     * @return TipoUsuario
     */
    public function getTipoUsuario(): TipoUsuario
    {
        return $this->tipoUsuario;
    }

    /**
     * @param TipoUsuario $tipoUsuario
     * @return Usuario
     */
    public function setTipoUsuario(?TipoUsuario $tipoUsuario): Usuario
    {
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethods())->extract($this);
    }

    /**
     * @param string $senha
     * @return string
     */
    public function encriptarSenha(string $senha): string
    {
        return md5($senha);
    }
}
