<?php


namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsLogin;

class Login
{
    public function index()
    {
        $carregarView = new ConfigView("Sts/Views/login/login");
        $carregarView->renderizar();
        if(isset($_POST) and !empty($_POST))
        {
            $login = new StsLogin();
            $login->index();
        }
    }
}