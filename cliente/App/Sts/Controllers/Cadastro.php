<?php


namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsCadastro;

class Cadastro
{
    private $resultado;
    public function index()
    {
        $carregarView = new ConfigView("Sts/Views/cadastro/cadastro");
        $carregarView->renderizar();
        if(isset($_POST) and !empty($_POST))
        {
            $cadastro = new StsCadastro();
            $cadastro->index();
        }
    }
}