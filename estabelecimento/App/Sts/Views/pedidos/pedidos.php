
<div class="wrapper text-center">
    <h1 class="titulo">Pedidos Pendentes</h1><br><br>        
            <script>
                $(document).ready(function () {
                    atualiza();
                });
                function atualiza() 
                {
                    $.get("assets/js/acao_funcionario.php",function (resultado) {
                    $('#notificacao').html(resultado);
                });
                setTimeout('atualiza()',5000);
            }
        </script>
        <h1 id="nenhum" style="display: none;">Nenhum pedido no momento!</h1>
    <h1 id="notificacao">
        <?php
            require_once "assets/js/acao_funcionario.php";
        ?>
    </h1>
</div>
