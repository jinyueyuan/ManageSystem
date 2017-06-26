<?php

/**
 * Created by PhpStorm.
 * User: harrison
 * Date: 15/12/9
 * Time: 19:28
 */
class DutyChart
{

    public function getDutyChart()
    {
        $sql="SELECT job_name,job_seq FROM jobinfor ORDER BY job_seq";
        return $this->select($sql);
    }

    public function save($arr,$len)
    {

        $sql = "delete from jobinfor";
        mysql_query($sql);
            for ($i = 0; $i < $len; $i++) {
                $name=$arr[$i][0];
                $seq=$arr[$i][1];
                $sql = "INSERT INTO jobinfor(job_name,job_seq)VALUES ('$name','$seq')";
                mysql_query($sql);
            }
        return true;
        }

    private function select($sql = "")
    {
        $result = mysql_query($sql);
        if ((!$result) or (empty($result))) {
            @mysql_free_result($result);
            return false;
        }
        $count=0;
        $data=array();
        while($row=mysql_fetch_array($result)){
            $data[$count]=$row;
            $count++;

        }
        @mysql_free_result($result);
        return $data;
    }
}