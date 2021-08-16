<?php

namespace controller\register;

use lib\Auth;

function get()
{
    require_once SOURCE_BASE . 'views/register.php';
}

function post()
{
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $username = $_POST['username'];

    if (Auth::regist($id, $pwd, $username)) {
        echo "登録成功";
    } else {
        echo "登録失敗";
    }
}
