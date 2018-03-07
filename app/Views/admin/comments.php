<div class="page-header">
   <h1 style="margin-left: 2%;">Commentaires</h1>
</div>

<table class="table table-bordered table-striped table-dark" style="width: 70%; margin:auto;">
   <caption>
      <h4>Tous les commentaires</h4>
   </caption>
   <thead>
      <tr>
            <th>ID de l'épisode</th>
            <th>Commentaire</th>
            <th>Auteur - Date</th>
      </tr>
   </thead>
   <tbody>
   	<?php foreach ($comments as $comment): ?>
		<tr>
			<td><?= $comment->post_id; ?></td>
			<td><?= $comment->content; ?></td>
			<td><?= $comment->nickname . "<br/>Le " . $comment->date_publish_fr; ?></td>
			<td>
				<form method="POST" action="deleteComment">
               <input type="hidden" name="id" value="<?= $comment->id; ?>" />
               <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
            </form>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>

