<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h3><?php
        echo 'ようこそ' . $_SESSION['user']->username . 'さん';
        ?></h3>
</head>

<body>