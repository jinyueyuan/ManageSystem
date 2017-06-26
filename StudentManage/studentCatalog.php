<?php

require_once '../DB/connDB.php';
/**
 * Created by PhpStorm.
 * User: jinzil
 * Date: 2015/11/21
 * Time: 15:57
 */
class studentCatalog  //学生列表信息
{

    private $class_id;
    private $grade_id;
    public $total;      //总记录
    public $pagesize;    //每页显示多少条
    private $page;           //当前页码
    public $pagenum;      //总页码
    private $url;           //地址
    private $bothnum;      //两边保持数字分页的量

    function studentCatalog($gid,$cid){
        $this->class_id=$cid;
        $this->grade_id=$gid;
        $this->total=$this->getTotal();
        $this->pagesize = 5;
        $this->pagenum = ceil($this->total / $this->pagesize);
        $this->page = $this->setPage();
        $this->url = $this->setUrl();
        $this->bothnum = 0;
    }
//    提取学生列表，返回数组
    public function showStudentList(){
        $sql="SELECT * FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id";
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
        $count=0;
        $data=array();
        while($row=mysql_fetch_array($result)){
            $data[$count]=$row;
//            echo $data[$count]['stu_id'];
//            echo $data[$count]['stu_name'];
            $count++;

        }

        @mysql_free_result($result);
        return $data;
    }
    //姓名排序
    public function nameSort(){
        $sql2 = "SELECT student.stu_id,stu_name,birth_year,birth_month,birth_day,sex,telephone,class_id,grade_id
                 FROM stu_belong_class,student
                 WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id
                 ORDER BY CONVERT( stu_name USING gbk ) COLLATE gbk_chinese_ci ASC";
        return $this->select($sql2);
    }
    public function getStudents()
    {
        $sql="SELECT stu_name,seat_id FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id ORDER BY seat_id";
        return $this->select($sql);
    }
    public function getStudentsWithPhoto()
    {
        $sql="SELECT seat_id,photo,stu_name FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND  stu_belong_class.stu_id=student.stu_id ORDER BY seat_id";
        return $this->select($sql);
    }

    public function retpagesize(){
        return $this->pagesize;
    }

    public function sqlQuery(){
        if (!empty($_POST['search']) && $_POST['search'] == "搜索") {
            $key=$_POST['key'];
            $sql = "SELECT * FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id AND(student.stu_id LIKE  '%$key%' OR student.stu_name LIKE '%$key%')";
            if (mysql_query($sql)){
                return $this->select($sql);}
            else{
                return false;}
        }
    }

    private function getTotal(){
        if(!empty($_POST['search']) && $_POST['search']=="搜索") {
            $key = $_POST['key'];
            $catalogSql = "SELECT * FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id AND(student.stu_id LIKE  '%$key%' OR student.stu_name LIKE '%$key%')";
        }
        else
            $catalogSql = "SELECT * FROM stu_belong_class,student WHERE class_id=$this->class_id AND grade_id=$this->grade_id AND stu_belong_class.stu_id=student.stu_id";
        $catalogResult = mysql_query($catalogSql);
        if($catalogResult){
            $total = mysql_num_rows($catalogResult);
        }else{
            $total= 0;
        }
        return $total;
    }


    public function getRow(){
        return $this->total;
    }



    //获取当前页码
    private function setPage() {
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if ($page > 0) {
                if ($page > $this->pagenum) {
                    return $this->pagenum;
                } else {
                    return $page;
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    //获取地址
    private function setUrl() {
        $_url = $_SERVER["REQUEST_URI"];
        $_par = parse_url($_url);
        if (isset($_par['query'])) {
            parse_str($_par['query'],$equery);
            unset($equery['page']);
            $_url = $_par['path'];
//            .http_build_query($equery)
        }
//        $_url = $_par['path'];
        return $_url;
    }

    private function pageList() {
        $_pagelist ='';
        for ($i=$this->bothnum;$i>=1;$i--) {
            $_page = $this->page-$i;
            if ($_page < 1) continue;
            $_pagelist .= '<li><a href="'.$this->url.'?page='.$_page.'">'.$_page.'</a></li>';
        }
        $_pagelist .= ' <li><span>'.$this->page.'</span></li> ';
        for ($i=1;$i<=$this->bothnum;$i++) {
            $_page = $this->page+$i;
            if ($_page > $this->pagenum) break;
            $_pagelist .= '<li><a href="'.$this->url.'?page='.$_page.'">'.$_page.'</a></li>';
        }
        return $_pagelist;
    }

    //首页
    private function first() {
        if ($this->page > 1) {
            return '<li><a href="'.$this->url .'?page=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>';
        }else{
            return '<li><a><span aria-hidden="true" class="glyphicon glyphicon-step-backward"></span></a></li>';
        }
    }

    //上一页
    private function prev(){
        if ($this->page > 1) {
            return '<li><a href="'.$this->url .'?page='.($this->page-1).'"><span class="glyphicon glyphicon-chevron-left"></span></a></li> ';
        } else {
            return '<li><a><span class="glyphicon glyphicon-chevron-left"></span></a></li> ';
        }

    }

    //下一页
    private function next() {
        if ($this->page < $this->pagenum) {
            return '<li><a href="'.$this->url.'?page='.($this->page+1).'"><span class="glyphicon glyphicon-chevron-right"></span></a></li> ';
        }else{
            return '<li><a><span class="glyphicon glyphicon-chevron-right"></span></a></li> ';
        }
    }

    //尾页
    private function last() {
        if ( $this->page < $this->pagenum) {
            return ' <li><a href="'.$this->url.'?page='.$this->pagenum.'"><span class="glyphicon glyphicon-step-forward"></span></a></li>';
        }else{
            return ' <li><a><span class="glyphicon glyphicon-step-forward"></span></a></li>';
        }
    }

    public function pageHref(){
        if(!empty($_POST['go'])&&$_POST['go']=='go'){
            $page=$_POST['page'];
            if($page > $this->pagenum || $page<1){
                echo "<script>alert('超过页数限制');</script>";
            }
            else
                echo "<script>document.location='$this->url?page=$page';</script>";
        }
    }

    //分页信息
    public function showpage() {
        $_page = "";
        $_page .= $this->first();
        $_page .= $this->prev();
        $_page .= $this->pageList();
        $_page .= $this->next();
        $_page .= $this->last();
        return $_page;
    }
}
//$object=new studentCatalog();
//$catalog=$object->showStudentList(1);