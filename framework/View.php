<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/19/2017 8:57 PM
 */

namespace framework;

trait View
{
    public $assign = array();

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $template = MODULE_PATH . 'views/' . $file . '.html';
        if (is_file($template)) {
            $loader = new \Twig_Loader_Filesystem(MODULE_PATH . 'views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => MODULE_PATH . 'log/twig_cache',
                'debug' => DEBUG,
            ));

            $twig->addExtension(new \Twig_Extension_Debug());

            echo $twig->render($file . '.html', $this->assign);
        } else {
            if (DEBUG) {
                throw new \Exception($template . ' is not a template file');
            } else {
                // 跳转到404
                header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
                echo '404';
            }
        }
    }
}
