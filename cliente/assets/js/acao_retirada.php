
<script src="assets/js/sweetalert2.all.js"></script>

<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    $db = new mysqli("localhost","root","","super_rango");
    $db->set_charset('utf8');
    $id = $_SESSION['id_pedido4'];
    $sql = "select * from pedido where id={$id}";
    $exec = $db->query($sql);
    $rows = $exec->num_rows;
    if($rows>0)
    {
        while($dados = $exec->fetch_object())
        {
            if($dados->status==1)
            {
                if(isset($_SESSION['id_pedido1']))
                {
                    echo "<script>
                                $(document).ready(function sweetalertclick() 
                                {
                                    Swal.fire
                                    (
                                        'Seu pedido ainda aguarda aprovação',
                                        'Se mantenha nesta tela para receber as notificações',
                                        ''
                                    )
                            } );
                        </script>";
                    unset($_SESSION['id_pedido1']);
                }
            }
            if($dados->status==2)
            {
                if(isset($_SESSION['id_pedido2']))
                {
                    echo "<script> 
                            $(document).ready(function sweetalertclick() 
                            {
                                Swal.fire
                                (
                                    'Seu pedido foi aprovado',
                                    'Você já pode se direcionar ao estabelecimento',
                                    'success'
                                )
                            } );
                            </script>";
                    unset($_SESSION['id_pedido2']);
                }
            }
            
            if($dados->status==0)
            {
                if(isset($_SESSION['id_pedido']))
                {
                    echo "<script> 
                            $(document).ready(function sweetalertclick() 
                            {
                                Swal.fire(
                                    'Seu pedido foi negado =(',
                                    'Clique em ok para ser redirecionado ao cardápio novamente',
                                    'error'
                                )
                            } );
                            window.onclick = function() 
                            {
                                window.location.href='cardapio';
                            }
                        </script>";
                    unset($_SESSION['id_pedido']);
                }
            }
        
        
        }
    }
        