<?php \App\App::setTitlePage($post->title); ?>

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
    
    <table>
    <?php foreach($comments as $comment): ?>
        <tr>    
            <td>
                <div class="panel-body">
            <?php echo "<p>De " . $comment->nickname . " le " . $comment->date_publish_fr . " : </p><p>" . $comment->content . "</p>"; ?>
                </div>
            </td>

            <td>
                <form method="POST", action="?page=comments.report&id=<?=$_GET['id'];?>">
                    <input type="hidden" name="id" value="<?= $comment->id; ?>" />
                    <button type="submit" name="report" class="btn btn-danger">Signaler</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    <?php echo $paging; ?>
</div>

<div>
    <form class="well col-lg-6" action="index.php?page=comments.checkInsertComment&id=<?= $_GET['id']; ?>" method="post">
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