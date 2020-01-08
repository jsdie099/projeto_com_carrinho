<?php
namespace Sts\Models;
use Sts\Models\Helper\StsRead;

class StsCancelamento
{
    public function index(int $id)
    {
        $exclusao = new StsRead();
        $exclusao->fullRead("delete from itens_pedido where id_pedido=:id","id={$id}");
    }
    public function delete_itens(int $id)
    {
        $delete = new StsRead();
        $delete->fullRead("delete from pedido where id=:id","id={$id}");
    }
}

