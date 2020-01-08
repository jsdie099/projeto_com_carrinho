<?php


namespace Sts\Controllers;
use Core\ConfigView;

class Erro
{
    public function index()
    {
        $carregarView = new ConfigView("Sts/Views/erro/erro");
        $carregarView->renderizar();
    }
}