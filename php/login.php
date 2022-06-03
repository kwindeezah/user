<?php

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];//finish this line
    $password = $_POST['password'];//finish this
// echo "good";
// die();
loginUser($email, $password);

}

function loginUser($email, $password){
    /*
     Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $file = file_get_contents('../storage/users.csv');
    // var_dump($file);
    // die();
    if(strstr($file, ",{$email},{$password}"))
    {
        $_SESSION['name'] = $email;
        header("Location: ../dashboard.php");
    }
    else
    {
        echo "Invalid login details!";
    }

}

