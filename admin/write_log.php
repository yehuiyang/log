<?php
require dirname(__DIR__).'/init.php';
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'edit':
		$id = isset($_REQUEST['id'])?intval($_REQUEST['id']):'';
		$sql = 'SELECT * FROM `articles` WHERE `id`=:id';
		//执行SQL    如果出错打印错误信息
		if (!$db->query($sql,array($id))) {
			die('<br>错误信息：'.$db->getError());
		}
		if ($db->rowCount()==0) {
			$message = '文章不存在';
			die;
		}
		$row = $db->fetch_row();
		include './views/edit_log.php';
		break;
	case 'update':
		//判断提交方式
		if (is_post()) {
			$id = isset($_REQUEST['id'])?intval($_REQUEST['id']):'';
			$title = isset($_POST['title'])&&is_scalar($_POST['title'])?addslashes(htmlspecialchars($_POST['title'])):'';
			$content = isset($_POST['content'])&&is_scalar($_POST['content'])?addslashes(htmlspecialchars($_POST['content'])):'';
			$postdate = isset($_POST['postdate'])&&is_scalar($_POST['title'])?htmlspecialchars($_POST['postdate']):'';
			$sql = "UPDATE `articles` SET `title`=:title,`content`=:content,`postdate`=:postdate WHERE `id` = :id";
			//执行SQL    如果出错打印错误信息
			if (!$db->query($sql,array($title,$content,$postdate,$id))) {
				die('<br>错误信息：'.$db->getError());
			}
			if ($db->rowCount()>0) {
				$message = '修改文章成功';
			}else{
				$message = '修改文章失败';
			}
			header('location:./admin_log.php');
		}
		break;
	default:
		//判断提交方式
		if (is_post()) {
			$title = isset($_POST['title'])&&is_scalar($_POST['title'])?addslashes(htmlspecialchars($_POST['title'])):'';
			$content = isset($_POST['content'])&&is_scalar($_POST['content'])?addslashes(htmlspecialchars($_POST['content'])):'';
			$postdate = isset($_POST['postdate'])&&is_scalar($_POST['title'])?htmlspecialchars($_POST['postdate']):'';
			if ($title=='') {
				header('write_log.php');
				die;
			}
			$sql = "INSERT INTO `articles` (`title`,`content`,`postdate`) VALUES(:title,:content,:postdate)";
			//执行SQL    如果出错打印错误信息
			if (!$db->query($sql,array($title,$content,$postdate))) {
				die('<br>错误信息：'.$db->getError());
			}
			if ($db->rowCount()>0) {
				$message = '添加文章成功';
				include './views/write_log.php';
			}else{
				$message = '添加文章失败';
			}
		}else{
			include './views/write_log.php';
		}
		break;
}
