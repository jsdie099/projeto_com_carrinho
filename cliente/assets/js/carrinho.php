<style>
    input[type=number]
    {
        padding: 5px 0;
    }
</style>
<div class="wrapper text-center" style="padding-top: 50px;">
    <h1 style="margin-bottom: 50px;">Para saber o preço atual do seu pedido<br> atualize o carrinho antes de finalizar o pedido =)</h1>
<?php

if(!isset($_SESSION))
{
    session_start();
}
$db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
$db->set_charset("utf8");


if(!isset($_SESSION['carrinho']))
{
    $_SESSION['carrinho'] = array();
}

if(isset($_GET['acao'])) {

    if ($_GET['acao'] == 'add') {
        $id = (int)$_GET['id'];
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }
    if ($_GET['acao'] == 'del') {
        $id = (int)$_GET['id'];
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    if ($_GET['acao'] == 'up') {
        if (isset($_POST) and !empty($_POST) and is_array($_POST['quantidade']))
        {
            foreach ($_POST['quantidade'] as $id => $qtd)
            {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0)
                {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else
                {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}

if(count($_SESSION['carrinho'])==0)
{
    ?>
    <h1>Nenhum produto no carrinho!</h1>
    <h3><a href="cardapio">Começar a comprar</a></h3>
<?php
}
else
{
    ?>
    <div class="table-responsive">
        <table class="table-hover table-bordered" width="80%" align="center">
            <tr>
                <td>
                    <h3>Produtos</h3>
                </td>
                <td>
                    <h3>Quantidade</h3>
                </td>
                <td>
                    <h3>Sub Total</h3>
                </td>
                <td>
                    <h3>Remover</h3>
                </td>
            </tr>
            <form action="" method="post">
            <?php
            $total = 0;
    foreach ($_SESSION['carrinho'] as $id=>$qtd)
    {
        $sql = "select * from alimento where id={$id}";
        $exec = $db->query($sql);
        $linhas = $exec->fetch_array();
        $descricao = $linhas['descricao'];
        $preco = number_format($linhas['preco'],2,',','.');
        $subtotal = number_format($linhas['preco']*$qtd,2,',','.');
        $total+=($qtd*$linhas['preco']);
        ?>
        <input type="hidden" name="preco_alimento[<?=$linhas['id']?>]" value="<?=$linhas['preco']?>">
        <input type="hidden" name="preco" value="<?=$total?>">
        <input type="hidden" name="descricao[<?=$linhas['id']?>]" value="<?=$descricao?>">
                <tr>
                    <td>
                        <h3><?=$descricao?></h3>
                    </td>
                    <td>
                        <h3><input type="number" name="quantidade[<?=$id?>]"  value="<?=$qtd?>"></h3>
                    </td>
                    <td>
                        <h3>R$<?=$subtotal?></h3>
                    </td>
                    <td>
                        <a href="carrinho?acao=del&id=<?=$id?>">Remover</a>
                    </td>
                </tr>
    <?php

    }
}
if(count($_SESSION['carrinho'])>0)
{

?>
                <tr>
                    <td colspan="2"><h2>Total</h2></td>
                    <td><h3>R$<?=number_format($total,'2',',','.')?></h3></td>
                </tr>
        </table>
        <input type="submit" formaction="?acao=up" value="Atualizar Carrinho">
        <input type="submit" formaction="pedido" value="Finalizar" id="finalizacao">
        <h3><a href="cardapio">Continuar comprando</a></h3>
        </form>
    </div>
</div>
<?php
}
if(!empty($_SESSION['erro']))
{
    echo "<script>alert('Digite uma quantidade válida do alimento!')</script>";
    unset($_SESSION['erro']);
}
?>

