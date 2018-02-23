
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">

<?php foreach($posts as $post): ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
    </div>
    <div class="panel-body"><?= $post->getExcerpt(); ?></div>
</div>
<?php endforeach; ?>

<div class="container" style="text-align: right;">
	<ul class="pagination">
		<li><?= $paging; ?></li>
	</ul>
</div>

		</div>
	</div>
