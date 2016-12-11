<?php
require __DIR__.'/config.php';
require __DIR__.'/include/lib/function.base.php';
require __DIR__.'/include/lib/DB.class.php';
date_default_timezone_set('Asia/Shanghai');
//打开SESSION
session_start();
$db = DB::init();