<div class="row">
            <blockquote class="col-lg-8">
                Bienvenue, vous retrouverez sur le site tous les épisodes de mon livre "Un billet simple pour l'Alaska".<br/>
                N'hésitez pas à laisser vos impressions sur les épisodes via l'espace des commentaires ou par le <a href="index.php?page=contact">formulaire de contact</a>, elles me permettront d'améliorer l'histoire.<br/>
                Bonne lecture à tous !
            </blockquote>
            
            <div class="col-lg-offset-1 col-lg-3">
                <img src="../public/images/book.jpg" alt="Book" class="img-thumbnail" />
            </div>
</div>

<?php foreach($posts as $post): ?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
    </div>
    <div class="panel-body"><?= $post->getExcerpt(); ?></div>
</div>

<?php endforeach; ?>
