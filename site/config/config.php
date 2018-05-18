<?php
/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
kirby()->hook('panel.file.*', function($file){
	$types = [
		'panel.file.upload',
		'panel.file.update',
		'panel.file.replace',
		'panel.file.rename'
	];
	if (in_array($this->type(), $types)) {
		create_svg($file);
		create_webp($file);
	}
});

function create_svg($file) {
	$filepath = $file->root();
	$svgpath = str_replace('.' . $file->extension(), '.svg', $filepath);
	if (!in_array($file->extension(), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) return;
	return exec("sqip $filepath -o $svgpath -m 5 -n 20 -b 10");
}

function create_webp($file) {
	$filepath = $file->root();
	$webp_path = str_replace('.' . $file->extension(), '.webp', $filepath);

	switch ($file->extension()) {
		case 'jpg':
		case 'jpeg':
			$source = imagecreatefromjpeg($file->root());
			break;
		case 'png':
			$source = imagecreatefrompng($file->root());
			break;
		case 'gif':
			$source = imagecreatefromgif($file->root());
			break;
	}

	return imagewebp($source, $webp_path);
}

c::set('routes', [
	[
		'pattern' => 'robots.txt',
		'action' => function() {
			echo 'HELLO';
		}
	]
]);
