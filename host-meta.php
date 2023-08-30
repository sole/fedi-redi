<?php
require_once('config.php');
require_once('functions.php');

$query_string = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;

$dst_url = $fediredi_config['redirect_to_server'] . '.well-known/host-meta';
if($query_string) {
	$dst_url .= '?' . $query_string;
}

redirect($dst_url);
