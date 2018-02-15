<?php
namespace App\Controller\Front;

use \App\Model\Front\Post;
use \App\Model\Front\Comments;

class PostsController extends Controller
{   
    //Liste les différents articles
    public function index()
    {
        $this->loadModel('Post');
        $posts = Post::getLastEpisodes();
        $this->render('posts.index', compact('posts'));
    }
    
    //Voir un article et ses commentaires
    public function show()
    {
        $this->loadModel('Post');
        $post = Post::getOneEpisode($_GET['id']);

        if($post === false)
        {
            $this->pageNotFound();
        }
        $this->loadModel('Comments');
        $comments = Comments::getComments();
        
        $this->render('posts.single_episode', compact('post', 'comments'));
    }
    
    public function showAllEpisodes()
    {
        $this->loadModel('Post');
        $posts = Post::getAllEpisodes();
        $this->render('posts.episodes', compact('posts'));
    }
}