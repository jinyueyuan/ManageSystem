<?php
/**
 * Created by PhpStorm.
 * User: m.cb
 * Date: 15/11/26
 * Time: 17:17
 */

require_once '../DB/connDB.php';

class classCatalog_2
{

    private $stu_id;
    private $stu_name;
    private $grade_id;
    private $class_id;
    private $job_name;
    private $seat_id;
    private $catalogResult;
    private $row;
    public $grade_id2;
    public $class_id2;

    public function sqlQuery_check()
    {


            $checkCatalog_sql = "SELECT * FROM stu_belong_class,student,jobinfor WHERE stu_belong_class.class_id=$this->class_id2 AND stu_belong_class.grade_id=$this->grade_id2
                                        AND stu_belong_class.stu_id=student.stu_id AND stu_belong_class.stu_job=jobinfor.job_name";
            $this->catalogResult = mysql_query($checkCatalog_sql);
            $stuRow = @mysql_num_rows($this->catalogResult);
/*            if ($stuRow > 0) {
                echo "<script>document.getElementById('table').style.display='block';</script>";
            }*/


        return $this->catalogResult;
    }

    public function sqlQuery_sort()
    {


            $sortCatalog_sql = "SELECT * FROM stu_belong_class,student,jobinfor WHERE stu_belong_class.class_id=$this->class_id2 AND stu_belong_class.grade_id=$this->grade_id2
                                        AND stu_belong_class.stu_id=student.stu_id AND stu_belong_class.stu_job=jobinfor.job_name ORDER BY jobinfor.job_seq";
            $this->catalogResult = mysql_query($sortCatalog_sql);
            $stuRow = @mysql_num_rows($this->catalogResult);
 /*           if ($stuRow > 0) {
                echo "<script>document.getElementById('table').style.display='block';</script>";
            }*/

            return $this->catalogResult;


    }


    public function getRow()
    {

        $this->row = @mysql_num_rows($this->catalogResult);
        return $this->row;
    }

    public function showList()
    {


        $array = mysql_fetch_array($this->catalogResult, MYSQL_ASSOC);

        $this->stu_id = $array['stu_id'];
        $this->stu_name = $array['stu_name'];
        $this->class_id = $array['class_id'];
        $this->grade_id = $array['grade_id'];
        $this->job_name = $array['job_name'];
        $this->seat_id = $array['seat_id'];
    }

    public function __get($name)
    {
        return $this->$name;
    }


}
