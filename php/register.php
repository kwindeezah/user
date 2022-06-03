<?php
if(isset($_POST['submit'])){

    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $file = file_get_contents('../storage/users.csv');
    $string = ",{$email},";
    if(!strstr($file, $string)){
        $fh= fopen('../storage/users.csv', 'a') or die("cannot open file");
        fwrite($fh, "{$username},{$email},{$password}\n");
        fclose($fh);
        header("Location: ../dashboard.php");  
    }else{
        echo "Details already exists in record.";
    }
}