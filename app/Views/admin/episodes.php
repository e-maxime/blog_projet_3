<table class="table table-bordered table-striped table-dark">
   <caption>
      <h4>Tous les épisodes</h4>
   </caption>
   <thead>
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
			<td><a href="#"><button class="btn btn-primary" style="margin-bottom: 5px;">Modifier</button></a>
				<a href="#"><button class="btn btn-danger">Supprimer</button></a>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>


