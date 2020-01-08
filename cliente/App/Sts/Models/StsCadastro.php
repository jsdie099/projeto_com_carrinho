<?php


namespace Sts\Models;

use Sts\Classes\Usuario;
use Sts\Models\Helper\StsRead;

class StsCadastro
{
    public function index()
    {
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setNumCel($_POST['celular']);
        $usuario->setEmail($_POST['email']);
        $usuario->setRua($_POST['rua']);
        $usuario->setNumRua($_POST['numrua']);
        $usuario->setBairro($_POST['bairro']);
        $usuario->setComplemento($_POST['complemento']);
        $usuario->setCidade($_POST['cidade']);
        $usuario->setCep($_POST['cep']);

        $listar = new StsRead();
        $listar->fullRead("select * from usuario where email = :email","email={$_POST['email']}");
        if(count($listar->getResultado())>0)
        {
            echo "<h2 style='color: white' align='center'>Usuário já cadastrado!</h2>";
        }
        else
        {
            $nome = $usuario->getNome();
            $cpf = $usuario->getCpf();
            $celular = $usuario->getNumCel();
            $email = $usuario->getEmail();
            $rua = $usuario->getRua();
            $bairro = $usuario->getBairro();
            $num_rua = $usuario->getNumRua();
            $complemento = $usuario->getComplemento();
            $cidade = $usuario->getCidade();
            $cep = $usuario->getCep();


            $listar->fullRead("insert into usuario(nome,cpf,celular,email,rua,bairro,numero,complemento,cidade,cep)
            values(:nome,:cpf,:celular,:email,:rua,:bairro,:numrua,:complemento,:cidade,:cep)",
                "nome={$nome}&cpf={$cpf}&celular={$celular}&email={$email}&rua={$rua}&bairro={$bairro}&numrua={$num_rua}&complemento={$complemento}&cidade={$cidade}&cep={$cep}");
            header('location:login');
        }
    }

}