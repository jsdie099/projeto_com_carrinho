<?php


namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsHome;

class Home
{
    public function index()
    {
        $carregaView = new ConfigView("Sts/Views/home/home");
        $carregaView->renderizar();
    }
}
