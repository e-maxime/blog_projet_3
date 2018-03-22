<?php
use App\Router;
use App\Helpers\Alert;
?>
<div class="page-header">
   <h1>Commentaires</h1>
</div>

<?php 
if (isset($_SESSION['alert'])) {
   Alert::getAlert();
}
?>

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
				<form method="POST" action="<?= Router::routeUrl('deleteComment'); ?>">
               <input type="hidden" name="id" value="<?= $comment->id; ?>" />
               <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
            </form>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>


