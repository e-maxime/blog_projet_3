<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Comments;
use \App\Model\Admin\Login;

class AdminController extends Controller
{
	public function index()
    {   
        $this->loadModel('Comments');
        $comments = Comments::getReportedComments();
        $this->render('admin.index', compact('comments'));
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
        if($this->auth)
        {
            $this->render('admin.index');
        }
        else
        {
            $this->render('admin.login');    
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
                header('Location: index.php?page=admin.index');   
            }
        }
        else
        {
        ?>
            <div class="alert alert-warning">Tous les champs ne sont pas remplis.</div>
        <?php
            $this->render('admin.login');
        }
        
    }

    public function edit()
    {
        $this->loadModel('Post');
        $post = Post::getOneEpisode($_GET['id']);
        $this->render('admin.edit', compact('post'));
    }

    public function editing()
    {
        $this->loadModel('Post');
        $update = Post::updatePost();
        header('location:index.php?page=admin.allEpisodes');
        ?>
        <div class="alert alert-success">L'article a bien été modifié.</div>
        <?php
    }

    public function deletePost()
    {
        $this->loadModel('Post');
        $delete = Post::deleted();
        header('location:index.php?page=admin.allEpisodes');
    }

    public function deleteComment()
    {
        $this->loadModel('Comments');
        $delete = Comments::deleted();
        header('location:index.php?page=admin.allComments');
    }

    public function add()
    {
        $this->render('admin.add');
    }

    public function adding()
    {
        $this->loadModel('Post');
        $delete = Post::addPost();
        header('location:index.php?page=admin.allEpisodes');
    }

    public function remove()
    {
        $this->loadModel('Comments');
        $remove = Comments::removeComments();
        header('location:index.php?page=admin.index');
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: index.php?page=admin.login');
    }
}