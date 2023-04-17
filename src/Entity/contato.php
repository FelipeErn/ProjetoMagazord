<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @UniqueEntity("Numero_do_contato", message="Este numero ja esta em uso")
 */
class contato
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idcontato;

    /**
     * @ORM\Column(type="boolean", length=100, unique=true)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="idpessoa", referencedColumnName="idpessoa")
     */
    private $pessoa;

    public function getIdContato()
    {
        return $this->idcontato;
    }

    public function setIdContato($idcontato): void
    {
        $this->idcontato = $idcontato;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): contato
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function setPessoa($pessoa): void
    {
        $this->pessoa = $pessoa;
    }

}