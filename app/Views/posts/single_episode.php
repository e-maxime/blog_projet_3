<?php 
use \App\Rooter;
\App\App::setTitlePage($post->title); 
?>

    <div class="row" style=" margin-bottom: 100px;">
        <div style="margin-bottom: 50px;">
            <h1 style="text-align: center; text-decoration: underline;"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></h1>
        </div>
        <div class="col-md-10 col-md-offset-1" style="text-align: justify; text-indent:3%;">
            <?= $post->content; ?>
        </div>
    </div>

    <div class="row" style="background-color: white; padding-top: 30px; padding-bottom: 30px;">
        <h2>Commentaires</h2>
        <hr>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary" style="margin-bottom: 0;">
    
            <table class="table">
            <?php foreach($comments as $comment): ?>
                <tbody>
                <tr>    
                    <td>
                        <div class="panel-body">
                        <?php echo "<p>De <strong>" . $comment->nickname . "</strong> le " . $comment->date_publish_fr . " : </p><p>" . $comment->content . "</p>"; ?>
                        </div>
                    </td>
    
                    <td>
                        <form method="POST", action="<?= Rooter::routeUrl('report'); ?>?id=<?=$_GET['id'];?>">
                            <input type="hidden" name="id" value="<?= $comment->id; ?>" />
                            <button type="submit" name="report" class="btn btn-link" style="color:red;">Signaler</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>
                            <ul class="pagination">
                                <li><?= $paging; ?></li>
                            </ul>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>

    <?php \App\Helpers\Alert::getAlert(); ?>

    <div class="row">
        <h3 style="">Laissez un commentaire</h3>
        <hr>
        <div class="col-md-6 col-md-offset-1" style="padding-top: 40px; padding-bottom: 40px;">
            <form action="<?= Rooter::routeUrl('insertComment'); ?>?id=<?= $_GET['id']; ?>" method="post">
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
    </div>