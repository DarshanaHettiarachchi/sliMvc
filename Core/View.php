<?php
namespace Core;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view"; //relative to core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("View $file not found");
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        echo $twig->render($template, $args);
    }
}
