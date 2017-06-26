<?php

require_once '../DB/connDB.php';
/**
 * Created by PhpStorm.
 * User: jinzil
 * Date: 2015/11/18
 * Time: 17:37
 */
class studentManage{
    private $stu_id;
    private $stu_name;
    private $sex;
    private $year;
    private $month;
    private $day;
    private $id_card;
    private $nation;
    private $politics;
    private $phone;
    private $email;
    private $address;
    private $photoaddr;
    private $enter_year;
    private $preschool;
    private $area;
    private $job;
    private $seat_id;
    private $achieve;
    private $punish;
    private $charact;
    private $experience;
    private $class_id;
    private $grade_id;
    function studentManage($c_id,$g_id){
        $this->class_id=$c_id;
        $this->grade_id=$g_id;
    }
    function cover($stu_id,$stu_name,$sex,$id_card, $nation, $year, $month,$day, $img_url,$area,$outlook,$preschool,$enter_year,$phone, $email,$address){
        $this->stu_id=$stu_id;
        $this->stu_name=$stu_name;
        $this->sex=$sex;
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
        $this->id_card=$id_card;
        $this->nation= $nation;
        $this->area= $area;
        $this->politics=$outlook;
        $this->phone=$phone;
        $this->email=$email;
        $this->address=$address;
        $this->photoaddr=$img_url;
        $this->preschool=$preschool;
        $this->enter_year=$enter_year;
        $_COOKIE['class_id'];
    }
    function cover_two( $job,$seat_id){
        $this->job=$job;
        $this->seat_id=$seat_id;
    }
    function cover_three($achieve,$punish,$charact,$experience){
        $this->achieve=$achieve;
        $this->punish=$punish;
        $this->charact=$charact;
        $this->experience=$experience;
    }
    function updateElec($sid){
        $this->judge();
        $this->judge_three();
        $query1="UPDATE student SET stu_name='$this->stu_name',sex='$this->sex',id_card='$this->id_card',nation= '$this->nation',
        birth_year='$this->year',birth_month='$this->month',birth_day='$this->day',photo='$this->photoaddr',area='$this->area',politics='$this->politics',
        preschool='$this->preschool',enter_year='$this->enter_year',telephone='$this->phone',email='$this->email',family_addr='$this->address'WHERE stu_id=$sid";
        if(!mysql_query($query1))
            echo "1error";
        $query2="UPDATE introduction SET experience='$this->experience' ,punish='$this->punish' ,characteristic='$this->charact',achieve='$this->achieve' WHERE stu_id=$sid";
        if(!mysql_query($query2))
            echo "2error";
        if(mysql_query($query1)&&mysql_query($query2))
            echo "<script>alert('修改成功');window.location.href='stu_elecList.php';</script>";
        else
            echo "<script>alert('修改失败');window.location.href='stu_elecList.php';</script>";

    }
    function addStudent(){
        $this->judge();
        $this->judge_two();
        $query1="INSERT INTO student(stu_id,stu_name,sex,id_card,nation,birth_year,birth_month,birth_day,photo,area,politics,preschool,enter_year,telephone,email,family_addr)
VALUES('$this->stu_id','$this->stu_name','$this->sex','$this->id_card', '$this->nation',$this->year,$this->month, $this->day, '$this->photoaddr',' $this->area','$this->politics','$this->preschool',$this->enter_year,$this->phone,'$this->email','$this->address')";
//        mysql_query("SET NAMES 'utf8'",$dbc);
        if(!mysql_query($query1))
            echo "error";
        $query2="INSERT INTO stu_belong_class(stu_id,class_id,grade_id,stu_job,seat_id) VALUES('$this->stu_id','$this->class_id','$this->grade_id','$this->job','$this->seat_id')";
        if(!mysql_query($query2))
            echo "error";
        $query3="INSERT INTO introduction(stu_id) VALUES('$this->stu_id')";
        if (mysql_query($query3))
            echo "<script>alert('添加成功');window.location.href='stu_add.php';</script>";
        else
            echo "<script>alert('添加失败');window.location.href='stu_add.php';</script>";
    }

