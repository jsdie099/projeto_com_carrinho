<?php
namespace Sts\Models;
use Sts\Classes\Usuario;
use Sts\Models\Helper\StsRead;

class StsDados
{
    private $dados;
    public function index()
    {
        $listar = new StsRead();
        $listar->exeRead("usuario","where id=:id","id={$_SESSION['logado']}");
        return $this->dados=$listar->getResultado();
    }
    public function update()
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


        $mudar = new StsRead();
        $mudar->fullRead("update usuario set nome=:nome, cpf=:cpf, celular=:celular, email=:email, rua=:rua, bairro=:bairro, numero=:numero,complemento=:complemento, cidade=:cidade, cep=:cep where id=:id",
            "nome={$nome}&cpf={$cpf}&celular={$celular}&email={$email}&rua={$rua}&bairro={$bairro}&numero={$num_rua}&complemento={$complemento}&cidade={$cidade}&cep={$cep}&id={$_SESSION['logado']}");
        if(count($mudar->getResultado())>0)
        {
            $_SESSION['erro'] = "<h3 style='color: white' align='center'>Algo deu errado!</h3>";
        }
        else
        {
            $_SESSION['sucesso'] = "<h3 style='color: white' align='center'>Dados alterados com sucesso!</h3>";
        }
    }
}