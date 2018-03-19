<?php
use App\Rooter;
?>
<div>
	<form method="POST" action="<?= Rooter::routeUrl('addEpisode'); ?>">
		<legend>Ajout d'un épisode</legend>
			<div class="form-group">
				<label>Titre de l'épisode : </label>
				<input name="title" type="text" class="form-control" />
			</div>
			<div class="form-group">
				<label>Contenu </label>
				<textarea name="content" class="form-control"></textarea>
			</div>
				<button class="btn btn-primary">Ajouter</button>
	</form>
</div>