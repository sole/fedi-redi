<?php
require_once('config.php');
require_once('miniproxy.php');

$query_string = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;

// Proxy from XYZ.domain/.well-known/webfinger?... to domain/.well-known/webfinger?...
$dst_url = $fediredi_config['redirect_to_server'] . '.well-known/webfinger';
if($query_string) {
	$dst_url .= '?' . $query_string;
}

miniproxy($dst_url);
