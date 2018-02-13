<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Login;

class AdminController extends Controller
{
	public function index()
    {
        $this->render('admin.index');
    }

    public function allEpisodes()
    {
        $this->loadModel('Post');
        $posts = Post::getAllEpisodes();
        $this->render('admin.episodes', compact('posts'));
    }

    public function login()
    {
    	require('../app/Views/admin/login.php');
    }

    public function getLog()
    {
    	$this->loadModel('Login');
    	$log = Login::checkLogin();
    }

}