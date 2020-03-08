<?php
require_once "../../configdb/db_connector.php";
require_once "../../models/author.php";

$data = Author::getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="addAuthor.php" class="btn btn-primary my-5"><i class="far fa-plus-square"></i> Add Author</a>  
        </div>
    </div>
    <div class="row">
        <div class="col">            
            <table class="table table-striped table-sm">
            <thead> 
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php while($author=$data->fetchObject()){ ?>
                <tr>
                    <td><?php echo $author->id; ?> </td>
                    <td><?php echo $author->name; ?> </td>
                    <td> 
                <a href="../../controllers/AuthorController.php?event=delete&&idAuthor=<?php echo $author->id; ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i>   </a>
                <a href="editAuthor.php?id=<?php echo $author->id; ?>&&name=<?php echo $author->name; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>

            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>