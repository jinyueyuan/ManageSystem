<?php
require_once '../DB/connDB.php';

class classManage
{
    private $class_id;
    private $grade_id;
    private $class_addr;
    private $tea_id;


    function addClass($classID, $gradeID, $classAddr, $teaID)
    {
        $this->class_id = $classID;
        $this->grade_id = $gradeID;
        $this->class_addr = $classAddr;
        $this->tea_id = $teaID;


        $addSql = "INSERT INTO class(class_id,grade_id,class_addr,tea_id) VALUES ($this->class_id,$this->grade_id,'$this->class_addr',$this->tea_id)";
        if (mysql_query($addSql))
            echo "<script>alert('添加成功');window.location.href='viewClassCatalog.php';</script>";
        else
            echo "<script>alert('添加失败');window.location.href='addClass.php';</script>";
    }


    function deleteClass($classID,$gradeID)
    {
        $deleteSql = "delete from class WHERE  class_id =$classID AND grade_id = $gradeID";
        $deleteResult = mysql_query($deleteSql);
        if ($deleteResult)
            echo "okkk";
        echo "bbbb";
//            echo "<script>alert('删除成功');window.location.href='viewClassCatalog.php';</script>";
//        else
//           echo "<script>alert('删除失败');window.location.href='viewClassCatalog.php';</script>";
    }

    function modifyClassInfo($classID, $gradeID, $classAddr, $teaID)
    {
        $this->class_id = $classID;
        $this->grade_id = $gradeID;
        $this->class_addr = $classAddr;
        $this->tea_id = $teaID;

        $modifySql = "UPDATE class SET class_id=$this->class_id, grade_id=$this->grade_id, class_addr='$this->class_addr', tea_id=$this->tea_id
                      WHERE class_id=$this->class_id and grade_id=$this->grade_id";
        $modifyResult = mysql_query($modifySql);
        if ($modifyResult)
            echo "<script>alert('修改成功');window.location.href='viewClassCatalog.php';</script>";
        else
            echo "<script>alert('修改失败');window.location.href='viewClassCatalog.php';</script>";
    }
    public function showInfor($gid,$cid)
    {
        $query = "select * from class,teacher WHERE class_id=$cid AND grade_id=$gid AND teacher.tea_id=class.tea_id";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        return $row;
    }

}


function admin()
{

    $classManage = new classManage();

    if (!empty($_POST['submit']) && $_POST['submit'] == "确认提交") {
        $class_id2 = $_POST['class_id'];
        $grade_id2 = $_COOKIE['grade_id'];
        $class_addr2 = $_POST['class_addr'];
        $tea_id2 = $_POST['tea_id'];
        $classManage->addClass($class_id2, $grade_id2, $class_addr2, $tea_id2);

    } else if (!empty($_GET['class_id']) && !empty($_GET['delete'])) {
        echo $_GET['class_id'].$_COOKIE['grade_id'];
        $classManage->deleteClass($_GET['class_id'],$_COOKIE['grade_id']);

    } else if (!empty($_POST['submit']) && $_POST['submit'] == "确认修改") {

        $class_id3 = $_POST['class_id'];
        $grade_id3 = $_COOKIE['grade_id'];
        $class_addr3 = $_POST['class_addr'];
        $tea_id3 = $_POST['tea_id'];

        $classManage->modifyClassInfo($class_id3, $grade_id3, $class_addr3, $tea_id3);
    }
}

admin();

?>