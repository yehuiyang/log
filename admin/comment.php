<?php
require __DIR__.'/global.php';
$com = new CommentModel();
$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'';
switch ($action) {
	case 'del':
		$ids = isset($_POST['com'])&&is_array($_POST['com'])?$_POST['com']:array();
		if ($res = $com->ComDel($ids)) {
			to_url('comment.php?message=5');
		}else{
			to_url('comment.php?message=-5');
		}
		break;
	default:
		$art = new ArticleModel;
		if (!$res = $com->ComCount()) {
			$message = '评论数量查询失败';
			die($message);
		}
		if (!$coms = $com->ComList()) {
			$message = '评论查询失败';
			die($message);
		}
		if (!$arts = $art->articles()) {
			$message = '文章查询失败';
			die($message);
		}
		foreach ($coms as $key => $value) {
			foreach ($arts as $k => $v) {
				if ($value['artid']==$v['id']) {
					$coms[$key]['arttit']=$v['title'];
				}
			}
		}
		include View::admin('comment');
		break;
}
