<?php 
session_start() ; 
$outgoing_id = $_SESSION['unique_id'] ; 
include_once "confing.php" ; 
$searchTerm = mysqli_real_escape_string($conn , $_POST['searchTerm']) ; 
$output = "" ; 
$sql =  mysqli_query($conn , "SELECT * from user where not unique_id = {$outgoing_id} and (fname like '%{$searchTerm}%'  or lname like '%{$searchTerm}%') ") ; 
if(mysqli_num_rows($sql) > 0 ){
    include "data.php" ; 
}else{
$output .= "No user found related to your search term" ; 

}
echo $output ; 

?> 