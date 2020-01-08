<?php

namespace Sts\Models;


use Sts\Classes\Pedido;
use Sts\Models\Helper\StsRead;

class StsCardapio
{
    private $dados;
    private $dadosPedido;
    public function index()
    {
        $listar = new StsRead();
        $listar->exeRead("alimento");
        $this->dados=$listar->getResultado();
        return $this->dados;
    }
    public function findAlimento(int $id)
    {
        $listar = new StsRead();
        $listar->exeRead("alimento","where id=:id","id={$id}");
        $this->dados = $listar->getResultado();
        return $this->dados;
    }
    public function inserirPedido()
    {
        $dadosPedido = new Pedido();
        $dadosPedido->setNumeroAlimento($_POST['numalimento']);
        $dadosPedido->setQuantidade($_POST['qtdalimento']);

        $numAlimento = $dadosPedido->getNumeroAlimento();
        $qtdAlimento = $dadosPedido->getQuantidade();

        $addPedido = new StsRead();
        $addPedido->fullRead("select * from alimento where id=:id","id={$numAlimento}");
        if(count($addPedido->getResultado())>0)
        {
            $this->dadosPedido=$addPedido->getResultado();
            foreach ($this->dadosPedido as $item) {
                $preco = $item['preco'];
            }
            $dadosPedido->setPreco($preco);
            $addPedido->fullRead("insert into pedido(id_cliente,tipo,preco,quantidade,status,forma) values(:id_cliente,:tipo,:preco,:quantidade,1,null)",
                "id_cliente={$_SESSION['logado']}&tipo={$numAlimento}&preco={$dadosPedido->getPrecoTotal()}&quantidade={$qtdAlimento}");
            $addPedido->fullRead("select * from pedido where id=(select max(id) from pedido p)");
            $_SESSION['pedido'] = $addPedido->getResultado();
            $_SESSION['pedidos'][]= $addPedido->getResultado();
            header('location:pedido');

        }
        else
        {
            echo "<h2 style='color: white' align='center'>Alimento inválido!</h2>";
        }

    }
}