<?php
require dirname(__DIR__).'/init.php';
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'operate_log':
		break;
	
	default:
		$id = isset($_GET['id'])&&is_scalar($_GET['id'])?$_GET['id']:1;
		if ($id) {
			$sql = 'SELECT * FROM `articles` WHERE `id` = :id';
			//执行SQL    如果出错打印错误信息
			if (!$db->query($sql,array($id))) {
				die('<br>错asef误信息：'.$db->getError());
			}
			//判断值是否正确
			if ($db->rowCount()>0) {
				//获取数据
				$art = $db->fetch_assoc();
				$_SESSION['art']=$art;
				include __DIR__.'/views/news.php';
			}else{
				$message = '没有数据';
				include __DIR__.'/views/news.php';
			}
		}
		
		break;
}