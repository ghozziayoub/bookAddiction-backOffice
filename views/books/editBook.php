<?php
require_once "../../configdb/db_connector.php";
require_once "../../models/category.php";
require_once "../../models/author.php";
require_once "../../models/book.php";

$categoriesData = Category::getAll();
$authorsData = Author::getAll();
$bookData = Book::getOne($_GET['id']);
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
    <title>Edit Book</title>
</head>

<body>

    <div class="container">
        <form method="POST" action="../../controllers/bookController.php?event=edit&&image=<?php echo $bookData->image;?>&&id=<?php echo $bookData->id;?>" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" value="<?php echo $bookData->name ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" class="form-control"><?php echo $bookData->description ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="resume">Resume :</label>
                        <textarea name="resume" id="resume" class="form-control"><?php echo $bookData->resume ?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" name="price" id="price" value="<?php echo $bookData->price ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="discount">Discount :</label>
                        <input type="text" name="discount" id="discount" value="<?php echo $bookData->discount ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="release_date">Release date :</label>
                        <input type="date" name="release_date" id="release_date" value="<?php echo $bookData->release_date ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="image">Cover :</label><br>
                        <img src="../../assets/images/books/<?php echo $bookData->image ?>" alt="">
                        <input type="file" name="image" id="image" class="form-control-file" accept="image/x-png,image/jpeg">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="idauthor">Author :</label>
                        <select name="idauthor" id="idauthor" class="form-control">
                            <?php while ($author = $authorsData->fetchObject()) {
                                if ($author->name == $bookData->author) {
                            ?>
                                    <option value="<?php echo $author->id; ?>" selected><?php echo $author->name; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="idcategory">Category :</label>
                        <select name="idcategory" id="idcategory" class="form-control">
                        <?php while ($category = $categoriesData->fetchObject()) {
                                if ($category->name == $bookData->category) {
                            ?>
                                    <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" value="edit Book" class="btn btn-warning">
                    </div>
                </div>
            </div>


        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>