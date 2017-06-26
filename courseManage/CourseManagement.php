<?php
include "../DB/connDB.php";

class CourseManagement {
    private $course_id;
    private $cou_name;
    private $credits;

    public function addCourse($course_id,$cou_name,$credits) {
        $this->course_id = $course_id;
        $this->cou_name = $cou_name;
        $this->credits = $credits;

        $userid = $_COOKIE['userid'];
        $gradeID_sql = "SELECT grade_id FROM sys_manager WHERE man_id=$userid";
        $gradeIDResult = mysql_query($gradeID_sql);
        list($grade_id) = @mysql_fetch_row($gradeIDResult);

        $add_sql = "insert into course(course_id,cou_name,credits,grade_id)values($this->course_id,'$this->cou_name',$this->credits,$grade_id)";
        $addResult = mysql_query($add_sql);

        if($addResult) {
            echo "<script>alert('添加成功');window.location.href='viewCourseCatalog.php';</script>";
        } else {
            echo "<script>alert('添加失败');window.location.href='viewCourseCatalog.php';</script>";
        }
        //mysql_free_result($addResult);
    }

    public function deleteCourse($course_id) {
        //echo "enter deleteCourse_01";
        $this->course_id = $course_id;

        //echo "enter deleteCourse_02";
        $delete_sql = "delete from course where course_id=$this->course_id";
        $deleteResult = mysql_query($delete_sql);
        //echo "enter deleteCourse_03";
        if($deleteResult) {
            echo "<script>alert('删除成功');window.location.href='viewCourseCatalog.php';</script>";
        } else {
            echo "<script>alert('删除失败');window.location.href='viewCourseCatalog.php';</script>";
        }
        mysql_free_result($deleteResult);
    }

    public function updateCourse($course_id,$cou_name,$credits) {
        //echo "enter updateCourse_01";
        $this->course_id = $course_id;
        $this->cou_name = $cou_name;
        $this->credits = $credits;

        //echo "enter updateCourse_02";
        $update_sql = "update course set cou_name='$this->cou_name',credits='$this->credits' where course_id='$this->course_id'";
        $updateResult = mysql_query($update_sql);
        //echo "enter updateCourse_03";
        if($updateResult) {//echo "enter updateCourse_04";
            echo "<script>alert('修改成功');window.location.href='viewCourseCatalog.php';</script>";
        } else {//echo "enter updateCourse_05";
            echo "<script>alert('修改失败');window.location.href='viewCourseCatalog.php';</script>";
        }
        //mysql_free_result($updateResult);
    }

    public function searchCourse($course_id) {
        $search_sql = "select * from course where course_id = $course_id";
        $searchResult = mysql_query($search_sql);
        $array = mysql_fetch_array($searchResult,MYSQL_ASSOC);
        $this->courseID = $array['course_id'];
        $this->courseName = $array['cou_name'];
        $this->cridet = $array['credits'];
        mysql_free_result($searchResult);
    }
}



function admin() {
    $courseManagement = new CourseManagement();
    if($_GET["action"] == "add") {
        $course_id = $_POST['course_id'];
        $cou_name = $_POST['cou_name'];
        $credits = $_POST['credits'];

        $courseManagement->addCourse($course_id,$cou_name,$credits);
    }
    else if($_GET["action"] == "delete") {
        $courseManagement->deleteCourse($_GET['id']);
    }
    else if($_GET["action"] == "update") {
        $course_id = $_POST['course_id'];
        $cou_name = $_POST['cou_name'];
        $credits = $_POST['credits'];

        $courseManagement->updateCourse($course_id,$cou_name,$credits);
    }
}

admin();
mysql_close($getConnDB);

?>