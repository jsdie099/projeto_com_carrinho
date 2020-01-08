<?php
namespace Sts\Controllers;
use Core\ConfigView;

class Pedidos
{
    public function index()
    {       
        if(isset($_SESSION['logado_f']))
        {
            $carregarView = new ConfigView("Sts/Views/pedidos/pedidos");
            $carregarView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
        
    }
}

