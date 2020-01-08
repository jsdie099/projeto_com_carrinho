<?php

foreach ($_SESSION['pedido'] as $dados) {
    extract($dados);
    $_SESSION['endereco'] = '<a href="pedido">Retornar ao pedido</a>';
}
?>
<div class="wrapper container text-center">
  <div class="container">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-3">
              <h2> Número da Escolha:</h2>
              <?php
              foreach ($_SESSION['pedido'] as $dados):
                  extract($dados);
                  ?>
                  <h2><?=$tipo?></h2>
              <?php
              endforeach;
              ?>

          </div>
          <div class="col-md-2"></div>
          <div class="col-md-3">
              <h2>Valor Total:</h2>
              <?php
              foreach ($_SESSION['pedido'] as $dados):
                  extract($dados);
                  ?>
                  <h2><?=number_format($preco,"2",",",".")?></h2>
              <?php
              endforeach;
              ?>
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
                    <?php
                    foreach ($_SESSION['pedido'] as $dados) {
                    extract($dados);
                    ?>
                    <input type="number" min="" name="dinheiro" step="any" value="<?=$preco?>"></label>
                <?php
                }
                ?>
            </div>

        </div>

</div><br><br><hr>
<h2>Local de Entrega:</h2>
<?php
foreach ($this->Dados as $dados) :
    extract($dados);

    ?>
    <h3>
        Seu endereço cadastrado é esse:<br>
        <?=$rua?>, <?=$numero?>, <?=$bairro?>, <?=$cidade?>.<br>
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
            foreach ($_SESSION['pedido'] as $dados) {
                extract($dados);
                ?>
                <input type="submit" value="Delivery" formaction="entrega?id_pedido=<?=$id?>">
            <?php
            }
            ?>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <?php
            foreach ($_SESSION['pedido'] as $dados) {
                extract($dados);
                ?>
                <input type="submit" value="Retirada" formaction="retirada?id_pedido=<?=$id?>">
                <?php
            }
            ?>

        </div>
    </div>

</div>



</form>

</div>
