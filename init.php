<?php
require __DIR__.'/config.php';
require __DIR__.'/include/lib/function.base.php';
require __DIR__.'/include/lib/DB.class.php';
date_default_timezone_set('Asia/Shanghai');
//打开SESSION
session_start();

var_dump(555555);
$db = DB::init();
$res = $db->query('SELECT * FROM `articles` WHERE `id` = :id',array(5));
var_dump($res);
var_dump($db->fetch_assoc());
var_dump($db->getError()); 