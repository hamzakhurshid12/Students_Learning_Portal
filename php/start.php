<?php
include "database_credentials.php";

$db=mysqli_connect($servername, $username, $password);
$db_check="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$result = mysqli_query($db, $db_check);

if(mysqli_num_rows($result)==0){
    echo "No database Found<br>";
    createDatabase($servername, $username, $password);
    createTables($servername, $username, $password,$database);
}else{
    echo "Database found\n";
}


check_login($servername, $username, $password,$database);

function check_login($servername, $username, $password,$database){
if (isset($_POST["username"])){
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
die("Connection failed:".mysqli_connect_error());
}

$sql='select password from users where username="'.$_POST["username"].'"';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        if($row["password"]===$_POST["password"]){
            session_start();
            $_SESSION["username"]=$_POST["username"];
            header("location: ../home.php");
        }
        else{
            header("location: ../index.php?type=invalid_password");
        }
    }
}else{
    header("location: ../index.php?type=invalid_username");
}
}
else{
    echo "Invalid query";
}

}


function query($query, $conn){
    $result = mysqli_query($conn, $query);
    if($result){
        return true;
    }
    else{
            echo "Error:" . $query . "<br>" . mysqli_error($conn)."<br>";
            return false;
    }
}

function createDatabase($servername, $username, $password){
    $db=mysqli_connect($servername, $username, $password);
    if(!$db){
		die("Connection Error: ".mysqli_connect_error());
	}
    $query="create database sl_portal";
    if(query($query,$db)){
        echo "Database Created! <br>";
    }
}

function createTables($servername, $username, $password, $database){
    $db=mysqli_connect($servername, $username, $password, $database);
    if(!$db){
		die("Connection Error: ".mysqli_connect_error());
    }
    $query='CREATE TABLE USERS(
        username varchar(255) PRIMARY KEY,
        password varchar(255) NOT NULL,
        type varchar(255) NOT NULL,
        id INT not null
    );';
    if(query($query,$db)){
        echo "TABLE Users Created! <br>";
    }

    $query='CREATE TABLE  teachers (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) not null,
        school varchar(255) not null,
        qualification varchar(255) 
        );';

    if(query($query,$db)){
        echo "TABLE Teachers Created! <br>";
    }

    $query='CREATE TABLE students (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) not null,
        age varchar(255) not null,
        class varchar(255) not null,
        teacher_id varchar(255) not null
        );';

    if(query($query,$db)){
        echo "TABLE students Created! <br>";
    }

    $query='CREATE TABLE activities (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        student_id varchar(255) not null,
        date varchar(255) not null,
        pre_image varchar(255),
        post_image varchar(255)
        );';

    if(query($query,$db)){
        echo "TABLE activities Created! <br>";
    }
    //entering data into table
    $query='INSERT INTO TEACHERS VALUES(1,"Miss Shamsa","IMCJ(I-V) G-120/2","Masters in Computer Science")';
    if(query($query,$db)){
        echo "Teacher added into database! <br>";
    }
    $query='INSERT INTO USERS VALUES("shamsa","asd","teacher",1)';
    if(query($query,$db)){
        echo "Teacher Users added into database! <br>";
    }
}
?>