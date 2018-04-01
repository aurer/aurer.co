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
	$aspect_ratio = getAspectRatio($image);
	$style = 'display:block;position:relative;padding-top:' . $aspect_ratio . '%';

	?><picture style="<?=$style?>"  title="<?= method_exists($image, 'alt') ? $image->alt() : $image->filename() ?>">
		<?php if ($webp): ?><source srcset="<?= $webp ?>" type="image/webp" /><?php endif ?>
		<source srcset="<?= $image->url() ?>" type="image/<?= $image->type() ?>" />
	  <img style="position:absolute;top:0;left:0;width:100%" src="<?= $image->url() ?>" alt="<?= method_exists($image, 'alt') ? $image->alt() : '' ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>" />
	</picture><?php
}

function getAspectRatio($image) {
	return ($image->height() / $image->width()) * 100;
}

function figure($image) {
	$width = $image->width();
	$root = $image->root();
	$svg_path = str_replace('.' . $image->extension(), '.svg', $root);
	$background = "";
	$max_width = $image->width() . 'px';
	if (file_exists($svg_path)) {
		$svg = file_get_contents($svg_path);
		$base64 = base64_encode($svg);
		$background = "max-width:$max_width;background-size:cover;background-image: url(data:image/svg+xml;base64,$base64)";
	}
	?><figure style="<?=$background?>;">
		<?php picture($image) ?>
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

	if (isset($source) && imagewebp($source, $webp_path)) {
		return $webp_url;
	}

	return false;
}
