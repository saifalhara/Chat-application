<?php
session_start() ; 
include_once "confing.php"; 
$email = mysqli_real_escape_string($conn , $_POST['email']) ;
$password = mysqli_real_escape_string($conn , $_POST['password']) ;

if(!empty($email) && !empty($password)){
    $sql = mysqli_query($conn , "select * from user where email = '{$email}' and password = '{$password}'") ; 
    if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql) ;
    $status = "Active now" ;
    $sql2 = mysqli_query($conn , "UPDATE user set status ='{$status}' where unique_id = {$row['unique_id']}") ; 
    if($sql2){
        $_SESSION['unique_id'] = $row['unique_id'] ; 
        echo "success" ; 
    }
    }else {
        echo "Email or password is incorrect"; 
    } 
}else {
    echo "All input fields are required" ;
}

?>