<?php

// we're creating constants that we're going to be able to use all the time we want
define('DS', DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

//load configuration and helper functions ,reason being we might want to use someof those inside our classes
require_once(ROOT.DS.'config'.DS.'config.php');
require_once(ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS.'functions.php');
//we want to autoload our classes php gives us a great way to do this
//we have to make sure that the files exist and if they exist we gonna require them (we do that bu if else statements)
function autoload($className){
    if(file_exists(ROOT.DS.'core'.DS.$className.'.php')){
        require_once(ROOT.DS.'core'.DS.$className.'.php');
    }elseif (file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php')) {
        require_once(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php');
    }elseif (file_exists(ROOT.DS.'app'.DS.'models'.DS.$className.'.php')) {
        require_once(ROOT.DS.'app'.DS.'models'.DS.$className.'.php');
    }
}

spl_autoload_register('autoload');

spl_autoload_register(); 
//allows you to register multiple functions (or static methods from your own Autoload class) that PHP will put into a stack/queue and call sequentially when a "new Class" is declared
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/',ltrim($_SERVER['PATH_INFO'],'/')) : [];



//Route the request (we're going to use a class  called route and its only gonna accept one pareameter called url )

Router::route($url);
