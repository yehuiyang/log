<?php
require dirname(__DIR__).'/init.php';
$article = new ArticleModel;
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
include View::index('learn');