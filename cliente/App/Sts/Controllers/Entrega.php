<?php
namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsEntrega;
class Entrega {
    private $Dados;
    public function index()
    {
        $atualiza = new StsEntrega();
        $this->Dados['dados']=$atualiza->listar();
        $carregaView = new ConfigView("Sts/Views/entrega/entrega",$this->Dados);
        $carregaView->renderizar();
    }
}