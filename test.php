<?php
/* Connect to an ODBC database using driver invocation */
// $dsn = 'mysql:host=localhost;dbname=log;port=3306;charset=utf8';
// $user = 'yehuiyang';
// $password = '54874664';

// try {
//     $dbh = new PDO($dsn, $user, $password);
//     var_dump($dbh);
//     //********不安全的连接********
//     // $sql = 'SELECT * FROM `articles` WHERE 1';
//     // $stmt = $dbh->query($sql,PDO::FETCH_NUM);
//     // var_dump($stmt);
//     // foreach ($stmt as $key => $value) {
//     //     var_dump($value);
//     // }

//     //********安全的连接1.0********
//     // $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
//     // $stmt = $dbh->prepare ($sql);
//     // $id = 1;
//     // $stmt -> bindParam(':id',$id,PDO::PARAM_INT);
//     // $stmt -> execute();
//     // var_dump($stmt);

//     //********安全的连接2.0********
//     $stmt = $dbh->prepare('SELECT * FROM `articles` WHERE `id` = ?');
//     var_dump($stmt);
//     $stmt -> execute(array(1));
//     //获取影响行数
//     var_dump($stmt -> rowcount());
//     $res = $stmt->fetch(PDO::FETCH_ASSOC);
//     var_dump($res);
//     //关闭数据库
//     $dbh = null;
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . mb_convert_encoding($e->getMessage(), 'utf-8','gbk');
// }



function test(){

}
test();