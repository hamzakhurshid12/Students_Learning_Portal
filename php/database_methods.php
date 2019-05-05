<?php
include "database_credentials.php";

function get_single_attribute($query,$attribute){
    $conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
    if(!$conn){
    die("Connection failed:".mysqli_connect_error());
    }
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            return $row[$attribute];
        }
    }
    return false;

}



function query($query){
    $conn=mysqli_connect($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["database"]);
    $result = mysqli_query($conn, $query);
    if($result){
        return true;
    }
    else{
        echo "Error:" . $query . "<br>" . mysqli_error($conn)."<br>";
        return false;
    }
}
?>