<?php
include "database_credentials.php";
include "database_methods.php";
session_start();

$name = $_POST["name"];
$age = $_POST["age"];
$class = $_POST["class"];
$teacher=get_single_attribute("select id from users where username='".$_SESSION["username"]."'","id");

$date=$_POST["date"];

$sql='INSERT INTO `students`(`name`, `class`, `age`, `teacher_id`) VALUES ("'.$name.'","'.$class.'","'.$age.'","'.$teacher.'")';

$conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "<script>
    "."Error:" . $query . "<br>" . mysqli_error($conn)."<br>"."
    </script>";
}
$prev_id=mysqli_insert_id($conn);

$file=$_FILES["pre_image"];
$pre_name=$file["name"];
move_uploaded_file($file["tmp_name"],"../uploads/".$name.'_pre_'.$pre_name);
$file=$_FILES["post_image"];
$post_name=$file["name"];
move_uploaded_file($file["tmp_name"],"../uploads/".$name.'_post_'.$post_name);

$sql='INSERT INTO `activities`(`student_id`, `date`, `pre_image`, `post_image`) VALUES ("'.$prev_id.'","'.$date.'","'."uploads/".$name.'_pre_'.$pre_name.'","'."uploads/".$name.'_post_'.$post_name.'")';

if(query($sql)){
    echo "data successfully inserted into both tables!";
    header("location: ../add_students.php");
    echo "<script>
    alert('Student Added Successfully!');
    </script>";
}

print_r($_POST);

?>