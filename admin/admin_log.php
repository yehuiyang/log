<?php
//
require dirname(__DIR__).'/inti.php';
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
	echo '没有数据';
}
