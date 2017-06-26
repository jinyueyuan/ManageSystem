<?php
/**
 * Created by PhpStorm.
 * User: m.cb
 * Date: 15/12/11
 * Time: 19:11
 */
require_once '../DB/connDB.php';

class familyQuery{
    private $stu_id;
    private $number;
    private $member_name;
    private $relations;
    private $politics;
    private $telephone;
    private $job;
    private $workplace;
    private $income;
    private $health;
    private $showRs;

    public function __get($name){
        return $this->$name;
    }

    public function showFamilyQuery($stu_id){
        $showSql="SELECT * FROM family WHERE stu_id=$stu_id";
        $showRs=mysql_query($showSql);
        if($showRs){
            $this->showRs=$showRs;
        }
    }

    public function showFamilyLis(){
        $array=mysql_fetch_array($this->showRs);
        $this->number=$array['number'];
        $this->member_name=$array['member_name'];
        $this->relations=$array['relations'];
        $this->politics=$array['politics'];
        $this->telephone=$array['telephone'];
        $this->job=$array['job'];
        $this->workplace=$array['workplace'];
        $this->income=$array['income'];
        $this->health=$array['health'];
    }

    public function getRow(){
        $row=@mysql_num_rows($this->showRs);
        return $row;
    }

    public function addFamily($number,$member_name,$relations,$politics,$telephone,$job,$workplace,$income,$health){
        $this->stu_id=$_COOKIE['stu_id'];
        $addSql="INSERT INTO family(stu_id,number,member_name,relations,politics,telephone,job,workplace,income,health) VALUES ($this->stu_id,$number,'$member_name','$relations','$politics','$telephone','$job','$workplace','$income','$health')";
        $addRs=mysql_query($addSql);
        if(!$addRs){
            echo "<script>alert('添加失败');window.location.href='addFamily.php';</script>";
        }else{
            echo "<script>alert('添加成功');window.location.href='showFamily.php?modifyReturn=1';</script>";
        }
    }

    public function modifyFamilyRead($number){
        $this->stu_id=$_COOKIE['stu_id'];
        $modifyReadSql="SELECT * FROM family WHERE stu_id = $this->stu_id and number = $number";
        $modifyReadRs=@mysql_query($modifyReadSql);
        $array=mysql_fetch_array($modifyReadRs,MYSQL_ASSOC);
        $this->number=$array['number'];
        $this->member_name=$array['member_name'];
        $this->relations=$array['relations'];
        $this->politics=$array['politics'];
        $this->telephone=$array['telephone'];
        $this->job=$array['job'];
        $this->workplace=$array['workplace'];
        $this->income=$array['income'];
        $this->health=$array['health'];
    }

    public function modifyFamilyWrite($number,$member_name,$relations,$politics,$telephone,$job,$workplace,$income,$health){
        $this->stu_id=$_COOKIE['stu_id'];
        $modifyWriteSql="UPDATE family SET number='$number',member_name='$member_name',relations='$relations',politics='$politics',telephone='$telephone',job='$job',workplace='$workplace',income='$income',health='$health' WHERE stu_id=$this->stu_id and number=$number";
        $modifyWriteRs=mysql_query($modifyWriteSql);
        if(!$modifyWriteRs){
            echo "<script>alert('修改失败');window.location.href='modifyFamily.php';</script>";
        }else{
            echo "<script>alert('修改成功');window.location.href='showFamily.php?modifyReturn=1';</script>";
        }
    }

    public function deleteFamily($number){
        $this->stu_id=$_COOKIE['stu_id'];
        $deleteSql="DELETE FROM family WHERE stu_id=$this->stu_id and number=$number";
        $deleteResult=mysql_query($deleteSql);
        if (!$deleteResult) {
            echo "<script>alert('删除失败');window.location.href='showFamily.php?modifyReturn=1';</script>";
        } else {
            echo "<script>window.location.href='showFamily.php?modifyReturn=1';</script>";
        }
    }
}
$familyQuery=new familyQuery();
if(!empty($_GET['stu_id'])&&!empty($_GET['check'])){
    $stu_id=$_GET['stu_id'];
    setcookie("stu_id",$stu_id);
    $familyQuery->showFamilyQuery($stu_id);
}elseif(isset($_COOKIE['stu_id'])&&!empty($_GET['modifyReturn'])){
    $stu_id=$_COOKIE["stu_id"];
    $familyQuery->showFamilyQuery($stu_id);
} elseif(!empty($_POST['submit'])&&$_POST['submit']=="确认提交"){
    $number=$_POST['number'];
    $member_name=$_POST['member_name'];
    $relations=$_POST['relations'];
    $politics=$_POST['politics'];
    $telephone=$_POST['telephone'];
    $job=$_POST['job'];
    $workplace=$_POST['workplace'];
    $income=$_POST['income'];
    $health=$_POST['health'];
    $familyQuery->addFamily($number,$member_name,$relations,$politics,$telephone,$job,$workplace,$income,$health);
}elseif(!empty($_POST['submit'])&&$_POST['submit']=="确认修改"){
    $number=$_POST['number'];
    $member_name=$_POST['member_name'];
    $relations=$_POST['relations'];
    $politics=$_POST['politics'];
    $telephone=$_POST['telephone'];
    $job=$_POST['job'];
    $workplace=$_POST['workplace'];
    $income=$_POST['income'];
    $health=$_POST['health'];
    $familyQuery->modifyFamilyWrite($number,$member_name,$relations,$politics,$telephone,$job,$workplace,$income,$health);
}elseif(!empty($_GET['delete'])){
    $number=$_GET['number'];
    $familyQuery->deleteFamily($number);
}