<?php
namespace Sts\Controllers;

use Core\ConfigView;
use Sts\Models\StsAttStatus;

class Notificacao
{
    public function index()
    {
        if(isset($_SESSION['logado_f']))
        {
            $att_pedido = new StsAttStatus();
            $att_pedido->index(2);
            $carregarView = new ConfigView("Sts/Views/notificacao/notificacao");
            $carregarView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
        
    }
}

