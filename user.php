<?php
require_once('config.php');
require_once('miniproxy.php');

// Proxy from XYZ.domain/@user to domain/@user
$user = $_GET['user'];

if(strlen($user) === 0) {
	echo 'Did not find a user to proxy to...';
	die;
}

$dst_url = $fediredi_config['redirect_to_server'] . '/' . '@' . $user;
miniproxy($dst_url);
