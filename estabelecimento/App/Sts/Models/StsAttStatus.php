<?php


namespace Sts\Models;


use Sts\Models\Helper\StsRead;

class StsAttStatus
{
    public function index(int $valor)
    {
        $id = (int)$_GET['id'];
        $update = new StsRead();
        $update->fullRead("update pedido set status=:status where id=:id","id={$id}&status={$valor}");
        $_SESSION['status']=2;
    }
}