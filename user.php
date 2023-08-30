<?php
require_once('config.php');
require_once('functions.php');

// Redirect from XYZ.domain/@user to domain/@user
$user = $_GET['user'];

if(strlen($user) === 0) {
	echo 'Did not find a user to redirect to...';
	die;
}

$dst_url = $fediredi_config['redirect_to_server'] . '@' . $user;
redirect($dst_url);