<?php
require_once "../DB/connDB.php";

class TakeCourseManagement {
    private $stu_id;
    private $class_id;
    private $course_id;
    private $tea_id;

    public function addTakeCourse($stu_id,$class_id,$course_id,$tea_id) {
        $this->stu_id = $stu_id;
        $this->class_id = $class_id;
        $this->course_id = $course_id;
        $this->tea_id = $tea_id;

        $userid = $_COOKIE['userid'];
        $gradeID_sql = "SELECT grade_id FROM sys_manager WHERE man_id=$userid";
        $gradeIDResult = mysql_query($gradeID_sql);
        list($grade_id) = @mysql_fetch_row($gradeIDResult);

        $add_sql = "INSERT INTO take_class(stu_id,class_id,course_id,tea_id,check_in,score,grade_id) VALUES($this->stu_id,$this->class_id,$this->course_id,$this->tea_id,0,0,$grade_id)";
        $addResult = mysql_query($add_sql);
        if($addResult) {
            echo "<script>alert('添加成功');window.location.href='viewTakeCourseCatalog.php';</script>";
        } else {
            echo "<script>alert('添加失败');window.location.href='viewTakeCourseCatalog.php';</script>";
        }
//        mysql_free_result($this->addResult);
    }

    public function deleteTakeCourse($stu_id,$course_id,$tea_id) {
        $this->stu_id = $stu_id;
        $this->course_id = $course_id;
        $this->tea_id = $tea_id;

        $delete_sql = "delete from take_class where stu_id=$this->stu_id and course_id=$this->course_id and tea_id=$this->tea_id";
        $deleteResult = mysql_query($delete_sql);
        if($deleteResult) {
            echo "<script>alert('删除成功');window.location.href='viewTakeCourseCatalog.php';</script>";
        } else {
            echo "<script>alert('删除失败');window.location.href='viewTakeCourseCatalog.php';</script>";
        }
//        mysql_free_result($deleteResult);
    }

    public function updateTakeCourse($stu_id,$class_id,$course_id,$tea_id) {
        $this->stu_id = $stu_id;
        $this->class_id = $class_id;
        $this->course_id = $course_id;
        $this->tea_id = $tea_id;

        $update_sql = "UPDATE take_class SET class_id=$this->class_id,course_id=$this->course_id,tea_id=$this->tea_id WHERE stu_id=$this->stu_id";
        $updateResult = mysql_query($update_sql);
        if($updateResult) {
            echo "<script>alert('修改成功');window.location.href='viewTakeCourseCatalog.php';</script>";
        } else {
            echo "<script>alert('修改失败');window.location.href='viewTakeCourseCatalog.php';</script>";
        }
//        mysql_free_result($this->updateResult);
    }

    public function searchTakeCourse($stu_id) {
        $this->stu_id = $stu_id;

        $search_sql = "select * from take_class where stu_id=$this->stu_id";
        $searchResult = mysql_query($search_sql);
        return $searchResult;
    }
}

function admin() {
    $courseManagement = new TakeCourseManagement();
    if($_GET["action"] == "add") {
        $stu_id = $_POST['stu_id'];
        $class_id = $_POST['class_id'];
        $course_id = $_POST['course_id'];
        $tea_id = $_POST['tea_id'];

        $courseManagement->addTakeCourse($stu_id,$class_id,$course_id,$tea_id);
    }
    else if($_GET["action"] == "delete") {
        $stu_id = $_GET['stu_id'];
        $course_id = $_GET['course_id'];
        $tea_id = $_GET['tea_id'];
        $courseManagement->deleteTakeCourse($stu_id,$course_id,$tea_id);
    }
    else if($_GET["action"] == "update") {
        $stu_id = $_POST['stu_id'];
        $class_id = $_POST['class_id'];
        $course_id = $_POST['course_id'];
        $tea_id = $_POST['tea_id'];

        $courseManagement->updateTakeCourse($stu_id,$class_id,$course_id,$tea_id);
    }
}

admin();
mysql_close($getConnDB);

?>