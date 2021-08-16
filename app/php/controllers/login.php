<?php

namespace controller\login;

use lib\Auth;

function get()
{
    require_once SOURCE_BASE . 'views/login.php';
}

function post()
{
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    if (Auth::login($id, $pwd)) {
        echo "ログイン成功";
    } else {
        echo "ログイン失敗";
    }
}
