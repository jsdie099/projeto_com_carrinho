
<script src="assets/js/jquery.mask.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#celular').mask('(00)0 0000-0000');
        $('#cep').mask('00000-000');
        document.getElementById("cpf").autocomplete = 'on';
        document.getElementById("celular").autocomplete = 'on';
        document.getElementById("cep").autocomplete = 'on';
    })
</script>
<?php
foreach ($this->Dados as $dados):
    extract($dados);
    ?>
    <div class="wrapper container text-center" style="margin-bottom: 50px;">
        <h2>Alteração dos dados</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <label> Nome:<br>
                        <input type="text" name="nome" required value="<?=$nome?>"></label><br>
                    <label>CPF:<br>
                        <input type="text" name="cpf" id="cpf" required value="<?=$cpf?>"></label><br>
                    <label>Número do Celular:<br>
                        <input type="text" name="celular" id="celular" required value="<?=$celular?>" ></label><br>
                    <label>E-mail:<br>
                        <input type="email" name="email" required value="<?=$email?>"></label><br>
                    <label>Rua:<br>
                        <input type="text" name="rua" required value="<?=$rua?>"></label><br>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <label>Número:<br>
                        <input type="text" name="numrua" required value="<?=$numero?>"></label><br>
                    <label>Bairro:<br>
                        <input type="text" name="bairro" required value="<?=$bairro?>"></label><br>

                    <label>Complemento<br>
                        <input type="text" name="complemento" value="<?=$complemento?>"></label><br>
                    <label>Cidade:<br>
                        <input type="text" name="cidade" required value="<?=$cidade?>"></label><br>
                    <label>CEP:<br>
                        <input type="text" name="cep" id="cep" required value="<?=$cep?>"></label><br>
                </div>
                <div class="col-md-1"></div>
            </div>

            <input type="submit" value="Enviar">
            <?php
            if(isset($_SESSION['sucesso']))
            {
                echo $_SESSION['sucesso'];
                unset($_SESSION['sucesso']);
            }
            if(isset($_SESSION['endereco']))
            {
                echo "<br>".$_SESSION['endereco'];
            }
            ?>
        </form>
    </div>
<?php
endforeach;
?>
