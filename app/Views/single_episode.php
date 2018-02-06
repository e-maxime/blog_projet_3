<?php
use \App\App;
use \App\Model\Post;
use \App\Model\Comments;

    $post = Post::getOneEpisode($_GET['id']);

    if($post === false)
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?page=404');
    }

    

    App::setTitlePage($post->title);
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></h3>
    </div>
    <div class="panel-body"><?= $post->content; ?></div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Commentaires</h3>
    </div>
    <?php foreach(Comments::getComments() as $comments): ?>
    <div class="panel-body"><?php echo "<p>De " . $comments->nickname . " le " . $comments->date_publish_fr . " :</p><p>" . $comments->content . "</p>"; ?></div>
    <?php endforeach; ?>
</div>

<div>
    <form class="well col-lg-6" action="index.php?page=comment&id=<?= $_GET['id']; ?>" method="post">
        <legend>Commentaire</legend>
        <div class="form-group">
            <label for="text">Pseudonyme : </label>
            <input type="text" class="form-control" name="pseudo" />
        </div>
        <div class="form-group">
            <label for="textarea">Commentaire : </label>
            <textarea class="form-control" name="comment"></textarea>
        </div>
        <input type="submit" value="Envoyer" class="btn btn-primary" />
    </form>
</div>