<?php

return function($site, $pages, $page) {
	// fetch the basic set of pages
  $resources = $page->children()->flip();

  // add the tag filter
  if ($tag = param('tag')) {
    $resources = $resources->filterBy('tags', $tag, ',');
  }

  // fetch all tags
  $tags = $resources->pluck('tags', ',', false);

  // apply pagination
  $resources   = $resources->paginate(10);
  $pagination = $resources->pagination();

	return compact('resources', 'tags','tag', 'pagination');
};
