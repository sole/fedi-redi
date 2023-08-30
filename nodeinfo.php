<?php
require_once('config.php');
require_once('functions.php');

// Proxy from XYZ.domain/.well-known/nodeinfo to domain/.well-known/nodeinfo
$dst_url = $fediredi_config['redirect_to_server'] . '.well-known/nodeinfo';
miniproxy($dst_url);
