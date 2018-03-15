<?php foreach($posts as $post): ?>

<section>

<div style="text-align: justify; margin-left: 1%; margin-bottom: 2%;">

    <div>
        <h3><a style="color: #000066;" href="<?= $post->getUrl(); ?>"><?= $post->title . " - " . $post->author . " le " . $post->date_create_fr; ?></a>
        </h3>
    </div>

    <div><p style="font-size: 1.1em;"><?= $post->getExcerpt(); ?></p></div>

</div>

</section>

<hr style="border-color: #bfbfbf;">

<?php endforeach; ?>

<div style="text-align:center;">
	<ul class="pagination">
		<li><?= $paging; ?></li>
	</ul>
</div>