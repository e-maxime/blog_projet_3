<?php
namespace Core\Controller;

class Controller
{
    protected $viewPath;
    protected $template;
    
    protected function render($view, $variables=[])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . 'posts/' . $view . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/'. $this->template . '.php');
    }

    protected function loadModel($model_name)
    {
        require('../app/Model/'.$model_name . ".php");
    }
    
    protected static function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?page=404');
    }
}