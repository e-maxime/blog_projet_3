<?php
namespace App\Controller\Admin;

use \App\Model\Admin\Post;
use \App\Model\Admin\Comments;
use \App\Model\Admin\Login;
use \App\Controller\Controller;
use \App\Helpers\Alert;

class AdminController extends Controller
{
    protected $template = 'adminDefault';

    public function __construct()
    {
        $auth = new \App\Model\Admin\Login();
        $path = str_replace('/Projet_3/public/', '', $_SERVER['REQUEST_URI']);
        $path = parse_url($path, PHP_URL_PATH);
        $path = rtrim($path, '/');

        if(!$auth->logged() && $path != 'se-connecter')
        {
            header('Location: se-connecter');
        }
        elseif($auth->logged() & $path === 'se-connecter')
        {
            header('Location: tableau-de-bord');
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
        $this->template = 'loginTemplate';
        $this->render('admin.login');  
    }

    public function getLog()
    {
        if(!empty($_POST['username']) AND !empty($_POST['pass']))
        {
            $log = Login::checkLogin();

            if(!$log)
            {
                Alert::setAlert('Indentifiants incorrects.', 'danger');
                header('Location: se-connecter');
            }

            else
            {
                $_SESSION['auth'] = $log['id'];
                header('Location: tableau-de-bord');   
            }
        }
        else
        {  
            Alert::setAlert('Tous les champs ne sont pas remplis.', 'warning');
            header('Location: se-connecter');
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
        Alert::setAlert('L\'article a bien été modifié.');
        header('location: admin-episodes');
    }

    public function deletePost()
    {
        $delete = Post::deleted();
        Alert::setAlert('L\'article a bien été supprimé.');
        header('location: admin-episodes');
    }

    public function deleteComment()
    {
        $delete = Comments::deleted();
        Alert::setAlert('Le commentaire a bien été supprimé.');
        header('location: admin-commentaires');
    }

    public function add()
    {
        $this->render('admin.add');
    }

    public function adding()
    {
        $delete = Post::addPost();
        Alert::setAlert('Un nouvel article a été publié.');
        header('location: admin-episodes');
    }

    public function remove()
    {
        $remove = Comments::removeComments();
        Alert::setAlert('Le commentaire a été approuvé.');
        header('location: tableau-de-bord');
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: se-connecter');
    }
}