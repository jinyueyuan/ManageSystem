<?php

require_once '../DB/connDB.php';
if(!isset($_POST['submit'])){
   exit('非法访问');
}
//session_start();
//if($_GET['action'] == "logout"){  //注销登陆
//    session_destroy();
//    echo '注销登录成功！点击此处 <a href="loginFace.php">登录</a>';
//
//    exit;
//}
else{
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $identity = "";
    if(!empty($_POST['identity'])){
        $identity = $_POST['identity'];
        submit($userid,$password,$identity);
    }
}
function submit($userid,$password,$identity){
    if($identity == "teacher"){
        $check_query1 = mysql_query("select * from teacher where tea_id = '$userid' and password = '$password'");
        if($result = mysql_fetch_array($check_query1)){
            setcookie('userid',$result['tea_id'],time()+3600,'/');
            setcookie('username', $result['tea_name'],time()+3600,'/');
            header("Location:../Main/home.php");
        }else{
            echo "<script>alert('用户名或者密码错误');</script>";
        }
    }else{
        $check_query2 = mysql_query("select * from sys_manager where man_id = '$userid' and password = '$password'");
        if(mysql_query( $check_query2))
            echo "ok";
        else
            echo "check_query2 error";
        if($result = mysql_fetch_array($check_query2)){
            setcookie("userid",$result['man_id'],time()+3600,'/');
            setcookie('username',$result['man_name'],time()+3600,'/');
            header("Location:../Main/index.php");
        }else{
            echo "<script>alert('用户名或者密码错误');</script>";
        }
    }
}

?>