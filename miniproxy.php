<?php

function miniproxy($url) {
	$response_headers = array();

	$fp = fopen($url, 'r');

	$meta = stream_get_meta_data($fp);
	if($meta['wrapper_data']) {
		$response_headers = $meta['wrapper_data'];
	}

	$content = stream_get_contents($fp);

	foreach($response_headers as $h) {
		header($h);
	}
	echo $content;

	fclose($fp);

}