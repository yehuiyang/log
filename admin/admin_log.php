<?php
//
require dirname(__DIR__).'/init.php';
$article = new ArticleModel();
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'operate_log':
		$operate = isset($_POST['operate'])?$_POST['operate']:'';
		switch ($operate) {
			case 'del':
				$ids = isset($_POST['blog'])&&is_array($_POST['blog'])?array_map('intval', $_POST['blog']):'';
				if ($article->artdel($ids)) {
					to_url('./admin_log.php?message=4');
				}else{
					to_url('./admin_log.php?message=-4');
				}
				break;
		}
		break;
	
	default:
		if ($art = $article->articles()) {
			//获取数据

			include View::admin('admin_log');
		}else{
			$message = '没有数据';
			include View::admin('admin_log');
		}
		break;
}
