
<?php
   
    if($this->title[2] == 'entregador' || $this->title[2] == 'finalizacao')
    {
        ?>
            <header>
                <div class="container-fluid">
                    <nav class="navbar-fixed-top navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barraBasica">
                                <span class="sr-only">Toggle navigation</span><!--Dica para tecnologias assistivas. Notar a classe sr-only
                                mostrar este conteúdo somente para aquelas tecnologias--->
                                <span class="icon-bar"></span><!--Classe icon-bar para criar as três linhas do ícone hamburger. -->
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="home">
                                <img src="assets/imagens/logo.jpg" title="Super Rango"  style="height: 60px; width: 60px; margin-left: 50px;" >
                            </a>
                        </div>
                        <div class="container">
                        <div class="collapse navbar-collapse navbar-right text-center" id="barraBasica">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="sair"><h3>Sair</h3></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
        <?php
    }
    else
    {
        ?>
        <header>
            <div class="container-fluid">
                <nav class="navbar-fixed-top navbar-inverse">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="home"><img src="assets/imagens/logo.jpg" style="height: 60px; width: 60px; margin-left: 50px;" title="Super Rango" ></a>
                    </div>
                    
            </div>
                </nav>
            </div>
        </header>'
        <?php
    }
?>