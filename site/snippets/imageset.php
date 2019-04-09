<?php

$webp = webp($image);

?>
<picture title="<?= method_exists($image, 'alt') ? $image->alt() : '' ?>">
	<?php if ($webp): ?><source srcset="<?= $webp ?>" type="image/webp" /><?php endif ?>
  <source srcset="<?= $image->url() ?>" type="image/<?= $image->type() ?>" />
  <img src="<?= $image->url() ?>" alt="<?= method_exists($image, 'alt') ? $image->alt() : '' ?>" />
</picture>