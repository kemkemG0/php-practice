<?php
session_start();

//初回の、フォームから投げられた情報の確認、OKならSESSIONに登録
if (
    isset($_POST['username']) && isset($_POST['pwd']) &&
    $_POST['username'] === 'test' && $_POST['pwd'] === 'pass'
) {
    //ログイン情報をsessionに登録
    //(設定にもよるが)一度登録されたセッションのキーとなるセッションIDは、
    //  このドメインのサイトならどこでもクッキーとして、サーバに送られる。
    //　　そのため一度ログインに成功すれば、セッションに登録された情報を用いてログインの判定がいつでも行える
    $_SESSION['user'] = [
        'name' => $_POST['username'],
        'pwd' => $_POST['pwd']
    ];
}

if (!empty($_SESSION['user'])) {
    echo 'ログイン中です';
} else {
    echo 'ログインしていません。';
}
