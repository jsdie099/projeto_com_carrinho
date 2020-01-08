<?php
namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsAttStatus;

class Finalizar
{
    public function index()
    {
        
        if(isset($_SESSION['logado_f']))
        {
            $carregarView = new ConfigView("Sts/Views/finalizacao/finalizacao");
            $carregarView->renderizar();
            $attStatus = new StsAttStatus();
            if($_POST['status']==1)
            {   
                $attStatus->index(3);
                $_SESSION['status']=3;
            }
            else if($_POST['status']==2)
            {
                $attStatus->index(4);
                $_SESSION['status']=4;
            }
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
        
    }
}

