<?php


namespace Sts\Models;


use Sts\Models\Helper\StsRead;

class StsEntrega
{
    private $Dados;
    public function listar()
    {
        $listar = new StsRead();
        if(isset($_GET['id_pedido']))
        {
            $listar->exeRead("pedido","where id=:id","id={$_GET['id_pedido']}");
        }
        else
        {
            $listar->fullRead("select * from pedido order by id desc limit 1");
        }
        $this->Dados = $listar->getResultado();
        return $this->Dados;
    }
}