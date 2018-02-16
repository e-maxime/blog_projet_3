<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Comments;
use \App\Model\Admin\Login;

class AdminController extends Controller
{
	public function index()
    {   
        $auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            require('../app/Views/admin/login.php');
        }
        else
        {
            $this->render('admin.index');   
        }
    }

    public function allEpisodes()
    {
        $this->loadModel('Post');
        $posts = Post::getAllEpisodes();
        $this->render('admin.episodes', compact('posts'));
    }

    public function allComments()
    {
        $this->loadModel('Comments');
        $comments = Comments::getAllComments();
        $this->render('admin.comments', compact('comments'));
    }

    public function login()
    {
    	require('../app/Views/admin/login.php');
    }

    public function getLog()
    {
    	$this->loadModel('Login');
    	$log = Login::checkLogin();

        if(!$log)
        {
        ?>
            <div class="alert alert-danger">Identifiants incorrects.</div>
        <?php
            require('../app/Views/admin/login.php');
        }

        else
        {
            $_SESSION['auth'] = $log['id'];
            $this->render('admin.index');
        }
    }

    public function disconnect()
    {
        session_destroy();
        require('../app/Views/admin/login.php');
    }

}