<?php 
    session_start() ; 
    include_once "confing.php" ; 
    $outgoing_id = $_SESSION['unique_id']; 
    $sql = mysqli_query($conn , "select * from user where not unique_id = {$outgoing_id}") ; 
    $output = "" ; 
    if(mysqli_num_rows($sql) == 0){
        $output .= "No user are available to chat"; 
    }elseif(mysqli_num_rows($sql) > 0){
       include "data.php" ;
    }
    echo $output ; 
?>