<?php
require_once('config.php');
require_once('miniproxy.php');

$query_string = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;

// Proxy from XYZ.domain/.well-known/host-meta?... to domain/.well-known/host-meta?...
$dst_url = $fediredi_config['redirect_to_server'] . '.well-known/host-meta';
if($query_string) {
	$dst_url .= '?' . $query_string;
}

miniproxy($dst_url);
