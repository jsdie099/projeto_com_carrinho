<?php


namespace Sts\Controllers;


use Core\ConfigView;
use Sts\Models\StsCardapio;

class Cardapio
{
    private $Dados;

    public function index()
    {
        if(isset($_SESSION['logado_f']))
        {
            $listar = new StsCardapio();
            $this->Dados=$listar->find($_SESSION['id_estabelecimento']);
            $carregarView = new ConfigView("Sts/Views/cardapio/cardapio",$this->Dados);
            $carregarView->renderizar();
            unset($_SESSION['endereco']);
            if(isset($_POST) and !empty($_POST))
            {
                $addPedido = new StsCardapio();
                $addPedido->inserirPedido();
            }
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }

    }
}