<?php


namespace Sts\Controllers;
use Core\ConfigView;

class Sair
{
    public function index()
    {
        unset($_SESSION['logado']);
        $carregarView = new ConfigView("Sts/Views/home/home");
        $carregarView->renderizar();
    }
}