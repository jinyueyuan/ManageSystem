<?php
/**
 * Created by PhpStorm.
 * User: m.cb
 * Date: 15/11/26
 * Time: 17:17
 */

require_once '../DB/connDB.php';

class teacherCatalog
{
    private $tea_id;
    private $tea_name;
    private $sex;
    private $phone;
    private $email;
    private $catalogResult;
    private $row;
    private $total;      //总记录
    private $pagesize;    //每页显示多少条
    private $page;           //当前页码
    private $pagenum;      //总页码
    private $url;           //地址
    private $bothnum;      //两边保持数字分页的量
    private $limit;          //limit

    //构造方法初始化
    public function __construct($_pagesize) {
        $this->total = $this->getTotal();
        $this->pagesize = $_pagesize;
        $this->pagenum = ceil($this->total / $this->pagesize);
        $this->page = $this->setPage();
        $this->limit = ($this->page-1) * $this->pagesize.",$this->pagesize";
        $this->url = $this->setUrl();
        $this->bothnum = 0;
    }

    public function sqlQuery(){
        if(!empty($_POST['search']) && $_POST['search']=="搜索"){
            $key = $_POST['key'];
            $keySql = "SELECT * FROM teacher WHERE tea_id LIKE '%$key%' OR tea_name LIKE '%$key%' OR sex LIKE '%$key%'OR id_card LIKE '%$key%'OR nation LIKE '%$key%'OR
politics LIKE '%$key%'OR education LIKE '%$key%'OR profession LIKE '%$key%'OR telephone LIKE '%$key%'OR email LIKE '%$key%' limit $this->limit";
            $this->catalogResult = mysql_query($keySql);
        }else{
            $catalogSql = "SELECT * FROM teacher limit $this->limit";
            $this->catalogResult = mysql_query($catalogSql);
        }
        return $this->catalogResult;
    }

    private function getTotal(){
        if(!empty($_POST['search']) && $_POST['search']=="搜索"){
            $key = $_POST['key'];
            $keySql = "SELECT * FROM teacher WHERE tea_id LIKE '%$key%' OR tea_name LIKE '%$key%' OR sex LIKE '%$key%'OR id_card LIKE '%$key%'OR nation LIKE '%$key%'OR
politics LIKE '%$key%'OR education LIKE '%$key%'OR profession LIKE '%$key%'OR telephone LIKE '%$key%'OR email LIKE '%$key%'";
            $catalogResult = mysql_query($keySql);
        }else{
            $catalogSql = "SELECT * FROM teacher";
            $catalogResult = mysql_query($catalogSql);
        }
        if($catalogResult){
            $total = mysql_num_rows($catalogResult);
        }else{
            $total= 0;
        }
        return $total;
    }

    public function getRow(){
        $this->row = @mysql_num_rows($this->catalogResult);
        return $this->row;
    }

    public function showTeacherList()
    {
        $array = mysql_fetch_array($this->catalogResult, MYSQL_ASSOC);
        $this->tea_id = $array['tea_id'];
        $this->tea_name = $array['tea_name'];
        $this->sex = $array['sex'];
        $this->phone = $array['telephone'];
        $this->email = $array['email'];
    }

    public function __get($name)
    {
        return $this->$name;
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
            parse_str($_par['query'],$_query);
            unset($_query['page']);
            $_url = $_par['path'].http_build_query($_query);
        }
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
            return '<li><a href="'.$this->url . '?page=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>';
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
