<?php
namespace Sts\Models;
use Sts\Classes\Funcionario;
use Sts\Models\Helper\StsRead;

class StsHome
{
    public function index()
    {
        $funcionario = new Funcionario();
        $funcionario->setTipo($_POST['funcionario']);
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCpf($_POST['cpf']);
        $nome = $funcionario->getNome();
        $cpf = $funcionario->getCpf();

        $listar = new StsRead();
        $listar->exeRead("funcionario","WHERE nome=:nome and cpf=:cpf","nome={$nome}&cpf={$cpf}");
        if(count($listar->getResultado())>0)
        {
            foreach ($listar->getResultado() as $dados) {
                $_SESSION['logado_f'] = $dados['id'];
                $_SESSION['id_estabelecimento'] = $dados['id_estabelecimento'];
            }
            if($funcionario->getTipo()==1)
            {
                header("location:pedidos");
            }
            elseif($funcionario->getTipo()==2)
            {
                header("location:entregador");
            }
            else
            {
                echo "<h3 style='color: white' align='center'>Email ou cpf inválidos!</h3>";
            }
        }
        else
        {
            echo "<h3 style='color: white' align='center'>Email ou cpf inválidos!</h3>";
        }
    }
}