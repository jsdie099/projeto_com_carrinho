<?php


namespace Sts\Controllers;
use Core\ConfigView;
use Sts\Models\StsDados;
use Sts\Models\StsPedido;

class Pedido
{
    private $Dados;
    public function index()
    {
        if(isset($_SESSION['logado']))
        {
            if(isset($_SESSION['preco_final']))
            {
                $preco = $_SESSION['preco_final'];
                if(count($_POST['preco_alimento'])<=1)
                {
                    $_SESSION['itens_pedido'] = (int)key($_SESSION['carrinho']);
                }
                else
                {
                    foreach ($_POST['quantidade'] as $id=>$qtd):
                        $quantidade[] = (int)$qtd;
                    endforeach;
                    ksort($_POST['quantidade']);
                    $_SESSION['itens_pedido'] = $_POST['quantidade'];
                }
            }
            else
            {
                if(count($_POST['preco_alimento'])<=1)
                {
                    sort($_POST['preco_alimento']);
                    sort($_POST['quantidade']);
                    $preco_alimento = (double)$_POST['preco_alimento'][0];
                    $quantidade = (int)$_POST['quantidade'][0];
                    $preco_total = $preco_alimento*$quantidade;
                    $_SESSION['itens_pedido'] = (int)key($_SESSION['carrinho']);
                }
                else
                {
                    foreach ($_POST['preco_alimento'] as $id=>$preco):
                        $preco_alimento[] = (double)$preco;
                    endforeach;
                    foreach ($_POST['quantidade'] as $id=>$qtd):
                        $quantidade[] = (int)$qtd;
                    endforeach;
                    $preco_total = 0;
                    for ($i=0;$i<count($preco_alimento);$i++)
                    {
                        $preco_total+=(double)$preco_alimento[$i]*$quantidade[$i];
                    }
                    ksort($_POST['quantidade']);
                    $_SESSION['itens_pedido'] = $_POST['quantidade'];
                }
                $preco=$preco_total;
            }
            if(isset($_POST['delivery']))
            {
                $inserir = new StsPedido();
                $inserir->index('entrega',$preco);
                header("location:entrega");
            }
            if(isset($_POST['retirada']))
            {
                $inserir = new StsPedido();
                $inserir->index('retirada',$preco);
                header("location:retirada");
            }
            $dados = new StsDados();
            $this->Dados['dados_usuario']=$dados->index();
            $carregarView = new ConfigView("Sts/Views/pedido/pedido",$this->Dados);
            $carregarView->renderizar();
        }
        else
        {
            $erro = new Erro();
            $erro->index();
        }
    }

}