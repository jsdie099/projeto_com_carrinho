<?php
    if($_GET['pagina']>((count($this->Dados['paginacao'])/10)+1) || $_GET['pagina']<=0):
        $_GET['pagina']=1;
        echo"<h1 align='center' style='padding-top:100px;'>Ops, nada por aqui!</h1>";
    
    else:
?>
        <div class="wrapper text-center" id="table_hist">
            <div class="container">
                <table class="table table-bordered table-responsive" >
                    <tr>
                        <td >
                            <h3>Identificação</h3>
                        </td>
                        <td>
                            <h3>Preço</h3>
                        </td>
                        <td>
                            <h3>Status</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $cont=0;
                            
                            foreach ($this->Dados['dados'] as $dados):
                                extract($dados);
                                
                            ?>
                                <h3><?=$id?></h3>
                            <?php
                            $cont++;
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            $cont =0;

                            foreach ($this->Dados['dados'] as $dados):
                                extract($dados);
                                ?>
                                <h3><?=number_format($preco,"2",",",".")?></h3>
                                <?php
                                $cont++;
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            $cont = 0;
                            
                            foreach ($this->Dados['dados'] as $dados):
                                extract($dados);
                                
                                switch ($status):
                                    case 0:
                                        $status = "Pedido negado";
                                    break;
                                    case 1:
                                         $status = "Pedido em aberto";
                                        break;
                                    case 2:
                                        
                                        $status = "Pedido em andamento";
                                        
                                        break;
                                    case 3:
                                        $status = "Pedido em andamento";
                                        break;
                                    case 4:
                                        $status = "Pedido Finalizado";
                                        break;
                                endswitch;
                                ?>
                                
                                <h3><?=$status?></h3>
                                <?php
                                $cont++;
                            endforeach;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?php 
                $num_total = count($this->Dados['paginacao']);
                $num_paginas = ceil($num_total/10);
                if($_GET['pagina']>$num_paginas):
                    $valor = $_GET['pagina']-1;
                else:
                    $valor=1;
                endif;
                
            ?>
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    <?php
                        if($_GET['pagina']==1):
                        ?>
                            <li class="page-item disabled">
                                <a class="page-link">Anterior</a>
                            </li>
                    <?php                
                        else:
                            $valor = $_GET['pagina']-1;
                    ?>
                            <li class="page-item">
                                <a class="page-link" href="historico?pagina=<?=$valor?>">Anterior</a>
                            </li>
                    <?php 
                        endif;
                        
                        for($i=1;$i<=$num_paginas;$i++):
                            if($_GET['pagina']==1):
                                ?>
                                <li class="page-item <?php if($i==$_GET['pagina']){echo'active';}?>"><a class="page-link" href="historico?pagina=<?=$i?>"><?=$i?></a></li>
                                <?php
                            else:
                                ?>
                                <li class="page-item <?php if($i==$_GET['pagina']){echo'active';}?>"><a class="page-link" href="historico?pagina=<?=$i?>"><?=$i?></a></li>
                                <?php
                            endif;
                        endfor;
                        if($_GET['pagina']<$num_paginas):
                            $valor=$_GET['pagina']+1;
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="historico?pagina=<?=$valor?>">Próximo</a>
                                </li>
                            <?php
                        else:
                            ?>
                                <li class="page-item disabled">
                                    <a class="page-link ">Próximo</a>
                                </li>
                            <?php
                        endif;
                    ?>      
                </ul>
            </nav>
        </div>
<?php
    endif;
?>