<?php
require __DIR__.'/config.php';
date_default_timezone_set('Asia/Shanghai');
//打开SESSION
session_start();

//连接数据库
$db = @new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
//连接错误时报错
if ($db->connect_errno) {
	die('<br>错误代码：'.$db->connect_errno.'<br>错误信息：'.$db->connect_error);
}
//设置数据库查询出的数据的编码
$db->set_charset('utf8');