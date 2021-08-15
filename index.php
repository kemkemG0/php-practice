<?php
$user = 'test';
$pass = 'test';

require_once 'database.php';

use db\Database;

function fetch_posts($db)
{
    $sql = 'SELECT * FROM posts;';
    $result = $db->select($sql);
    foreach ($result as $val) {
        echo $val['id'], "<br>";
        echo $val['title'], "<br>";
        echo $val['content'], "<br>";
    }
}

function post_blog($db, $title, $content)
{
    $sql = "INSERT INTO posts (title,content) VALUE(:title,:content)";
    $params = [':title' => $title, ':content' => $content];
    $db->begin();
    $db->execute($sql, $params);
    $db->commit();
}

try {
    $db = new Database();
    post_blog($db, 'テスト', 'テストテキスト');
    fetch_posts($db);
} catch (PDOException $e) {
    print "エラー!: " . $e->getMessage() . "<br/gt;";
    $db->rollback();
    die();
}
