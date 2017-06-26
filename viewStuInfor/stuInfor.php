<?php
/**
 * Created by PhpStorm.
 * User: NewHT
 * Date: 2015/12/22
 * Time: 0:02
 */

require_once '../DB/connDB.php';

class stuInfor
{
    private $stu_id;
    private $stu_name;
    private $photo;
    private $sex;
    private $nation;
    private $birth_year;
    private $birth_month;
    private $birth_day;
    private $id_card;
    private $politics;
    private $area;
    private $family_addr;
    private $telephone;
    private $enter_year;
    private $experience;
    private $character;
    private $achieve;
    private $punish;
    private $getStuID;
    private $catalogResult;
    private $row;

    public function stuInfor($getStuID)
    {
        $this->getStuID = $getStuID;
    }

    public function sqlQuery()
    {

        $checkCatalog_sql = "select * from student,introduction WHERE student.stu_id=$this->getStuID AND introduction.stu_id=$this->getStuID";
        $this->catalogResult = mysql_query($checkCatalog_sql);
        return $this->catalogResult;
    }


    public function getRow()
    {

        $this->row = @mysql_num_rows($this->catalogResult);
        return $this->row;
    }

    public function showStuInfor()
    {


        $array = mysql_fetch_array($this->catalogResult, MYSQL_ASSOC);

        $this->stu_id = $array['stu_id'];
        $this->stu_name = $array['stu_name'];
        $this->photo = $array['photo'];
        $this->sex = $array['sex'];
        $this->nation = $array['nation'];
        $this->birth_year = $array['birth_year'];
        $this->birth_month = $array['birth_month'];
        $this->birth_day = $array['birth_day'];
        $this->id_card = $array['id_card'];
        $this->politics = $array['politics'];
        $this->area = $array['area'];
        $this->family_addr = $array['family_addr'];
        $this->telephone = $array['telephone'];
        $this->enter_year = $array['enter_year'];
        $this->experience = $array['experience'];
        $this->character = $array['characteristic'];
        $this->achieve = $array['achieve'];
        $this->punish = $array['punish'];

    }

    public function __get($name)
    {
        return $this->$name;
    }
}