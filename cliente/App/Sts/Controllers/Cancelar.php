<?php
namespace Sts\Controllers;
use Sts\Models\StsCancelamento;

class Cancelar
{
    public function index()
    {
        $excluir = new StsCancelamento();
        $excluir->index($_GET['id_pedido']);
        $excluir->delete_itens($_GET['id_pedido']);
        header('location:historico?pagina=1');
    }
}

