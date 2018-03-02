<?php
namespace App\Controller\Front;

use \App\Model\Front\Post;
use \App\Model\Front\Comments;
use \App\Controller\Controller;

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
            die("Aucun épisode trouvé.");
        }
        $this->loadModel('Comments');
        $paging = Comments::paging();
        $comments = Comments::getComments();
        
        $this->render('posts.single_episode', compact('post', 'comments', 'paging'));
    }
    
    public function showAllEpisodes()
    {
        $this->loadModel('Post');
        $paging = Post::paging();
        $posts = Post::getAllEpisodes();
        
        $this->render('posts.episodes', compact('posts', 'paging'));
    }
}