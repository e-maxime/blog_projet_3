<?php
namespace App\Controller\Admin;

class Controller
{
    protected $viewPath = '../app/Views/';
    protected $template = 'adminDefault';
    
    protected function render($view, $variables=[])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        if($view === 'admin.login')
        {
            require($this->viewPath . str_replace('.', '/', $view) . '.php');
        }
        else
        {
            require($this->viewPath . 'templates/'. $this->template . '.php');
        }
    }

    protected function loadModel($model_name)
    {
        require('../app/Model/Admin/'.$model_name . ".php");
    }
    
    protected static function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Page introuvable.');
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit. <a href="index.php?posts.index">Retour à l\'accueil</a><br/><a href="index.php?admin.login">Se connecter à l\'espace d\'administration</a>');
    }
}