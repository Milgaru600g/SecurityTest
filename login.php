<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Session Login Test</title>
    </head>
    <body>
        <h1>Hello, world!</h1>
        <hr />
        <h2>�α���</h2>
        <?php if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) { ?>
        <form method="post" action="login_ok.php">
            <p>���̵�: <input type="text" name="user_id" /></p>
            <p>��й�ȣ: <input type="password" name="user_pw" /></p>
            <p><input type="submit" value="�α���" /></p>
        </form>
        <?php } else {
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            echo "<p><strong>$user_name</strong>($user_id)���� �̹� �α����ϰ� �ֽ��ϴ�. ";
            echo "<a href=\"index.php\">[���ư���]</a> ";
            echo "<a href=\"logout.php\">[�α׾ƿ�]</a></p>";
        } ?>
    </body>
</html>