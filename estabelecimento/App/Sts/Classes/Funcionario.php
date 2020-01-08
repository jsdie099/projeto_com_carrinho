<?php


namespace Sts\Classes;


class Funcionario
{
    private $tipo;
    private $nome;
    private $cpf;
  
    
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
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
   
}