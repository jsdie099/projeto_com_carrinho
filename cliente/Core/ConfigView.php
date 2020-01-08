<?php
namespace Core;
class ConfigView
{
    private $Dados;
    private $nome;
    private $title;
    public function __construct($nome,$dados=null)
    {
        $this->nome=$nome;
        $this->Dados=$dados;
        $this->title =  explode(".",$this->nome);
        $this->title =  explode("/",$this->nome);
    }

    public function renderizar()
    {
        if($this->nome=="Sts/Views/home/home" || $this->nome=="Sts/Views/login/login" || $this->nome=="Sts/Views/cadastro/cadastro")
        {
            include 'App/Sts/Views/includes/header.php';
            include 'App/Sts/Views/includes/menu_inicial.php';
            include 'App/'.$this->nome.'.php';
            include 'App/Sts/Views/includes/footer.php';
        }
        else
        {
            if(file_exists('App/'.$this->nome.'.php'))
            {
                include 'App/Sts/Views/includes/header.php';
                include 'App/Sts/Views/includes/menu.php';
                include 'App/'.$this->nome.'.php';
                include 'App/Sts/Views/includes/footer.php';
                
            }
            else
            {
                include 'App/Sts/Views/includes/header.php';
                include 'App/Sts/Views/includes/menu.php';
                include "App/Sts/Views/erro/erro.php";
                include 'App/Sts/Views/includes/footer.php';

            }
        }
    }
}