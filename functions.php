<?php

function miniproxy($url) {
	//error_log('miniproxy to ' . $url);
	$response_headers = array();

	try {
		@ $fp = fopen($url, 'r');
		if($fp === false) {
			throw new Exception('that URL cannot be opened');
		}

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

	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

function redirect($url, $thenDie = true) {
	header('Location: '. $url);
	if($thenDie) {
		die;
	}
}