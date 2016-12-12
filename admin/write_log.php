<?php
require dirname(__DIR__).'/init.php';
$article = new ArticleModel();
$action = isset($_GET['action'])?$_GET['action']:'';
switch ($action) {
	case 'edit':
		$id = isset($_REQUEST['id'])?intval($_REQUEST['id']):'';
		if ($row = $article->article($id)) {
			include View::admin('edit_log');
			die;
		}
		break;
	case 'update':
		//判断提交方式
		if (is_post()) {
			$id = isset($_REQUEST['id'])?intval($_REQUEST['id']):'';
			$title = isset($_POST['title'])&&is_scalar($_POST['title'])?addslashes(htmlspecialchars($_POST['title'])):'';
			$content = isset($_POST['content'])&&is_scalar($_POST['content'])?addslashes(htmlspecialchars($_POST['content'])):'';
			$postdate = isset($_POST['postdate'])&&is_scalar($_POST['title'])?htmlspecialchars($_POST['postdate']):'';
			if ($article->artup($title,$content,$postdate,$id)) {
				to_url('./admin_log.php?message=3');
			}else{
				to_url('./admin_log.php?message=-3');;
			}
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
			if ($article->artadd($title,$content,$postdate)) {
				to_url('./admin_log.php?message=2');
			}else{
				to_url('./admin_log.php?message=-2');
			}
		}else{
			include View::admin('write_log');
		}
		break;
}
