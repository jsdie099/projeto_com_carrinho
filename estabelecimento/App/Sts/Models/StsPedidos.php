<?php
namespace Sts\Models;
use Sts\Models\Helper\StsRead;
class StsPedidos
{
    private $Dados;
    public function index()
    {
        $listar = new StsRead();
        $listar->exeRead("pedido","where status=1");
        $this->Dados = $listar->getResultado();
        return $this->Dados;
    }
}

