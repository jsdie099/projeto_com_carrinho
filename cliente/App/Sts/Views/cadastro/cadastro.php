
    <script src="assets/js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#celular').mask('(00)0 0000-0000');
            $('#cep').mask('00000-000');
        })
    </script>
<div class="wrapper text-center" style="margin-bottom: 50px;">
<h1>Cadastro do Cliente</h1>
            <form action="" method="post">
                <div class="bloco">
                    <div id="esquerda">
                        <label> Nome:<br>
                        <input type="text" name="nome" required placeholder="Nome"></label><br>
                        <label>CPF:<br>
                        <input type="text" name="cpf" id="cpf" required placeholder="CPF"></label><br>
                        <label>Número do Celular:(sem espaço)<br>
                        <input type="text" name="celular" id="celular" required placeholder="xx xxxxxxxxx"></label><br>
                        <label>E-mail:<br>
                        <input type="email" name="email" required placeholder="E-mail"></label><br>
                        <label>Rua:<br>
                        <input type="text" name="rua" required placeholder="Nome da rua"></label><br>
                    </div>
                    <div id="direita">
                        <label>Número:<br>
                        <input type="text" name="numrua" required placeholder="Número da casa"></label><br>
                        <label>Bairro:<br>
                        <input type="text" name="bairro" required placeholder="Nome do bairro"></label><br>
                        <label>Complemento (opcional):<br>
                        <input type="text" name="complemento" placeholder="Complemento"></label><br>
                        <label>Cidade:<br>
                        <input type="text" name="cidade" required placeholder="Nome da cidade"></label><br>
                        <label>CEP:<br>
                        <input type="text" name="cep" id="cep" required placeholder="CEP da cidade"></label><br>
                    </div>
                </div>
                <input type="submit" value="Enviar">
                <h2 style="padding-bottom: 50px;">Já tem sua conta? <a href="login">Login</a></h2>
                <?php #if(isset($_SESSION['erro'])):
                    #echo "<h2>Usuário já cadastrado</h2>";
                    #unset($_SESSION['erro']);
                    #else:
                    #return 0;
                #endif;
                ?>
            </form>

</div>
