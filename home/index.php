<?php
require dirname(__DIR__).'/init.php';
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'operate_log':
		break;
	
	default:
		if (isset($_SESSION['art_info'])) {
			$art = $_SESSION['art_info'];
			include __DIR__.'/views/index.php';
		}else{
			$sql = 'SELECT * FROM `articles` WHERE 1';
			//执行SQL    如果出错打印错误信息
			if (!$db->query($sql)) {
				die('<br>错asef误信息：'.$db->getError());
			}
			//判断值是否正确
			if ($db->rowCount()>0) {
				//获取数据
				$art = $db->fetch_all_assoc();
				$_SESSION['art_info']=$art;
				include __DIR__.'/views/index.php';
			}else{
				$message = '没有数据';
				include __DIR__.'/views/index.php';
			}
		}
		break;
}