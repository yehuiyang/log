<?php
/**
 * DB数据库连接类
 */
class DB{
    protected static $dbh;
    protected $stmt;
    /**
     * [__construct 实列化PDO类]
     * @param string $dsn  [dsn数据库连接信息]
     * @param string $user [用户名]
     * @param string $pass [用户密码]
     */
    public function __construct($dsn = '', $user = '', $pass = ''){
        //判断PDO类是否存在
        if (!class_exists('PDO',false)) {
            //处理异常
            throw new ErrorException('Class "PDO" not found');
        }
        //捕获异常
        try {
            //创建PDO实体类
            self::$dbh = new PDO($dsn,$user,$pass);
        } catch (PDOException $e){
            throw new ErrorException(mb_convert_encoding($e->getMessage(), 'utf-8','gbk'));
        }
    }
    /**
     * [query 执行SQL]
     * @param  [type] $queryString [SQL语句->":xx"占位]
     * @param  array  $params      [绑定参数->array]
     * @return [type]              [查询结果]
     */
    public function query($queryString,$params = array()){
        //预执行SQL
        $this->stmt = self::$dbh->prepare($queryString,$params);
        //匹配SQL中的绑定参数
        if (preg_match_all('/(:\w+)\b/sim', $queryString, $matches)) {
            //判断匹配参数个数是否相等
            if (count($matches[1])!==count($params)) {
                throw new ErrorException('Aguments error');
            }
            //创建键值对数组
            $data = array_combine($matches[1], $params);
            //遍历绑定
            foreach ($data as $key => &$value) {
                //循环绑定，第二个参数由于引用关系，所以不能直接传递值，只能传递地址
                $this->stmt->bindParam($key,$data[$key]);
            }
            return $this->stmt->execute();
        }
    }
    //获取影响行数
    public function getrowcount(){
        return $this->stmt -> rowcount();
    }
    /**
     * [getError 获取错误]
     * @return [type] [返回错误信息]
     */
    public function getError(){
        if (isset(self::$dbh)) {
            $info = self::$dbh->errorInfo();
            return $info[2];
        }
    }
}
$db = new DB('mysql:host=localhost;dbname=log;port=3306;charset=utf8','yehuiyang', '54874664');
$res = $db->query('SELECT * FROM `articles` WHERE `id` = :id',array(2));
var_dump($res);
var_dump($db->getrowcount());
var_dump($db->getError()); 