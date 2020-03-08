<?php
session_start();

require_once "../models/user.php";

if (isset($_GET['event']) && !empty($_GET['event'])) {
    $event = $_GET['event'];

    if ($event == 'register') {
        # code Register
        $user = new User();

        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->email = $_POST['email'];
        $user->password = md5($_POST['password']);

        $user->insert();
    }
    else if ($event == 'login') {
        $user = new User();

        $user->email = $_POST['email'];
        $user->password = md5($_POST['password']);

        $user->login();
        
    }
    else if ($event=='logout') {
        
        session_unset();

        session_destroy();

        header('location:../views/admins/login.php?error=false');
    }
    else{
        echo "You are not allowed !";
    }

}else{
    echo "You are not allowed !";
}
?>