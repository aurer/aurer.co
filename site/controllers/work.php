<?php

return function($site, $pages, $page) {
	$hero = $page->image($page->hero());

	$contentImages = $page->images()->filter(function($image) use ($page) {
		return $image->filename() != $page->cover()
			&& $image->filename() != $page->hero()
			&& $image->extension() != 'svg';
	});

	return [
		'heroImage' => $hero,
		'contentImages' => $contentImages
	];
};
