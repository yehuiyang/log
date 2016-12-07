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
				$sql = 'DELETE FROM `articles` WHERE `id` in ('.implode(',', $ids).')';
				//执行SQL    如果出错打印错误信息
				if (!$stmt = $db->query($sql)) {
					die('错误代码：'.$db->errno.'<br>错误信息：'.$db->error);
				}
				if ($db->affected_rows>0) {
					$message = '删除文章成功';
				}else{
					$message = '删除文章失败';
				}
				header('location:./admin_log.php');
				break;
		}
		break;
	
	default:
		$sql = 'SELECT * FROM `articles`';
		//执行SQL    如果出错打印错误信息
		if (!$stmt = $db->query($sql)) {
			die('错误代码：'.$db->errno.'<br>错误信息：'.$db->error);
		}
		//判断值是否正确
		if ($stmt->num_rows>0) {
			//获取数据
			$art = array();
			while ($res = $stmt->fetch_assoc()) {
				$art[] = $res;
			}
			include __DIR__.'/views/admin_log.php';
		}else{
			$message = '没有数据';
		}
		break;
}
