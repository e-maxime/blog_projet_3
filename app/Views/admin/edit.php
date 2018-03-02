<div class="row">
	<form method="POST" action="editEpisode?id=<?=$post->id;?>" class="col-lg-6">
		<legend>Édition</legend>
			<div class="form-group">
				<label>Titre de l'article : </label>
				<input name="titre" type="text" class="form-control" value="<?=$post->title;?>">
			</div>
			<div class="form-group">
				<label>Contenu </label>
				<textarea name="contenu" class="form-control"><?= $post->content; ?></textarea>
			</div>
				<button class="btn btn-primary">Enregistrer</button>
	</form>
</div>
        



