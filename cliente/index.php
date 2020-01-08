<?php
require_once './Core/config.php';
require_once './vendor/autoload.php';
use Core\ConfigController;
$controller = new ConfigController();
$controller->carregar();
