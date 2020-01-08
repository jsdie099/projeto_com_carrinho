<?php


namespace Sts\Controllers;


use Core\ConfigView;
use Sts\Models\StsRetirada;

class Retirada
{
    private $Dados;
    public function index()
    {
        $listar = new StsRetirada();
        $this->Dados = $listar->listar();
        $carregarView = new ConfigView("Sts/Views/retirada/retirada",$this->Dados);
        $carregarView->renderizar();
    }
}