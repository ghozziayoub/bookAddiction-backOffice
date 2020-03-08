<?php
require_once "../configdb/db_connector.php";
require_once "../models/author.php";

$base = connect_to_db();

if (isset($_GET['event']) || !empty($_GET['event'])) {

    $event = $_GET['event'];

    switch ($event) {
        case 'add':
            $author = new Author();
            $author->name = $_POST['name'];
            $author->insert();

            break;

        case 'delete':
            $author = new Author();
            $author->id = $_GET['idAuthor'];
            $author->delete();
            break;

        case 'edit':
            $author = new Author();

            $author->id = $_GET['id'];
            $author->name = $_POST['name'];
            $author->edit();
            break;
        default:
            echo "<h1 style='color:red'>Invalid Action !</h1>";
            break;
    }
} else {
    echo "<h1 style='color:red'>You Are not allowed !</h1>";
}
