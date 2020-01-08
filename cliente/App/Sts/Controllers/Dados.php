<?php
namespace Sts\Controllers;

use Core\ConfigView;
use Sts\Models\StsDados;

class Dados
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['logado']))
        {
            $listar = new StsDados();
            $this->Dados = $listar->index();
            $carregarView = new ConfigView("Sts/Views/dados/dados",$this->Dados);
            $carregarView->renderizar();
            if(isset($_POST) and !empty($_POST))
            {
                header("Refresh:0");
                $listar->update();
            }
        }
        else
        {
            $sair = new Sair();
            $sair->index();
        }
    }

}