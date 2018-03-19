<?php
use App\Rooter;
?>
<div>
	<form method="POST" action="<?= Rooter::routeUrl('editEpisode'); ?>?id=<?=$post->id;?>">
		<legend>Édition</legend>
			<div class="form-group">
				<label>Titre de l'article : </label>
				<input name="titre" type="text" class="form-control" value="<?=$post->title;?>">
			</div>
			<div class="form-group">
				<label>Contenu </label>
				<textarea name="contenu" class="form-control"><?= $post->content; ?></textarea>
			</div>
				<p><button class="btn btn-primary">Enregistrer</button><br/></p>
	</form>
</div>
        



