<?php
namespace App\Controller;

use \App\Model\Post;
use \App\Model\Comments;
use \App\Controller\AppController;

require ('AppController.php');

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //Liste les différents articles
    public function index()
    {
        $posts = Post::getLastEpisodes();
        $this->render('index', compact('posts'));
    }
    
    //Voir un article et ses commentaires
    public function show()
    {
        $post = Post::getOneEpisode($_GET['id']);

        if($post === false)
        {
            $this->notFound();
        }
        
        $comments = Comments::getComments();
        
        $this->render('single_episode', compact('post', 'comments'));
    }
}