<?php
require dirname(__DIR__).'/init.php';
$article = new ArticleModel;
$id = isset($_GET['id'])&&is_scalar($_GET['id'])?intval($_GET['id']):0;
if(is_post()){
	$artid = isset($_POST['id'])&&is_scalar($_POST['artid'])?intval($_POST['artid']):0;
	$nkname = isset($_POST['nkname'])&&is_scalar($_POST['nkname'])?addslashes(htmlspecialchars($_POST['nkname'])):'';
	$content = isset($_POST['content'])&&is_scalar($_POST['content'])?addslashes(htmlspecialchars($_POST['content'])):'';
	$postdate = isset($_POST['postdate'])&&is_scalar($_POST['postdate'])?addslashes(htmlspecialchars($_POST['postdate'])):'';
	var_dump($_POST);
}else if ($id) {
	$com = new CommentModel;
	$art = $article->article($id);
	$coms = $com->ComsArtList($id);
	$time = date('Y-m-d H:i:s',time());
	include View::index('news');
}else{
	if (isset($_SESSION['art_info'])) {
		$art = $_SESSION['art_info'];
	}else{
		//判断值是否正确
		if ($art = $article->articles()) {
			$_SESSION['art_info']=$art;
		}else{
			$message = '没有数据';
		}
	}
	include View::index('index');
}
