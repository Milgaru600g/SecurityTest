<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Session Login Test</title>
    </head>
    <body>
        <h1>Hello, world!</h1>
        <?php
            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
                echo "<p>�α����� �� �ּ���. <a href=\"login.php\">[�α���]</a></p>";
            } else {
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];
                echo "<p><strong>$user_name</strong>($user_id)�� ȯ���մϴ�.";
                echo "<a href=\"logout.php\">[�α׾ƿ�]</a></p>";
            }
        ?>
        <hr />
        <p>������ ��������ó�� �������� �׷��� ���� ������ ���� �ž�</p>
    </body>
</html>