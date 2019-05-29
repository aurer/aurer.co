<?php

return [
	'routes' => [
		[
			'pattern' => '/unsplash',
			'action' => function() {
				$client_id = '631f8f7914870d74bc298abc13ec84bec36c372c42f308441abde5e376ebaf08';
				$endpoint = "https://api.unsplash.com/photos/random?collections=175083&client_id=$client_id";
				$response = file_get_contents($endpoint);
				$data = json_decode($response);
				$url = "{$data->urls->raw}&w=1400&h700&fit=crop&crop=edges";
				return go($url);
			}
		]
	]
];