<?php
//
require dirname(__DIR__).'/init.php';
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'operate_log':
		$operate = isset($_POST['operate'])?$_POST['operate']:'';
		switch ($operate) {
			case 'del':
				$ids = isset($_POST['blog'])&&is_array($_POST['blog'])?array_map('intval', $_POST['blog']):'';
				$sql = 'DELETE FROM `articles` WHERE `id` in ('.implode(',', array_fill(0, count($ids), '?')).')';
				//执行SQL    如果出错打印错误信息
				if (!$db->query($sql,$ids)) {
					die('<br>错误信息：'.$db->getError());
				}
				if ($db->rowCount()>0) {
					$message = '删除文章成功';
				}else{
					$message = '删除文章失败';
				}
				header('location:./admin_log.php');
				break;
		}
		break;
	
	default:
		$sql = 'SELECT * FROM `articles` WHERE 1';
		//执行SQL    如果出错打印错误信息
		if (!$db->query($sql)) {
			die('<br>错asef误信息：'.$db->getError());
		}
		//判断值是否正确
		if ($db->rowCount()>0) {
			//获取数据
			$art = $db->fetch_all_assoc();
			include __DIR__.'/views/admin_log.php';
		}else{
			$message = '没有数据';
			include __DIR__.'/views/admin_log.php';
		}
		break;
}
