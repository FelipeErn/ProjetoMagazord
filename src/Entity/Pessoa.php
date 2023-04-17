<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @UniqueEntity("nome", message="Este nome ja esta em uso")
 */
class Pessoa
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $idpessoa;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=11, unique=true)
     */
    private $cpf;

    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): Pessoa
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): Pessoa
    {
        $this->cpf = $cpf;
        return $this;
    }
}