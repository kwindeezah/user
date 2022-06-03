<?php
session_start();
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
if(isset($_SESSION['name'])){
    session_destroy();
    header('Location: ../forms/login.html');
} else {
    header('Location: ../index.php');
}

}
logout();