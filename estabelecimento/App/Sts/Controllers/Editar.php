<?php
namespace Sts\Controllers;
use Sts\Models\StsCardapio;
use Core\ConfigView;
class Editar
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['logado_f']))
        {
            
            $cardapio = new StsCardapio();
            $this->Dados = $cardapio->find($_GET['id']);
            $carregarView = new ConfigView("Sts/Views/editar/editar",$this->Dados);
            $carregarView->renderizar();
            if(isset($_POST) and !empty($_POST))
            {
                $id = (int) $_GET['id'];
                $update = new StsCardapio();
                $update->editarAlimento($id);
                header("Refresh:0");
            }
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
        
    }
}

