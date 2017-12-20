<?php

/**
 * Kirby Picture Element
 *
 * @version   1.0.0-beta
 * @author    Phil Maurer <>
 * @copyright Phil Maurer <>
 * @link      https://github.com/
 * @license   MIT
 */

function picture($image) {
	$webp = webp($image);
	?><picture title="<?= method_exists($image, 'alt') ? $image->alt() : $image->filename() ?>">
		<?php if ($webp): ?><source srcset="<?= $webp ?>" type="image/webp" /><?php endif ?>
		<source srcset="<?= $image->url() ?>" type="image/<?= $image->type() ?>" />
	  <img src="<?= $image->url() ?>" alt="<?= method_exists($image, 'alt') ? $image->alt() : '' ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>" />
	</picture><?php
}

function figure($image) {
	?><figure><?php snippet('imageset', ['image' => $image]) ?>
		<?php if ( method_exists($image, 'caption') ): ?>
			<figcaption><?= $image->caption() ?></figcaption>
		<?php endif ?>
	</figure><?php
}

function webp($image) {
	$webp_url = preg_replace('/.[a-z]+$/', '.webp', $image->url());
	$webp_path = preg_replace('/.[a-z]+$/', '.webp', $image->root());

	if (is_file($webp_path) && filemtime($image->root()) < filemtime($webp_path) ) {
		return $webp_url;
	}

	error_log(('Generate webp'));
	switch ($image->extension()) {
		case 'jpg':
		case 'jpeg':
			$source = imagecreatefromjpeg($image->root());
			break;
		case 'png':
			$source = imagecreatefrompng($image->root());
			break;
		case 'gif':
			$source = imagecreatefromgif($image->root());
			break;
	}

	if (imagewebp($source, $webp_path)) {
		return $webp_url;
	}

	return false;
}
