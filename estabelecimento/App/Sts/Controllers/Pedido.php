<?php


namespace Sts\Controllers;


use Core\ConfigView;
use Sts\Models\StsDados;

class Pedido
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['logado']))
        {
            $listar = new StsDados();
            $this->Dados = $listar->index();
            $carregarView = new ConfigView("Sts/Views/pedido/pedido",$this->Dados);
            $carregarView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
    }
}