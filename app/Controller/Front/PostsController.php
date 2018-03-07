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
        $posts = Post::getLastEpisodes();
        $this->render('posts.index', compact('posts'));
    }
    
    //Voir un article et ses commentaires
    public function show()
    {
        $post = Post::getOneEpisode($_GET['id']);

        if($post === false)
        {
            die("Aucun épisode trouvé.");
        }
        $paging = Comments::paging();
        $comments = Comments::getComments();
        
        $this->render('posts.single_episode', compact('post', 'comments', 'paging'));
    }
    
    public function showAllEpisodes()
    {
        $paging = Post::paging();
        $posts = Post::getAllEpisodes();
        
        $this->render('posts.episodes', compact('posts', 'paging'));
    }
}