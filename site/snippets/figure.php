<figure>
	<?php snippet('imageset', ['image' => $image]) ?>
	<?php if ( method_exists($image, 'caption') ): ?>
		<figcaption><?= $image->caption() ?></figcaption>
	<?php endif ?>
</figure>
