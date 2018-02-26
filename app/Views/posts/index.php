<div class="container">    
    <div class="row">
        <blockquote class="col-lg-8">
            Bienvenue, vous retrouverez sur le site tous les épisodes de mon livre "Un billet simple pour l'Alaska".<br/>
            N'hésitez pas à laisser vos impressions sur les épisodes via l'espace des commentaires sur chaque épisode, elles me permettront d'améliorer l'histoire.<br/>
            Bonne lecture à tous !
        </blockquote>
            
        <div class="col-lg-offset-1 col-lg-3">
            <img src="/Projet_3/public/images/book.jpg" alt="Book" class="img-thumbnail" />
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?php foreach($posts as $post): ?>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
                </div>
                <div class="panel-body"><?= $post->getExcerpt(); ?></div>
            </div>
            <?php endforeach; ?>
        </div>    
    </div>
<div>



