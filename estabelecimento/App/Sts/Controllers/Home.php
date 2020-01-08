<?php


namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsHome;

class Home
{
        public function index()
    {
        $carregarView = new ConfigView("Sts/Views/home/home");
        $carregarView->renderizar();
        if(isset($_POST) and !empty($_POST))
        {
            $login = new StsHome();
            $login->index();
        }
    }   
}
