<?php

namespace Sts\Models;


use Sts\Classes\Pedido;
use Sts\Models\Helper\StsRead;

class StsCardapio
{
    private $dados;

    public function find(int $id)
    {
        $listar = new StsRead();
        $listar->exeRead("alimento","where id_estabelecimento=:id","id={$id}");
        $this->dados=$listar->getResultado();
        return $this->dados;
    }
    public function editarAlimento(int $id)
    {
        $descricao = (string)$_POST['descricao'];
        $preco = (double)$_POST['preco'];
        $update = new StsRead();
        $update->fullRead("update alimento set descricao=:descricao, preco=:preco where id=:id",
        "descricao={$descricao}&preco={$preco}&id={$id}");
    }
    public function inserirAlimento()
    {
        $descricao = (string)$_POST['descricao'];
        $preco = (double)$_POST['preco'];
        $inserir = new StsRead();
        $inserir->fullRead("insert into alimento(id,id_estabelecimento,descricao,preco) values((select max(id)+1 from alimento ali),:id_estabelecimento,:descricao,:preco)",
        "id_estabelecimento={$_SESSION['id_estabelecimento']}&descricao={$descricao}&preco={$preco}");
    }
}