<?php

/**
 * Created by PhpStorm.
 * User: jinzil
 * Date: 2015/12/21
 * Time: 16:43
 */
class classCount
{
    private $grade_id;
    private $class_id;
    private $total_num;
    private $avg_age;
    private $total_boy;
    private $total_girl;
  function classCount($gid,$cid){
      $this->grade_id=$gid;
      $this->class_id=$cid;
  }
    function showtotalNum()
    {
        $sql = "SELECT COUNT(stu_id) AS total_num FROM stu_belong_class WHERE grade_id=$this->grade_id AND class_id=$this->class_id";
        $result = mysql_query($sql);
        $array = mysql_fetch_array($result);
        $this->total_num = $array['total_num'];
        return $this->total_num;
    }
    function showtotalBoy()
    {
        $sql = "SELECT COUNT(student.stu_id) AS total_boy FROM stu_belong_class,student WHERE grade_id=$this->grade_id AND class_id=$this->class_id
          AND stu_belong_class.stu_id=student.stu_id AND sex='男'";
        $result = mysql_query($sql);
        $array = mysql_fetch_array($result);
        $this->total_boy = $array['total_boy'];
        return $this->total_boy;
    }
    function showtotalGirl(){
        $sql="SELECT COUNT(student.stu_id) AS total_girl FROM stu_belong_class,student WHERE grade_id=$this->grade_id AND class_id=$this->class_id
          AND stu_belong_class.stu_id=student.stu_id AND sex='女'";
        $result=mysql_query( $sql);
        $array=mysql_fetch_array($result);
        $this->total_girl=$array['total_girl'];
        return $this->total_girl;
    }
    function showavgAge(){
        $sql="SELECT AVG(birth_year) AS avg_age FROM stu_belong_class,student WHERE grade_id=$this->grade_id AND class_id=$this->class_id
       AND stu_belong_class.stu_id=student.stu_id";
        $result=mysql_query( $sql);
        $array=mysql_fetch_array($result);
        $this->avg_age=round(2015-$array['avg_age']);
        return $this->avg_age;
    }


}