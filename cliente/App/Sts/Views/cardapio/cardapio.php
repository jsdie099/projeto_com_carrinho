<div class="wrapper text-center" id="cardapio">
    <div class="container" style="margin-bottom: 50px;">
        <div class="table-responsive">
            <table class="table">
                    <tr>
                        <td><h3>N°</h3></td>
                        <td><h3>Descrição</h3></td>
                        <td><h3>Preço</h3></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $cont = 0;

                            foreach ($this->Dados as $dados):
                                extract($dados);
                                ?>
                                <h3><a href='carrinho?acao=add&id=<?=$id?>'>Comprar</a></h3>
                                <?php
                                $cont++;
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            $cont = 0;
                            foreach ($this->Dados as $dados):
                                extract($dados);
                                ?>
                                <h3><?=$descricao?></h3>
                                <?php
                                $cont++;
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            $cont = 0;
                            foreach ($this->Dados as $dados):
                                extract($dados);
                                ?>
                                <h3>R$<?=number_format($preco,"2",',','.')?></h3>
                                <?php
                                $cont++;
                            endforeach;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
</div>
