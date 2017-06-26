
<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

require_once("../StudentManage/StudentCatalog.php");
require_once("../DB/connDB.php");

$g = $_GET['g'];
$c = $_GET['c'];
$s = $_GET['s'];


$temp=new StudentCatalog($g,$c);
$students=$temp->getStudents();
$length=count($students);

if ($s == 1) {
    if ($length) {
        $index1=1;
        echo "<table class='table table-bordered'>";
        while($index1<=$length){
            if($index1%10 == 1){
                echo "<tr>";
            }
            echo "<td><p>".$students[$index1-1]['stu_name']." </p><p>". $students[$index1-1]['seat_id']."</p></td>";
            if ($index1 % 10 == 0) {
                echo "</tr>";
            }
            $index1 ++;
        }
        echo "</table>";
    } else {
        echo "no data";
    }
}

if ($s == 2) {
    $students2 = array_reverse($students,true);
    if ($length) {
        $index2 = $length;
        echo "<table class='table table-bordered'>";
        if($length%4 != 0) {
            echo "<tr>";
            $re = 4-$length%4;
            for ($i = 0; $i < $re; $i++) {
                echo "<td></td>";
            }
        }
        while ($index2) {
            if ($index2 % 4 == 0) {
                echo "<tr>";
            }
            echo "<td><p>" . $students2[$index2-1]['stu_name'] ."</p><p>". $students2[$index2-1]['seat_id']. "</p></td>";
            if ($index2 % 4 == 1) {
                echo "</tr>";
            }
            $index2 --;
        }
        echo "<tr ><td colspan=4 >讲台</td></tr>";
        echo "</table>";
    } else {
        echo "no data";
    }
}

if($s == 3){
    if($length){
        $index3 = 1;
        echo "<table class='table table-bordered'>";
        echo "<tr ><td colspan=4 >讲台</td></tr>";
        while($index3 <= $length){
            if($index3 % 4 == 1){
                echo "<tr>";
            }
            echo "<td><p>" . $students[$index3-1]['stu_name'] ."</p><p>". $students[$index3-1]['seat_id']. "</p></td>";
            if($index3 % 4 == 0){
                echo "</tr>";
            }
            $index3++;
        }
        if($length%4 != 0){
            $rest=4-$length%4;
            for($i=0;$i<$rest;$i++){
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "no data";
    }
}

?>