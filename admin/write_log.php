<?php

//判断提交方式
if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST') {
	$title = isset($_POST['title'])?$_POST['title']:'';
	$content = isset($_POST['content'])?$_POST['content']:'';
	$postdate = isset($_POST['postdate'])?$_POST['postdate']:'';
	if ($title=='') {
		header('write_log.php');
		die;
	}

}else{
	date_default_timezone_set('Asia/Shanghai');
	$datetime = date('Y-m-d  H:i:s',time());
	include './views/write_log.php';
}