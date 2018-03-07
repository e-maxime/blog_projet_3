<div class="container" style="padding-bottom: 100px;">
    <div class="row">
        <div class="col-lg-7">
            <h2>Sur le site</h2>
            <p style="text-align: justify; font-size: 1.1em;">
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

<div style="background-color: #E8E8E8; padding-top: 70px; padding-bottom: 100px;">
    <?php foreach($posts as $post): ?>
        <div style="border-bottom: 1px solid #fff;">
            <div>
                <h3 style="margin-left: 1%;"><a href="<?= $post->getUrl(); ?>" style="color: #1C5B8E;"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
            </div>
                <blockquote style="border-left: 5px solid #636363; margin-left: 2%; width: 70%; text-align: justify;"><?= $post->getExcerpt(); ?></blockquote>
        </div>
    <?php endforeach; ?>
</div>    




