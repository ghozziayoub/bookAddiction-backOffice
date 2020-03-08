<?php
require_once "../configdb/db_connector.php";
require_once "../models/category.php";

$base = connect_to_db();

if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    switch ($event) {
        case 'add':
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $category = new Category();
                $category->name = $_POST['name'];
                $category->insert();
            }else {
                header('location:../views/categories/addCategory.php?error=true');
            }
            break;
       
            case 'delete':
                $category = new Category();
                $category->id = $_GET['idCategory'];
                $category->delete();
            break;
            case 'edit':
                $category = new Category();

                $category->id = $_GET['id'];
                $category->name = $_POST['name'];
                $category->edit();
                
            break;
        default:
            echo "<h1 style='color:red'>Invalid Action !</h1>";
        break;
       
        }
}else {
    echo "<h1 style='color:red'>You Are not allowed !</h1>";
}
?>
