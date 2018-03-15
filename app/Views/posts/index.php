<div class="row">
    <div class="col-lg-12">
        <p style="text-align: justify; font-size: 1.1em;">
            <span style="font-size: 3em; font-weight: bold; color: #4d4d4d;">V</span>enez découvrir mon nouveau roman <em>Un billet simple pour l'Alaska</em>.<br/>
            Actuellement en cours d'écriture, il sera posté chapitre par chapitre, ce qui permettra d'apprécier au maximum de l'intrigue.<br/>
            Tout au long de votre lecture, vous pouvez laisser vos impressions via l'espace des commentaires sur chaque épisode, elles me permettront d'améliorer l'histoire et peut-être que vous pourrez vous dire "<em>Oh ! Mais c'est moi qui lui ai dit de faire ça ! Génial !</em>".<br/>
            <h3><span style="font-weight: bold; color: #4d4d4d;">Bonne lecture à tous !</span></h3>
        </p>
    </div>
</div>

<hr>

<div class="row" style="background-color: #f2f2f2; border-radius: 5px; padding-top: 20px; padding-bottom: 20px;">
    <?php foreach($posts as $post): ?>
        <div>
            <h3 style="margin-left: 1%;"><a href="<?= $post->getUrl();?>" style="color:#000066;"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
        </div>
            <blockquote style="border-left: 5px solid #636363; border-radius: 1px; margin-left: 2%; text-align: justify; font-size: 1.1em;"><?= $post->getExcerpt(); ?></blockquote>
        <hr style="border-color: #c5c5c5;">
    <?php endforeach; ?>
</div>   




