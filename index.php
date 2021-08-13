<div>
    <!-- パラメータはURLに ?username=hoge 等々 -->
    GET:
    <form action="get.php" method="GET">
        <input type="text" name="username">
        <input type="password" name="pwd" id="">
        <input type="submit" value='push here'>
    </form>
</div>
<div>
    <!-- パラメータはボディ部分に -->
    POST:
    <form action="post.php" method="POST">
        <input type="text" name="username">
        <input type="password" name="pwd" id="">
        <input type="submit" value='push here'>
    </form>
</div>

<div>
    <!-- 配列 -->
    配列の送信:
    <form action="recive.php" method="POST">
        <input type="text" name="members[]">
        <input type="text" name="members[]">
        <input type="text" name="account[id]">
        <input type="text" name="account[pwd]">
        <input type="submit" value='push here'>
    </form>
</div>


<!-- URLは最大2000文字だからブログ投稿とかはPOST
GETだと同じページを共有できる -->