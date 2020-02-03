
    <script src="assets/js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#celular').mask('(00)0 0000-0000');
            $('#cep').mask('00000-000');
            document.getElementById("cpf").autocomplete = 'on';
        })
    </script>
<div class="wrapper text-center">
    <h1 class="titulo">Login do Cliente</h1>
    <form action="" method="post">
        <label >E-mail:<br>
            <input type="email" name="email" required placeholder="E-mail"></label><br>
        <label>CPF: (somente números)<br>
            <input type="text" name="cpf"  id="cpf"  required placeholder="CPF" autocomplete="on">
        </label><br><br>
        <input type="submit" value="Enviar"><br><br>
        <h2>Ainda não tem sua conta?<a href="cadastro"> Cadastre-se</a></h2><br>
    </form>

</div>
