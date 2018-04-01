<?php

kirby()->routes([
	[
		'pattern' => 'api(/?.*)',
	  'action'  => function($arguments) {
	    $api = new Api();
	    $request = kirby()->request();
	    $path = $request->path()->toArray();

	    if (sizeof($path) === 1) {
	    	return response::json(['versions' => "v1"]);
	    }

	    if (sizeof($path) === 2) {
	    	return response::json(['content_types' => ['pages']]);
	    }

	    if (sizeof($path) > 2) {
				$version = $path[1];
				$type = $path[2];
				$path_parts = array_splice($path, 3);
				$uri = sizeof($path_parts) === 0 ? null : implode('/', $path_parts);
				$page = page($uri);

				if (!$page) return response::json(page('error')->toArray());
				$data = $page->toArray();
	    }

			return response::json(compact('version', 'type', 'data'));
	  }
	]
]);

class Api {
	private $valid_types;

	function __constructor() {
		$this->types = ['page'];
	}

	public function page() {

	}
}
