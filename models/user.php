<?php
require_once "../configdb/db_connector.php";

class User{

    public $firstname;
    public $lastname;
    public $email;
    public $password;

    function insert(){
        $base = connect_to_db();
        $requette = "INSERT INTO users values (null,'$this->firstname','$this->lastname','$this->email','admin','$this->password')";

        $rowInserted = $base->exec($requette);

        if ($rowInserted == 1) {
            header('location:../views/home.php');
        } else {
            echo "SQL Error";
        }
        
    }

    function login(){
        $base = connect_to_db();
        $requette = "SELECT * from users where email ='$this->email' and password='$this->password'";

        $data = $base->query($requette);

        if ($data->rowCount() == 1) {
            session_start();
            $user = $data->fetchObject();
            $_SESSION['email'] = $user->email ;
            header('location:../views/admins/dashboard.php');
        }else{
            header('location:../views/admins/login.php?error=true');
        }

    }
}
