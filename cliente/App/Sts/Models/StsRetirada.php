<?php


namespace Sts\Models;


use Sts\Models\Helper\StsRead;

class StsRetirada
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['pedido']) && is_array($_SESSION['pedido']))
        {
            foreach($_SESSION['pedido'] as $dados)
            {
                extract($dados);
                $id_p = (int)$id;
            }
        }
        else
        {
            $id_p = (int)$_GET['id_pedido']; 
        }
        
        $update = new StsRead();
        $update->fullRead("update pedido set forma='retirada' where id=:id","id={$id_p}");
    }
    public function listar()
    {
        $listar = new StsRead();
        $listar->fullRead("select * from pedido order by id desc limit 1");
        $this->Dados = $listar->getResultado();
        return $this->Dados;
    }
}