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
    

    $sql = "select * from pedido where status between 2 and 3 order by id";
    $exec = $db->query($sql);
    $rows = $exec->num_rows;
    if($rows>0)
    {
        while($dados = $exec->fetch_object())
        {
            $dados_user = "select * from usuario where id={$dados->id_cliente}";
            $results = $db->query($dados_user);
            $result_dados = $results->num_rows;
            if($result_dados>0)
            {
                while($dados_user = $results->fetch_object())
                {
                    $nome = explode(" ",$dados_user->nome);
            ?>
                    <script>
                        var selecionados;
                        $('[name="status"]').on('change', function() {
                            selecionados = $('[name="status"] :selected')
                                .map(function(){
                                    if($(this).val() != '')
                                        return $(this).text();
                                }).get();
                        });

                        $("#btn").on('click', function(){
                            if(selecionados == null)
                            {
                                alert("Selecione alguma das opções");
                                event.preventDefault();
                            }
                        });
                    </script>
            <div class="container text-center" id="teste">
                
                <div class="row"style="margin-bottom:120px;">
                    
                    <div class="col-md-4">
                    <h3>
                        Pedido N° <?=$dados->id?> <br>(<?=$nome[0]?>, Endereco: <?=$dados_user->rua?> - 
                        <?=$dados_user->numero?>, <br><?=$dados_user->bairro?>, preço: R$<?=number_format($dados->preco,2,',','.')?>)
                    </h3>
                    </div>
                    <form method="post" action="finalizar?id=<?=$dados->id?>">
                    <div class="col-md-3"></div>  
                    <div class="col-md-3">
                        <h3>Escolher:</h3>

                            <select name="status" id="status">
                                <option value="0"></option>
                                <option value="1">Saiu para entrega</option>
                                <option value="2">Chegou ao destino</option>
                            </select>

                    </div>
                    <div class="col-md-2">
                            <input type="submit" value="Enviar" id="btn">
                            
                    </div>
                </div>
                </form>
            </div>

        <?php

                }
            } 
        }
    }

    ?>