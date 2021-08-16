<?php

namespace db;

use db\Database;
use model\UserModel;

class UserQuery
{
    public static function fetchById($id)
    {
        $db = new Database;
        $sql = 'select * from users where id = :id';
        $result = $db->selectOne($sql, [
            ':id' => $id
        ], Database::CLS, UserModel::class);

        return $result;
    }
    public static function insert($id, $pwd, $username)
    {
        $db = new Database;
        $sql = 'INSERT INTO users(id,pwd,username) VALUES (:id,:pwd,:username)';
        $is_inserted = $db->execute($sql, [
            ':id' => $id,
            ':pwd' => password_hash($pwd, PASSWORD_DEFAULT),
            ':username' => $username
        ], Database::CLS, UserModel::class);
        return $is_inserted;
    }
}
