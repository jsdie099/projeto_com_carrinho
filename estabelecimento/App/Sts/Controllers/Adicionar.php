<?php
namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsCardapio;

class Adicionar
{
    public function index()
    {
        if(isset($_SESSION['logado_f']))
        {
            $carregarView = new ConfigView("Sts/Views/adicionar/adicionar");
            $carregarView->renderizar();
            if(isset($_POST) and !empty($_POST))
            {
                $inserir = new StsCardapio();
                $inserir->inserirAlimento();
            }
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
    }
}

