<?php

namespace lib;

use db\UserQuery;

class Auth
{
    public static function login($id, $pwd)
    {
        $is_login_ok = false;
        $user = UserQuery::fetchById($id);

        if (!empty($user) && $user->del_flg !== 1) {
            if (password_verify($pwd, $user->pwd)) {
                $is_login_ok = true;
                $_SESSION['user'] = $user;
            } else {
                echo "パスワードが違います";
            }
        } else {
            echo "ユーザが存在しません";
        }

        return $is_login_ok;
    }

    public static function regist($id, $pwd, $username)
    {
        $is_regist_ok = false;
        $is_user_exist = !empty(UserQuery::fetchById($id));

        if ($is_user_exist) {
            echo '既にユーザが存在します';
            return false;
        }

        $is_regist_ok = UserQuery::insert($id, $pwd, $username);

        return $is_regist_ok;
    }
}
