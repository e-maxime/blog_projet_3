<?php \App\App::setTitlePage($post->title); ?>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></h3>
                </div>
            <div class="panel-body"><?= $post->content; ?></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Commentaires</h3>
                </div>
    
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
                        <form method="POST", action="report?id=<?=$_GET['id'];?>">
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

    <div class="row">
        <div class="col-lg-10">
            <form class="well col-lg-6" action="insertComment?id=<?= $_GET['id']; ?>" method="post">
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
    </div>

    



