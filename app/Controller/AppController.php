<?php
namespace App\Controller;

use Core\Controller\Controller; 

require ('../core/Controller.php');

class AppController extends Controller
{
    protected $template = 'default';
    
    public function __construct()
    {
        $this->viewPath = '../app/Views/';
    }
}