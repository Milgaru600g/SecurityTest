<?php
    if ( !isset($_POST['user_id']) || !isset($_POST['user_pw']) ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('���̵� �Ǵ� ��й�ȣ�� �����ų� �߸��� �����Դϴ�.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $members = array(
        'sowon' => array('password' => '951207', 'name' => '�ҿ�'),
        'yerin' => array('password' => '960819', 'name' => '����'),
        'eunha' => array('password' => '970530', 'name' => '����'),
        'yuju'  => array('password' => '971014', 'name' => '����'),
        'sinb'  => array('password' => '980603', 'name' => '�ź�'),
        'umji'  => array('password' => '980819', 'name' => '����'),
    );
 
    if( !isset($members[$user_id]) || $members[$user_id]['password'] != $user_pw ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('���̵� �Ǵ� ��й�ȣ�� �߸��Ǿ����ϴ�.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    /* If success */
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $members[$user_id]['name'];
?>
<meta http-equiv="refresh" content="0;url=index.php" />