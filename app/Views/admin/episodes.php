<div class="page-header">
   <h1 style="margin-left: 2%;">Épisodes</h1>
</div>

<?php \App\Helpers\Alert::getAlert(); ?>

<table class="table table-bordered table-striped table-dark" style="width: 70%; margin:auto;">
   <caption>
      <h4>Tous les épisodes</h4>
   </caption>
   <thead>
      <tr><a href="adminAddNewEpisode"><button style="margin-left: 2%;" class="btn btn-success">Écrire un nouvel épisode</button></a></tr>
      <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Contenu</th>
      </tr>
   </thead>
   <tbody>
   	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?= $post->id; ?></td>
			<td><?= $post->title; ?></td>
			<td><?= $post->content; ?></td>
			<td><a href="adminEditEpisode?id=<?=$post->id;?>"><button class="btn btn-primary" style="margin-bottom: 5px;">Éditer</button></a>
            <form method="POST" action="deleteEpisode">
               <input type="hidden" name="id" value="<?= $post->id; ?>" />
               <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
            </form>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>


