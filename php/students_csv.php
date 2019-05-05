<?php
session_start();
include "database_credentials.php";

include "database_methods.php";

$csv="ID,Name,Age,Class,Teacher \n";

$conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
$sql="select id,name,age,class from students where teacher_id=(select id from users where username='".$_SESSION["username"]."')";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $teacher=get_single_attribute("select name from teachers where id = (select id from users where username='".$_SESSION["username"]."')","name");
        $csv.=$row["id"].','.$row["name"].','.$row["age"].','.$row["class"].','.$teacher."\n";
    }
    //echo $csv;
    header('Content-Description: File Transfer');
        //header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="students.csv"');
        echo $csv;
}

?>