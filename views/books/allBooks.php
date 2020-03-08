<?php
require_once "../../configdb/db_connector.php";
require_once "../../models/book.php";
$data = Book::getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/books/allbooks.css">
    <title>All Books</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a id="btnadd" href="addBook.php" class="btn btn-primary my-5"><i class="far fa-plus-square"></i> Add book</a>
            </div>
            <div class="col-md-2">
                <button id="btndarkmode" class="btn btn-dark my-5" onclick="myFunction()"><i id="icon" class="fas fa-moon"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="books" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($book = $data->fetchObject()) { ?>
                            <tr>
                                <td><?php echo $book->id; ?></td>
                                <td><img src="../../assets/images/books/<?php echo $book->image; ?>"></td>
                                <td><?php echo $book->name; ?></td>
                                <td><?php echo ($book->price - $book->discount); ?></td>
                                <td><?php echo $book->author; ?></td>
                                <td><?php echo $book->category; ?></td>
                                <td>
                                    <a href="../../controllers/bookController.php?event=delete&&idBook=<?php echo $book->id; ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </a>
                                    <a href="editBook.php?id=<?php echo $book->id; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
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
    <script src="../../assets/js/books/allbooks.js"></script>
</body>

</html>