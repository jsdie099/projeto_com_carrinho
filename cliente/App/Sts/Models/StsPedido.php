<?php
namespace Sts\Models;
use Sts\Models\Helper\StsRead;
class StsPedido
{
    private $Dados;
    public function index(string $forma, float $preco)
    {
        $insert = new StsRead();
        $insert->fullRead("insert into pedido(id_cliente,preco,status,forma) values(:id_cliente,:preco,1,:forma)","id_cliente={$_SESSION['logado']}&preco={$preco}&forma={$forma}");
        if(count($_POST['quantidade'])>1)
        {
            foreach($_POST['quantidade'] as $id=>$qtd)
            {
                $insert->fullRead("insert into itens_pedido(id_pedido,id_alimento,quantidade)values((select max(id) from pedido p),:id_alimento,:quantidade)","id_alimento={$id}&quantidade={$qtd}");
            }
        }
        if(!is_array($_SESSION['itens_pedido']))
        {
            $id = key($_SESSION['carrinho']);
            $qtd = $_POST['quantidade'][0];
            $insert->fullRead("insert into itens_pedido(id_pedido,id_alimento,quantidade)values((select max(id) from pedido p),:id_alimento,:quantidade)","id_alimento={$id}&quantidade={$qtd}");
        }
    }
    public function findPedido()
    {
        $listar = new StsRead();
        $listar->exeRead("vw_pedido");
        $this->Dados=$listar->getResultado();
        return $this->Dados;
    }
}