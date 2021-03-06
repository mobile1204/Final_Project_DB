<?php
namespace Core;
ini_set('display_errors',1);
error_reporting(E_ALL);
class View
{
    public static function render($view, $args=[])
    {
        extract($args,EXTR_SKIP);

        $file = dirname(__DIR__)."/App/Views/$view";

        if (is_readable($file)) {
            require $file;
        }else{
            echo "file not found";
        }
    }

    public static function renderTemplate($template, $args=[])
    {
        static $twig =null;
        if ($twig ===null) {
            $loader = new \Twig_Loader_Filesystem(dirname(__DIR__). '/App/Views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($template, $args);
    }

}


?>