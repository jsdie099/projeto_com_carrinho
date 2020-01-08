<?php


namespace Sts\Classes;


class Pedido
{
    private $quantidade;
    private $numero_alimento;
    private $preco;


    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }



    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getNumeroAlimento()
    {
        return $this->numero_alimento;
    }

    public function setNumeroAlimento($numero_alimento)
    {
        $this->numero_alimento = $numero_alimento;
    }

    public function getPrecoTotal()
    {
        return ($this->getQuantidade()*$this->getPreco());
    }

}