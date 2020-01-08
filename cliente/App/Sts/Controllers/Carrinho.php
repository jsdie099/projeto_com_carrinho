<?php
namespace Sts\Controllers;

use Core\ConfigView;
use Sts\Models\StsCardapio;

class Carrinho
{
    public function index()
    {
        if(isset($_SESSION['logado']))
        {
            $carregaView = new ConfigView("Sts/Views/carrinho/carrinho");
            $carregaView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
    }
}
?>