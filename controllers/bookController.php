<?php
require_once "../configdb/db_connector.php";
require_once "../models/book.php";

if (isset($_GET['event']) || !empty($_GET['event'])) {

    $event = $_GET['event'];

    switch ($event) {
        case 'add':

            $book = new Book();

            $book->name    = $_POST['name'];
            $book->description = $_POST['description'];
            $book->resume    = $_POST['resume'];
            $book->price    = $_POST['price'];
            $book->discount    = $_POST['discount'];
            $book->release_date    = $_POST['release_date'];
            $book->idauthor    = $_POST['idauthor'];
            $book->idcategory    = $_POST['idcategory'];
            //image
            $image    = $_FILES['image'];
            $ext = substr($image['name'], strpos($image['name'], "."));
            $image_name = generateRandomString() . $ext;
            move_uploaded_file($image['tmp_name'], '../assets/images/books/' . $image_name);

            $book->image = $image_name;
            $book->insert();

            break;

        case 'delete':

            $book = new Book();

            $book->id = $_GET['idBook'];

            $book->delete();

            break;

        case 'edit':            
            $imageName = $_GET['image'];
            unlink('../assets/images/books/'.$imageName);

            $book = new Book();
            $book->id = $_GET['id'];    
            $book->name    = $_POST['name'];
            $book->description = $_POST['description'];
            $book->resume    = $_POST['resume'];
            $book->price    = $_POST['price'];
            $book->discount    = $_POST['discount'];
            $book->release_date    = $_POST['release_date'];
            $book->idauthor    = $_POST['idauthor'];
            $book->idcategory    = $_POST['idcategory'];
            //image
            $image    = $_FILES['image'];
            $ext = substr($image['name'], strpos($image['name'], "."));
            $image_name = generateRandomString() . $ext;
            move_uploaded_file($image['tmp_name'], '../assets/images/books/' . $image_name);

            $book->image = $image_name;
            $book->edit();
            break;
        default:
            echo "<h1 style='color:red'>Invalid Action !</h1>";
            break;
    }
} else {
    echo "<h1 style='color:red'>You Are not allowed !</h1>";
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
