<?php foreach($posts as $post): ?>
<section style="border-bottom: 1px solid #999999;">
<div style="text-align: justify; width: 50%; margin-left: 1%; margin-bottom: 2%;">
    <div>
        <h3><a style="color: #1C5B8E;" href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a></h3>
    </div>
    <div><?= $post->getExcerpt(); ?></div>
</div>
</section>
<?php endforeach; ?>

<div style="text-align: right;">
	<ul class="pagination">
		<li><?= $paging; ?></li>
	</ul>
</div>