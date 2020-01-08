<?php

    unset($_SESSION['endereco']);
    if(!$this->Dados and isset($_GET['id_pedido'])):
        $_SESSION['id_pedido']=(int)$_GET['id_pedido'];
        $_SESSION['id_pedido4']=(int)$_GET['id_pedido'];
        $_SESSION['id_pedido1']=(int)$_GET['id_pedido'];
        $_SESSION['id_pedido2'] = (int)$_GET['id_pedido'];
        $_SESSION['id_pedido3'] = (int)$_GET['id_pedido'];    
    else:
        foreach($this->Dados['dados'] as $dados): 
            extract($dados);
            $_SESSION['pedido'] = $id;
            $_SESSION['id_pedido4']=$id;
            $_SESSION['id_pedido'] = $id;
            $_SESSION['id_pedido1'] = $id;
            $_SESSION['id_pedido2'] = $id;
            $_SESSION['id_pedido3'] = $id;
            $_SESSION['status'] = $status;
        endforeach;
    endif;
?>
<script src="assets/js/sweetalert2.all.min.js"></script>
<script>
            $(document).ready(function () {
                atualiza();
            });
            function atualiza() {
                $.get("assets/js/acao_entrega.php",function (resultado) {
                    $('#notificacao').html(resultado);
                });
                setTimeout('atualiza()',5000);
            }
</script>
<div id="notificacao" class="text-center">
</div>
<div class="wrapper text-center" >
    <h3 style="padding-top:100px;">Aqui é onde você receberá as notificações sobre seu pedido,<br>
         o entregador também irá notificá-lo quando for deixá-lo com você,<br>
        muito obrigado pela preferência e esperamos que volte logo.
    </h3>
    <h2><a href="cardapio">Voltar ao cardápio</a></h2>
</div>

<?php
    require_once "assets/js/acao_entrega.php";
?>
