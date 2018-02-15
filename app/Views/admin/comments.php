<table class="table table-bordered table-striped table-dark">
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
				<a href="#"><button class="btn btn-danger">Supprimer</button></a>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>


