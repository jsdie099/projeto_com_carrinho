
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
            else if($dados->status==2)
            {
                if(isset($_SESSION['id_pedido2']))
                {
                    echo "<script> 
                            $(document).ready(function sweetalertclick() 
                            {
                                Swal.fire
                                (
                                    'Seu pedido foi aceito',
                                    'Se mantenha nesta tela para receber as notificações',
                                    'success'
                                )
                            } );
                            </script>";
                    unset($_SESSION['id_pedido2']);
                }
            }
            else if($dados->status==3)
            {
                
                if(isset($_SESSION['id_pedido3']))
                {
                    echo "<script> 
                                $(document).ready(function sweetalertclick() 
                                {
                                    Swal.fire
                                    (
                                        'Seu pedido saiu para entrega',
                                        'Em breve o entregador chegará a sua localização'
                                    )
                                } );
                        </script>";
                        unset($_SESSION['id_pedido3']);
                }
            }
            else if($dados->status==4)
            {
                if(isset($_SESSION['id_pedido']))
                {
                    echo "<script> 
                            $(document).ready(function sweetalertclick() 
                                {
                                    Swal.fire
                                    (
                                        'Seu pedido chegou =)',
                                        'Desejamos boa apetite',
                                        'success'
                                    )
                                } );
                        </script>";
                    unset($_SESSION['id_pedido']);
                }
            }
            else
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
    