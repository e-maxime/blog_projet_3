<?php
namespace App\Controller;

class Controller
{
    protected $viewPath = '../app/Views/';
    protected $template;
    
    protected function render($view, $variables=[])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();

        $tableView = explode('.', $view);
        
        if($view === 'admin.login')
        {
            $this->template = 'loginTemplate';
            require($this->viewPath . 'templates/' . $this->template . '.php');
        }

        elseif($tableView[0] === 'admin')
        {
            $this->template = 'adminDefault';
            require($this->viewPath . 'templates/' . $this->template . '.php');
        }

        else
        {
            $this->template = 'default';
            require($this->viewPath . 'templates/'. $this->template . '.php');
        }
    }
    
    protected function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?page=404');
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit. <a href="home">Retour à l\'accueil</a><br/><a href="login">Se connecter à l\'espace d\'administration</a>');
    }
}