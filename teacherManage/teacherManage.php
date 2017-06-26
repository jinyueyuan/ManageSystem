<?php

/**
 * Created by PhpStorm.
 * User: m.cb
 * Date: 15/11/16
 * Time: 23:47
 */
require_once '../DB/connDB.php';

class teacherManage
{
    private $tea_id;
    private $tea_name;
    private $sex;
    private $year;
    private $month;
    private $day;
    private $id_card;
    private $nation;
    private $politice;
    private $education;
    private $profession;
    private $photo;
    private $phone;
    private $email;
    private $remark;

    public function __get($name){
        return $this->$name;
    }

    public function tea_idCheck($tea_id){
        $this->tea_id=$tea_id;
        $isset=0;
        $sql="SELECT * FROM teacher WHERE tea_id=$tea_id";
        $result=mysql_query($sql);
        $row=mysql_num_rows($result);
        if($row>0){
            $isset = 1;
        }
        echo $isset;
    }

    public function addTeacher($tea_id,$tea_name,$sex,$year,$month,$day,$id_card,$nation,$politice,$education,$profession,$photo,$phone,$email,$remark){
        $this->tea_id=$tea_id;
        $this->tea_name=$tea_name;
        $this->sex=$sex;
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
        $this->id_card=$id_card;
        $this->nation=$nation;
        $this->politice=$politice;
        $this->education=$education;
        $this->profession=$profession;
        $this->photo=$photo;
        $this->phone=$phone;
        $this->email=$email;
        $this->remark=$remark;
        $addSql="INSERT INTO teacher(tea_id,tea_name,sex,year,month,day,id_card,nation,politics,education,profession,photo,telephone,email,remark,password)VALUE ('$this->tea_id','$this->tea_name','$this->sex',$this->year,$this->month,$this->day,'$this->id_card','$this->nation','$this->politice',
'$this->education','$this->profession','$this->photo','$this->phone','$this->email','$this->remark','111')";
        $addResult=@mysql_query($addSql);
        if ($addResult) {
            echo "<script>alert('添加成功');window.location.href='showTeacher.php';</script>";
        } else {
            echo "<script>alert('添加失败');window.location.href='addTeacher.php';</script>";
        }
    }

    public function deleteTeacher($tea_id){
        $this->tea_id=$tea_id;
        $deletePhotoSql="SELECT photo FROM teacher WHERE tea_id=$tea_id";
        $result=mysql_query($deletePhotoSql);
        $NameTmp=mysql_fetch_array($result);
        $deletePhotoName=$NameTmp[0];
        if($deletePhotoName!=""){
            $deleteStringName="../photo/$deletePhotoName";
            unlink($deleteStringName);
        }
        $deleteSql="DELETE FROM teacher WHERE tea_id=$this->tea_id";
        $deleteResult=mysql_query($deleteSql);
        if ($deleteResult) {
            echo "<script>window.location.href='showTeacher.php';</script>";
        } else {
            echo "<script>alert('删除失败');window.location.href='showTeacher.php';</script>";
        }
    }
    public function checkTeacher($tea_id){
        $checkSql="SELECT * FROM teacher WHERE tea_id= $tea_id";
        $checkResult=mysql_query($checkSql);
        $array=mysql_fetch_array($checkResult,MYSQL_ASSOC);
        $this->tea_id=$array['tea_id'];
        $this->tea_name=$array['tea_name'];
        $this->sex=$array['sex'];
        $this->year=$array['year'];
        $this->month=$array['month'];
        $this->day=$array['day'];
        $this->id_card=$array['id_card'];
        $this->nation=$array['nation'];
        $this->politice=$array['politics'];
        $this->education=$array['education'];
        $this->profession=$array['profession'];
        $this->photo=$array['photo'];
        $this->phone=$array['telephone'];
        $this->email=$array['email'];
        $this->remark=$array['remark'];
    }

    public function modifyTeacherCommit($tea_id,$tea_name,$sex,$year,$month,$day,$id_card,$nation,$politice,$education,$profession,$photo,$phone,$email,$remark){
        $this->tea_id=$tea_id;
        $this->tea_name=$tea_name;
        $this->sex=$sex;
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
        $this->id_card=$id_card;
        $this->nation=$nation;
        $this->politice=$politice;
        $this->education=$education;
        $this->profession=$profession;
        $this->photo=$photo;
        $this->phone=$phone;
        $this->email=$email;
        $this->remark=$remark;
        $modifyCommitSql="UPDATE teacher SET tea_id=$this->tea_id, tea_name='$this->tea_name',sex='$this->sex',year=$this->year,month=$this->month,day=$this->day,id_card='$this->id_card',nation='$this->nation',
politics='$this->politice',education='$this->education',profession='$this->profession',photo='$this->photo',telephone='$this->phone',email='$this->email',remark='$this->remark'WHERE tea_id=$this->tea_id";
        $modifyCommitResult=@mysql_query($modifyCommitSql);
        if ($modifyCommitResult) {
            echo "<script>alert('修改成功');window.location.href='showTeacher.php';</script>";
        } else {
            echo "<script>alert('修改失败');window.location.href='modifyTeacher.php?tea_id=$this->tea_id& modify=2';</script>";
        }
    }

    public function modifyTeacherRead($tea_id){
        $modifyReadSql="SELECT * FROM teacher WHERE tea_id = $tea_id";
        $modifyReadResult=@mysql_query($modifyReadSql);
        $array=mysql_fetch_array($modifyReadResult,MYSQL_ASSOC);
        $this->tea_id=$array['tea_id'];
        $this->tea_name=$array['tea_name'];
        $this->sex=$array['sex'];
        $this->year=$array['year'];
        $this->month=$array['month'];
        $this->day=$array['day'];
        $this->id_card=$array['id_card'];
        $this->nation=$array['nation'];
        $this->politice=$array['politics'];
        $this->education=$array['education'];
        $this->profession=$array['profession'];
        $this->photo=$array['photo'];
        $this->phone=$array['telephone'];
        $this->email=$array['email'];
        $this->remark=$array['remark'];
    }
}
function admin()
{
    $teacherManage = new teacherManage();
    if(!empty($_POST['check_tea_id'])){
        $teacherManage->tea_idCheck($_POST['check_tea_id']);
    }
    if (!empty($_POST['submit']) && $_POST['submit'] == "确认提交") {
        $tea_id = $_POST['tea_id'];
        $tea_name = $_POST['tea_name'];
        $sex = $_POST['sex'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $id_card = $_POST['id_card'];
        $nation = $_POST['nation'];
        $politice = $_POST['politice'];
        $education = $_POST['education'];
        $profession = $_POST['profession'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $remark = $_POST['remark'];
        $photo_name="";
        if($_FILES['photo']['name']!=""){
            $photo = $_FILES['photo'];
            $extension=substr($photo['name'], strrpos($photo['name'], '.')+1);
            $photo_name = "$tea_id.$extension";
            move_uploaded_file($photo['tmp_name'], "../photo/$photo_name");
        }
        $teacherManage->addTeacher($tea_id, $tea_name, $sex, $year, $month, $day, $id_card, $nation, $politice, $education, $profession, $photo_name, $phone, $email, $remark);
    } else if (!empty($_GET['tea_id']) && !empty($_GET['delete'])) {
        $teacherManage->deleteTeacher($_GET['tea_id']);
    } else if (!empty($_POST['submit']) && $_POST['submit'] == "确认修改") {
        $tea_id = $_POST['tea_id'];
        $tea_name = $_POST['tea_name'];
        $sex = $_POST['sex'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $id_card = $_POST['id_card'];
        $nation = $_POST['nation'];
        $politice = $_POST['politice'];
        $education = $_POST['education'];
        $profession = $_POST['profession'];
        $oldPhoto = $_POST['oldPhoto'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $remark = $_POST['remark'];
        if($_FILES['photo']['name']!=""){
            $photo = $_FILES['photo'];
            $extension=substr($photo['name'], strrpos($photo['name'], '.')+1);
            $photo_name = "$tea_id.$extension";
            move_uploaded_file($photo['tmp_name'], "../photo/$photo_name");
        }else{
            $photo_name = $oldPhoto;
        }
        $teacherManage->modifyTeacherCommit($tea_id, $tea_name, $sex, $year, $month, $day, $id_card, $nation, $politice, $education, $profession, $photo_name, $phone, $email, $remark);
    }
}
admin();