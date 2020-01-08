<?php

namespace Core;
class ConfigController
{
    private $url;
    private $urlConjunto;
    private $urlController;
    private $urlParametro;
    private static $format;

    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET,'url',FILTER_DEFAULT)))
        {
            $this->url = filter_input(INPUT_GET,'url',FILTER_DEFAULT);
            $this->limparUrl();
            $this->urlConjunto = explode("/",$this->url);

            if(isset($this->urlConjunto[0]))
            {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            }
            else
            {
                $this->urlController="Home";
            }

            if(isset($this->urlConjunto[1]))
            {
                $this->urlParametro = $this->urlConjunto[1];
            }
            else
            {
                $this->urlParametro=null;
            }
            #echo "URL: {$this->url} <br>";
            #echo "Controller: {$this->urlController} <br>";
        }
        else
        {
            $this->urlController = "Home";
            $this->urlParametro=null;
        }
    }
    private function limparUrl()
    {
        //Eliminar as tags
        $this->Url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->Url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->Url = rtrim($this->url, "/");

        self::$format = array();
        self::$format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->Url = strtr(utf8_decode($this->url), utf8_decode(self::$format['a']), self::$format['b']);
    }

    public function slugController($slugController)
    {
        $urlController = strtolower($slugController);
        $urlController = explode("-",$urlController);
        $urlController = implode(" ",$urlController);
        $urlController = ucwords($urlController);
        $urlController = str_replace(" ", "", $urlController);

        return $urlController;
    }

    public function carregar()
    {
        if(class_exists("\\Sts\\Controllers\\".$this->urlController))
        {
            $classe = "\\Sts\\Controllers\\".$this->urlController;
            $classeCarregar = new $classe;
            $classeCarregar->index();
        }
        else
        {
            $this->urlController = 'erro';
            $classe = "\\Sts\\Controllers\\".$this->urlController;
            $classeCarregar = new $classe;
            $classeCarregar->index();
        }

    }
}