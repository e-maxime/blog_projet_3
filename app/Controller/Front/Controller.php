<?php
namespace App\Controller\Front;

class Controller
{
    protected $viewPath = '../app/Views/';
    protected $template = 'default';
    
    protected function render($view, $variables=[])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/'. $this->template . '.php');
    }

    protected function loadModel($model_name)
    {
        require('../app/Model/Front/'. $model_name . ".php");
    }
    
    protected function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?page=404');
    }
}