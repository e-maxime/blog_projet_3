<?php \App\App::setTitlePage($post->title); ?>

    <section style=" margin-bottom: 100px;">
        <div style="margin-bottom: 50px;">
            <h2 style="text-align: center; text-decoration: underline;"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></h2>
        </div>
        <div style="width: 60%; text-align: justify; margin: auto;">
            <?= $post->content; ?>
        </div>
    </section>
    
    <section style="background-color: #E8E8E8; padding-top: 30px; padding-bottom: 30px;">
        <div style="width: 50%; margin-left: 1%;">
            <div class="panel panel-info" style="margin-bottom: 0;">
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
    </section>

    <?php 
    if(isset($_GET['msg']) && $_GET['msg'] == 1) 
    { 
    ?>
        <div class="alert alert-success">Votre commentaire a été enregistré.</div>
    <?php 
    }
    elseif (isset($_GET['msg']) && $_GET['msg'] == 2) 
    {
    ?>
        <div class="alert alert-warning">Tous les champs ne sont pas remplis.</div>
    <?php
    }
    ?>

    <section style="">
        <div style="width: 30%; margin:auto; padding-top: 40px; padding-bottom: 40px;">
            <form action="insertComment?id=<?= $_GET['id']; ?>" method="post">
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
    </section>

    



