<?php
//Configurações Adicionais
ini_set("intl.default_locale", "pt_BR");
date_default_timezone_set('America/Sao_Paulo');

//Configurações para ambiente DEV
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);


/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Setup autoloading
include 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(include 'config/application.config.php')->run();
