<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Comments;
use \App\Model\Admin\Login;
use \App\Controller\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $auth = new \App\Model\Admin\Login();
        $path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
        $path = parse_url($path, PHP_URL_PATH);
        $path = rtrim($path, '/');

        if(!$auth->logged() && $path != 'login')
        {
            header('Location: login');
        }
        elseif($auth->logged() & $path === 'login')
        {
            header('Location: dashboard');
        }
    }

	public function index()
    {   
        $comments = Comments::getReportedComments();
        $this->render('admin.index', compact('comments'));
    }

    public function allEpisodes()
    {
        $posts = Post::getAllEpisodes();
        $this->render('admin.episodes', compact('posts'));
    }

    public function allComments()
    {
        $comments = Comments::getAllComments();
        $this->render('admin.comments', compact('comments')); 
    }

    public function login()
    {
        $this->render('admin.login');  
    }

    public function getLog()
    {
        if(!empty($_POST['username']) AND !empty($_POST['pass']))
        {
            $log = Login::checkLogin();

            if(!$log)
            {
                header('Location: login?msg=1');
            }

            else
            {
                $_SESSION['auth'] = $log['id'];
                header('Location: dashboard');   
            }
        }
        else
        {  
            header('Location: login?msg=2');
        }
        
    }

    public function edit()
    {
        $post = Post::getOneEpisode($_GET['id']);
        $this->render('admin.edit', compact('post'));
    }

    public function editing()
    {
        $update = Post::updatePost();
        header('location: adminEpisodes?msg=1');
    }

    public function deletePost()
    {
        $delete = Post::deleted();
        header('location: adminEpisodes?msg=2');
    }

    public function deleteComment()
    {
        $delete = Comments::deleted();
        header('location: adminComments?msg=1');
    }

    public function add()
    {
        $this->render('admin.add');
    }

    public function adding()
    {
        $delete = Post::addPost();
        header('location: adminEpisodes?msg=3');
    }

    public function remove()
    {
        $remove = Comments::removeComments();
        header('location: dashboard?msg=1');
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: login');
    }
}