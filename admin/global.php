<?php
require dirname(__DIR__).'/init.php';
$login = new LoginModel();
//判断COOKIE and SESSION
if (!$login->logname()) {
	$login->login();
}
if (isset($_GET['logout'])) {
	$login->logout();
}