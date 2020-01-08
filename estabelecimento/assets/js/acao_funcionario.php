<script>
    $(document).ready(function(){
        if($("#teste").length)
        {
            $("#nenhum").css('display','none');
            $("#nenhum").hide();
        }
        else
        {
            $("#nenhum").fadeIn(2000).delay(2000);
            $("#nenhum").fadeOut(2000);
        }
    });
</script>
<?php
    $db = new mysqli('localhost','root','','super_rango');
    $db->set_charset('utf8');
    $sql = "select * from vw_pedido_funcionario";
    $exec = $db->query($sql);
    $rows = $exec->num_rows;
    if($rows>0)
    {
        while($dados = $exec->fetch_object())
        {
            $quantidade = explode(",",$dados->quantidade);
            $descricao = explode(",",$dados->descricao);
            if(strstr($dados->forma,"entrega"))
            {
                $forma = "entrega";
            }
            if(strstr($dados->forma,"retirada"))
            {
                $forma = "retirada";
            }
            ?>
            <div class="container text-center" id="teste">
                <div class="row"style="margin-bottom:20px;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <h3>
                        Pedido N° <?=$dados->id?> <br>
                        (alimentos: <?php for ($i=0;$i<count($descricao);$i++): echo $descricao[$i].'(x'.$quantidade[$i].'), ';  endfor; ?>
                        preço: R$<?=number_format($dados->preco,2,',','.')?>,<br>
                         forma: <?=$forma?>)
                    </h3>
                    </div>
                    <div class="col-md-3"></div>  
                </div>
                <div class="row"style="margin-bottom:100px;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h3>Escolher:</h3>
                        <a href="notificacao?id=<?=$dados->id?>">
                            <img src="assets/imagens/teste.png" alt="" title="Aceitar" style="width:40px; height:40px;">
                        </a>
                        <a href="excluirpedido?id=<?=$dados->id?>">
                            <img src="assets/imagens/images.png" alt="" title="Negar" style="width:40px; height:40px;">
                        </a>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>