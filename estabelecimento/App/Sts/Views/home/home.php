<script src="assets/js/jquery.mask.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
           
        })
    </script>
<div class="wrapper text-center">

        <h1>Login do Funcionário</h1>
        <form action="" method="post">

            <h3>Tipo de Login:</h3>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" id="select">
                        <form action="" method="post"></form>
                            <select name="funcionario" required>
                                <option value=""></option>
                                <option value="1" >FUNCIONÁRIO</option>
                                <option value="2" >ENTREGADOR</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                        <label for="nome">Nome:<br>
                            <input type="text" name="nome" required placeholder="Nome">
                        </label><br>
                        <label for="cpf">CPF: <br>
                            <input type="text" name="cpf" id="cpf" required placeholder="CPF">
                        </label><br>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>
    
    </div>