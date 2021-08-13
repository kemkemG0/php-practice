<?php
//ここはあくまでもサーバ。
//サーバでクッキーをセットして、返してあげてる

//設定するときはかならずこれ
setcookie(
    'VISIT_COUNT',
    1,
    [ //第３引数でクッキーの設定ができる

        //有効期限の設定
        'expires' => time() + 60 * 60 * 24,
        //このパスを包含するところ全てにこのCookieが渡る
        'path' => '/'
    ]
);

//スーパーグローバルの$_COOKIEに直接は変更できない
var_dump($_COOKIE['VISIT_COUNT']);

// ---------------------------SESSION-------------------------------

session_start();
$_SESSION['VISIT_COUNT'] = 1;
echo $_SESSION['VISIT_COUNT'];
//これらは　クッキーのPHPSESSIDというところにセッションIDが保持される
