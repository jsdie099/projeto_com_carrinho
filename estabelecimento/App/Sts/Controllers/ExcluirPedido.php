<?php
namespace Sts\Controllers;
use Sts\Models\StsAttStatus;

class ExcluirPedido
{
    public function index()
    {
        $excluir = new StsAttStatus();
        $excluir->index(0);
        $_SESSION['status']=0;
        header('location:pedidos');
    }
}

