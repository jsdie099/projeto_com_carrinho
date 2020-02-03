<?php
$_SESSION['endereco'] = '<a href="pedido">Retornar ao pedido</a>';

if(count($_POST['preco_alimento'])<=1)
{
    sort($_POST['preco_alimento']);
    sort($_POST['quantidade']);
    $preco_alimento = (double)$_POST['preco_alimento'][0];
    $quantidade = (int)$_POST['quantidade'][0];
    if($quantidade<=0)
    {
        header('location:carrinho');
        $_SESSION['erro'] = 1;
    }
    $preco_total = $preco_alimento*$quantidade;
    ?>
    <input type="hidden" name="preco_alimento" value="<?=key($_POST['preco_alimento'])?>">
    <?php
}
else
{
    ksort($_POST['preco_alimento']);
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
}
$_SESSION['preco_final']=$preco_total;
?>
<div class="wrapper container text-center">
  <div class="container">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-3">
              <h2> Itens do Pedido:</h2>
              <?php
              if(count($_POST['descricao'])>1)
              {
                  foreach ($_POST['quantidade'] as $id=>$qtd):
                      if($qtd<=0)
                      {
                          header('location:carrinho');
                          $_SESSION['erro'] = 1;
                      }
                      $quantidade[] = (int)$qtd;
                  endforeach;
                  foreach ($_POST['descricao'] as $id=>$descricao):
                      $descricao_alimento[] = $descricao;
                  endforeach;
                  for($i=0;$i<count($descricao_alimento);$i++):
                      ?>
                      <li style="list-style: none;"><h3><?=$descricao_alimento[$i]?> (<?=$quantidade[$i]?>x)</h3></li>
                  <?php
                  endfor;
              }
              else
              {
                  foreach($_POST['descricao'] as $id=>$descricao):
                      ?>
                      <li style="list-style: none;"><h3><?=$descricao?> (<?=$_POST['quantidade'][0]?>x)</h3></li>
                  <?php
                  endforeach;
              }
              ?>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-3">
              <h2>Valor Total:</h2>
              <h3>R$ <?=number_format($_SESSION['preco_final'],2,',','.')?></h3>
          </div>
      </div>
  </div>
    <hr>
    <form action="" method="post">
        <script type="text/javascript">
            function id(el) {
                return document.getElementById(el);
            }
            function mostra(element) {
                if (element) {
                    id(element.value).style.display = 'block';
                }
            }
            function esconde_todos($element, tagName) {
                var $elements = $element.getElementsByTagName(tagName),
                    i = $elements.length;
                while(i--) {
                    $elements[i].style.display = 'none';
                }
            }
            window.addEventListener('load', function() {
                var $cartao = id('cartao'),
                    $dinheiro = id('dinheiro'),
                    $tipo = id('tipo');

                //mostrando no onload da página
                esconde_todos(id('palco'), 'div');
                mostra(document.querySelector('input[name="pagamento"]:checked'));


                //mostrando ao clicar no radio
                var $radios = document.querySelectorAll('input[name="pagamento"]');
                $radios = [].slice.call($radios);

                $radios.forEach(function($each) {
                    $each.addEventListener('click', function() {
                        esconde_todos(id('palco'), 'div');
                        mostra(this);
                    });
                });
            });
        </script>


        <div class="container">
            <h2>Forma de Pagamento</h2><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3"><label id="forma"><input type="radio" name="pagamento" value="cartao"checked>Cartão</label></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label id="forma"><input type="radio" name="pagamento" value="dinheiro"checked>Dinheiro</label>
                    </div>
                </div>
            </div>


            <div class="text-center" id="palco">
                <div id="cartao""><br><input type="radio" value="1" name="cartao" checked>MasterCard Débito
                <input type="radio" name="cartao" value="2">MasterCard Crédito<br><br>
                <input type="radio" value="3" name="cartao">Visa Crédito
                <input type="radio" value="4" name="cartao">Visa Débito
            </div>
            <div id="dinheiro"><br><label><h3>Troco para Quanto?</h3>
                    <input type="number" min="" name="dinheiro" step="any" value="<?=$_SESSION['preco_final']?>"></label>
            </div>
        </div>
</div><br><br><hr>
<?php
    foreach ($this->Dados['dados_usuario'] as $dados_user):
        extract($dados_user);
    ?>
        <h2>Local de Entrega:</h2>
        <h3>
            Seu endereço cadastrado é esse:<br>
            <?=$rua?>,<?=$numero?>, <?=$bairro?>, <?=$cidade?><br>
            Não é mais o seu endereço? clique <a href="dados">Aqui</a>.
        </h3>
    <?php
    endforeach;
?>
<br><br><hr>
<h2>Método de entrega:</h2><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <?php
                foreach ($_POST['quantidade'] as $id=>$qtd):


                    ?>
                    <input type="hidden" name="quantidade[<?=$id?>]" value="<?=$qtd?>" >

            <?php
                endforeach;

            ?>
            <input type="submit" value="Delivery" name="delivery">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
                <input type="submit" value="Retirada" name="retirada">
        </div>
    </div>
</div>
</form>
</div>
<?php
