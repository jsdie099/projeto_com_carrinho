<?php


namespace Sts\Controllers;


use Core\ConfigView;
use Sts\Models\StsHistorico;

class Historico
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['logado_f']))
        {
            $listar = new StsHistorico();
            $this->Dados['dados']=$listar->index();
            $paginacao = new StsHistorico();
            $this->Dados['paginacao'] = $paginacao->paginacao();
            $carregarView = new ConfigView("Sts/Views/historico/historico",$this->Dados);
            $carregarView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
    }
}