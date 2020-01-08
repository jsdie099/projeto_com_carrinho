<?php
namespace Sts\Controllers;

class Sair
{
    public function index()
    {
        unset($_SESSION['logado_f']);
        header('location:home');
    }
}