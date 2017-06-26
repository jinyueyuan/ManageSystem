<?php
require_once '../DB/connDB.php';

function recordScore($stu_id,$course_id,$tea_id,$score) {
    $score_sql = "UPDATE take_class SET score=$score WHERE stu_id=$stu_id AND course_id=$course_id AND tea_id=$tea_id";
    $scoreResult = mysql_query($score_sql);

    if(!$scoreResult) {
        echo "<script>alert('保存失败');history.go(-1);</script>";
    }else{
        echo "<script>alert('保存成功');history.go(-1);</script>";
    }
}

function recordCheckIn($stu_id,$course_id,$tea_id,$check_in) {
    $newCheckIn = $check_in+1;
    $checkIn_sql = "UPDATE take_class SET check_in=$newCheckIn WHERE stu_id=$stu_id AND course_id=$course_id AND tea_id=$tea_id";
    $checkInResult = mysql_query($checkIn_sql);

    if(!$checkInResult) {
        echo "<script>alert('操作失败');history.go(-1);</script>";
    } else{
        echo "<script>alert('保存成功');history.go(-1);</script>";
    }
}

function admin() {
    if(!empty($_GET['submit']) && $_GET['submit'] == "保存") {
        $stu_id = $_GET['stu_id'];
        $course_id = $_GET['course_id'];
        $tea_id = $_GET['tea_id'];
        $score = $_GET['score'];
        recordScore($stu_id,$course_id,$tea_id,$score);
    } elseif(!empty($_GET['action']) && $_GET['action'] == "check_in") {
        $stu_id = $_GET['stu_id'];
        $course_id = $_GET['course_id'];
        $tea_id = $_GET['tea_id'];
        $check_in = $_GET['check_in'];
        recordCheckIn($stu_id,$course_id,$tea_id,$check_in);
    }
}

admin();
?>