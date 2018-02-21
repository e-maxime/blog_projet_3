<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Comments;
use \App\Model\Admin\Login;

class AdminController extends Controller
{
    public function __construct()
    {
    
    }

	public function index()
    {   
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Comments');
            $comments = Comments::getReportedComments();
            $this->render('admin.index', compact('comments'));
        }

    }

    public function allEpisodes()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Post');
            $posts = Post::getAllEpisodes();
            $this->render('admin.episodes', compact('posts'));
        }
    }

    public function allComments()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Comments');
            $comments = Comments::getAllComments();
            $this->render('admin.comments', compact('comments'));
        }
        
    }

    public function login()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->render('admin.index');    
        }
        
    }

    public function getLog()
    {
            if(!empty($_POST['username']) AND !empty($_POST['pass']))
        {
            $log = Login::checkLogin();

            if(!$log)
            {
            ?>
                <div class="alert alert-danger">Identifiants incorrects.</div>
            <?php
                $this->render('admin.login');
            }

            else
            {
                $_SESSION['auth'] = $log['id'];
                $this->render('admin.index');
                
                
            }
        }
        else
        {?>
            <div class="alert alert-info">Tous les champs ne sont pas remplis.</div>
        <?php }
        
    }

    public function edit()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Post');
            $post = Post::getOneEpisode($_GET['id']);
            $this->render('admin.edit', compact('post'));
        }
    }

    public function editing()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Post');
            $update = Post::updatePost();
            header('location:index.php?page=admin.allEpisodes');
            ?>
            <div class="alert alert-success">L'article a bien été modifié.</div>
            <?php
        }
    }

    public function deletePost()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Post');
            $delete = Post::deleted();
            header('location:index.php?page=admin.allEpisodes');
        }
    }

    public function deleteComment()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Comments');
            $delete = Comments::deleted();
            header('location:index.php?page=admin.allComments');
        }
    }

    public function add()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->render('admin.add');
        }
    }

    public function adding()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Post');
            $delete = Post::addPost();
            header('location:index.php?page=admin.allEpisodes');
        }
    }

    public function remove()
    {
        $auth = $this->_auth = new Login(\App\App::getDb());
        if(!$auth->logged())
        {
            $this->render('admin.login');
        }
        else
        {
            $this->loadModel('Comments');
            $remove = Comments::removeComments();
            header('location:index.php?page=admin.index');
        }
    }

    public function disconnect()
    {
        session_destroy();
        $this->render('admin.login');
    }
}