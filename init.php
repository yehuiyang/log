<?php

date_default_timezone_set('Asia/Shanghai');
ob_start();
//打开SESSION
session_start();
require __DIR__.'/config.php';
require __DIR__.'/include/lib/function.base.php';
// $db = DB::init();