    function deleteStudent($sid){
        $query="SELECT photo FROM student WHERE stu_id=$sid";
        $row=$this->select($query);
        if( $row){
            $query1="DELETE FROM student WHERE stu_id=$sid";
            $query2="DELETE FROM stu_belong_class WHERE stu_id=$sid";
            $query3="DELETE FROM introduction WHERE stu_id=$sid";
            if (mysql_query($query1)&&mysql_query($query2)&&mysql_query($query3)) {
                if(!empty( $row[0]))
                    unlink( $row[0]);
                echo "<script>alert('删除成功');window.location.href='stu_init.php';</script>";
            }
            else
               echo "<script>alert('删除失败');window.location.href='stu_init.php';</script>";

        }
    }
    public function showStudent($sid){
        $sql="SELECT * FROM student,stu_belong_class WHERE student.stu_id=$sid AND student.stu_id=stu_belong_class.stu_id";
        return $this->select($sql);
    }
    public function showStudentIntro($sid){
        $sql="SELECT * FROM introduction,student WHERE student.stu_id=$sid AND student.stu_id=introduction.stu_id";
        return $this->select($sql);
    }

    function select($sql = "")
    {

        $result = mysql_query($sql);
        if ((!$result) or (empty($result))) {
            @mysql_free_result($result);
            echo "no2";
            return false;
        }
        $row=mysql_fetch_array($result);
        @mysql_free_result($result);
        return $row;
    }
    function updateStudent($sid){
        $this->judge();
        $this->judge_two();
        $query1="UPDATE student SET stu_id='$this->stu_id',stu_name='$this->stu_name',sex='$this->sex',id_card='$this->id_card',nation= '$this->nation',
        birth_year='$this->year',birth_month='$this->month',birth_day='$this->day',photo='$this->photoaddr',area='$this->area',politics='$this->politics',
        preschool='$this->preschool',enter_year='$this->enter_year',telephone='$this->phone',email='$this->email',family_addr='$this->address'WHERE stu_id=$sid";
        if(!mysql_query($query1))
            echo "1error";
        $query2="UPDATE stu_belong_class SET stu_id='$this->stu_id',class_id='$this->class_id',stu_job='$this->job',seat_id='$this->seat_id'WHERE stu_id=$sid";
        if(!mysql_query($query2))
            echo "2error";
        $query3="UPDATE introduction SET stu_id='$this->stu_id'WHERE stu_id=$sid";
        if(!mysql_query($query3))
            echo "3error";
        if ( mysql_query($query1)&&mysql_query($query2)&&mysql_query($query3)){
            echo "<script>alert('修改成功');window.location.href='stu_init.php';</script>";
//            return $this->stu_id;
        }
        else
            echo "<script>alert('修改失败');window.location.href='stu_init.php';</script>";

    }

function judge(){
    $stu_id=$_POST['stu_id'];
    $stu_name=$_POST['stu_name'];
    $sex=$_POST['sex'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    $id_card=$_POST['id_card'];
    $nation=$_POST['nation'];
    $area=$_POST['area'];
    $outlook=$_POST['outlook'];
    $preschool=$_POST['preschool'];
    $enter_year=$_POST['enter_year'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    if(!empty($_FILES['picture'])&&$pic_name1=$_FILES['picture']['name']){
        $extension=explode('.',$pic_name1)[1];
        if(!move_uploaded_file($_FILES['picture']['tmp_name'],$img_url="../stu_image/$stu_id.$extension"))
            echo "picture error";
    }
    else if(!empty($_POST['prephoto'])){
        $img_url=$_POST['prephoto'];}
    else
        $img_url="";
    $this->cover($stu_id,$stu_name,$sex,$id_card, $nation, $year, $month,$day, $img_url,$area,$outlook,$preschool,$enter_year,$phone, $email, $address);

}
    function judge_two(){
        $job=$_POST['job'];
        $seat_id=$_POST['seat_id'];
        $this->cover_two($job,$seat_id);
    }
    function judge_three(){
        $achieve=$_POST['achieve'];
        $punish=$_POST['punish'];
        $charact=$_POST['characteristic'];
        $experience=$_POST['experience'];
        $this->cover_three($achieve,$punish,$charact,$experience);
    }
}



