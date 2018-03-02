<div class="container" style="padding-bottom: 100px;">
<div class="row">
<div class="col-lg-7">
    <h2>Sur le site</h2>
        <p style="text-align: justify;">
            Venez découvrir mon nouveau roman <em>Un billet simple pour l'Alaska</em>.<br/>
            Actuellement en cours d'écriture, il sera posté chapitre par chapitre, ce qui permettra d'apprécier au maximum de l'intrigue.<br/>
            Tout au long de votre lecture, vous pouvez laisser vos impressions via l'espace des commentaires sur chaque épisode, elles me permettront d'améliorer l'histoire et peut-être que vous pourrez vous dire "<em>Oh ! Mais c'est moi qui lui ai dit de faire ça ! Génial !</em>".<br/>
            <p><span style="font-weight: bold;">Bonne lecture à tous !</span></p>
        </p>
</div>
<div class="col-lg-offset-1 col-lg-3">
    <img src="/Projet_3/public/images/book.jpg" alt="Book" class="" style="width: 150%;" />
</div>
</div>
</div>

    <div style="background-color: #E8E8E8; padding-top: 100px; padding-bottom: 100px;">
        <?php foreach($posts as $post): ?>

        <div class="panel panel-primary" style="border-radius: 0; border:0;">
            <div class="panel-heading" style="border-radius: 0; border:0; background-color: #5A5757">
                <h3 class="panel-title"><a href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
            </div>
            <div class="panel-body"><?= $post->getExcerpt(); ?></div>
        </div>
        <?php endforeach; ?>
    </div>    




