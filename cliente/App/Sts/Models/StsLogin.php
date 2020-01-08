<?php


namespace Sts\Models;


use Sts\Classes\Usuario;
use Sts\Models\Helper\StsRead;

class StsLogin
{
    public function index()
    {
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->setCpf($_POST['cpf']);
        $email = $usuario->getEmail();
        $cpf = $usuario->getCpf();

        $listar = new StsRead();
        $listar->exeRead("usuario","WHERE email=:email and cpf=:cpf","email={$email}&cpf={$cpf}");
        if(count($listar->getResultado())>0)
        {
            foreach ($listar->getResultado() as $dados) {
                $_SESSION['logado'] = $dados['id'];
            }
            header('location:cardapio');
        }
        else
        {
            echo "<h3 style='color: white' align='center'>Email ou cpf inválidos!</h3>";
        }
    }
}