<?php


namespace Sts\Classes;


class Usuario
{
    private $nome;
    private $cpf;
    private $numCel;
    private $email;
    private $rua;
    private $bairro;
    private $numRua;
    private $complemento;
    private $cidade;
    private $cep;


    public function getNome()
    {
        return addslashes($this->nome);
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }


    public function getCpf()
    {
        return $this->cpf;
    }


    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }


    public function getNumCel()
    {
        return $this->numCel;
    }


    public function setNumCel($numCel): void
    {
        $this->numCel = $numCel;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public function getRua()
    {
        return $this->rua;
    }


    public function setRua($rua): void
    {
        $this->rua = $rua;
    }


    public function getBairro()
    {
        return $this->bairro;
    }


    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }


    public function getNumRua()
    {
        return $this->numRua;
    }


    public function setNumRua($numRua): void
    {
        $this->numRua = $numRua;
    }


    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep): void
    {
        $this->cep = $cep;
    }


}