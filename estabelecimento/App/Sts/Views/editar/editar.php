<?php
    foreach($this->Dados as $dados):
        extract($dados);
        ?>
            <div class="wrapper text-center" style="padding-top:50px;">
                <form action="" method="post">
                    <label for="descricao">Nome do Alimento:<br>
                        <input type="text" name="descricao" value="<?=$descricao?>">
                    </label><br>
                    <label for="preco">Preço:<br>
                        <input type="number" step="any" name="preco" value="<?=$preco?>">
                    </label><br>
                    <input type="submit" value="Editar ">
                </form>
            </div>
        <?php
    endforeach;
?>
