<div class="page-header">
	<h1 style="margin-left: 2%;">Tableau de bord</h1>
</div>

<?php \App\Helpers\Alert::getAlert(); ?>

<table class="table table-bordered table-striped table-dark" style="width: 60%; margin:auto;">
	<caption>
		<h4>Commentaires signalés</h4>
	</caption>

	<thead>
		<?php if(!$comments)
		{ 
		?>
			<tr class="success"><td>Aucun commentaire n'a été signalé.</td></tr>
		<?php
		}
		else
		{
		?>

		<th>ID de l'épisode</th>
		<th>Auteur</th>
		<th>Contenu</th>
	</thead>

	<tbody>
		<?php foreach ($comments as $comment): ?>
			<tr>
				<td><?= $comment->post_id; ?></td>
				<td><?= $comment->nickname; ?></td>
				<td><?= $comment->content; ?></td>
				<td>
				<a href="removeEpisode?id=<?=$comment->id;?>"><button class="btn btn-success" style="margin-bottom: 5px;">OK</button></a>
				<form method="POST", action="deleteComment">
				<input type="hidden" name="id" value="<?= $comment->id; ?>" />
				<button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
				</form>
				</td>
			</tr>
		<?php endforeach; }?>

	</tbody>
</table>