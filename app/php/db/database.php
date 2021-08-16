<?php

namespace db;

use PDO;

class Database
{
    private $conn;
    private $sqlResult;
    public const CLS = "cls";

    public function __construct($host = 'localhost', $port = '8889', $dbName = 'blogapp', $username = 'test', $password = 'test')
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8;";
        $this->conn = new PDO($dsn, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    //更新系
    private function executeSql($sql = "", $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $this->sqlResult =  $stmt->execute($params);
        return $stmt;
    }
    public function execute($sql = "", $params = [])
    {
        $this->executeSql($sql, $params);
        return $this->sqlResult;
    }

    public function begin()
    {
        $this->conn->beginTransaction();
    }
    public function commit()
    {
        $this->conn->commit();
    }
    public function rollback()
    {
        $this->conn->rollBack();
    }

    // 取得系
    public function select($sql = "", $params = [], $type = "", $cls = "")
    {
        $stmt = $this->executeSql($sql, $params);
        if ($type === static::CLS) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, $cls);
        } else {
            return $stmt->fetchAll();
        }
    }

    public function selectOne($sql = "", $params = [], $type = "", $cls = "")
    {
        $result = $this->select($sql, $params, $type, $cls);
        return count($result) > 0 ? $result[0] : false;
    }
}
