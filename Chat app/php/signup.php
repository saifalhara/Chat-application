<?php
session_start() ; 
include_once "confing.php"; 
//$fname = $_POST['fname'] ; 
$fname = mysqli_real_escape_string($conn , $_POST['fname']) ;
$lname = mysqli_real_escape_string($conn , $_POST['lname']) ;
$email = mysqli_real_escape_string($conn , $_POST['email']) ;
$password = mysqli_real_escape_string($conn , $_POST['password']) ;


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email , FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn , "select email from user where email= '{$email}'") ; 
        if(mysqli_num_rows($sql) > 0){
        echo "$email -this email already exist";
        }else {
            if(isset($_FILES["image"])){
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'] ;

                    $img_explode = explode('.' , $img_name) ; 
                    $img_ext = end($img_explode) ;

                    $extention = ['png' , 'jpeg' , 'jpg'] ; 
                    if(in_array($img_ext , $extention) == true) {
                        $time = time() ; 
                        $new_img_name = $time.$img_name ; 
                        if(move_uploaded_file($tmp_name , "images/".$new_img_name)){
                                $status = "Active now" ; 
                                $random_id = rand(time() , 10000000);

                                $sql2 = mysqli_query($conn , "insert into user (unique_id , fname , lname , email ,password , img , status ) 
                                        values ({$random_id} , '{$fname}' , '{$lname}' ,'{$email}' , '{$password}' , '{$new_img_name}', '{$status}')");
                                        if($sql2){
                                            $sql3 = mysqli_query($conn , "select * from user where email = '{$email}' ") ;
                                            if(mysqli_num_rows($sql3) > 0 ){
                                                $row = mysqli_fetch_assoc($sql3);
                                                $_SESSION['unique_id'] = $row['unique_id'] ; 
                                                echo "success" ; 
                                            }
                                        }else {
                                            echo "Something went worng!";
                                    }
                        }
                    }else {
                        echo "Please select an image file - jpa , png , jpg" ; 
                    }
            }else {
                echo "Please select an Image file!" ;
            }
        }

    }else {
        echo "$email - this is not a valid email!";
    }}else {
    echo "All input field are required" ;
    }

?>