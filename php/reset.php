<?php

// error_reporting(E_ALL);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];
    resetPassword($email, $newpassword);
}
// }echo "Yay!";
//     die();


function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    //if it does, replace the password

$file= file_get_contents('../storage/users.csv');
if(strstr($file, ",{$email},")){
    $sh= fopen('../storage/reset.csv', "w");
    foreach(explode("\n",$file) as $fh){
        $lh = explode(",", $fh);
        if(count($lh) == 3){
            if($lh[1] == $email){
                fwrite($sh, "{$lh[0]},{$email},{$newpassword}\n");
            } else {
                fwrite($sh, "{$lh[0]},{$lh[1]},{$lh[2]}\n");
            }
        }
    }
    fclose($sh);
    rename('../storage/reset.csv', '../storage/users.csv');
      header("Location: ../forms/login.html");
    }else{
        echo "Password reset failed!";
    }
}
?>