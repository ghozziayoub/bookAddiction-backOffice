<?php
require_once "../../configdb/db_connector.php";
$base = connect_to_db();
$id = $_GET['id'];

$name = $_GET['name'];

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<title>AddAuthers</title>
</head>
<body>

<!-- this is my form -->
<div class="container">
    <form method="POST" action="../../controllers/categoryController.php?event=edit&&id=<?php echo $id ?>">
        <div class="form-row  ">
          
            <div class="col my-5">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" value="<?php echo $name ?>"  class="form-control">

            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <input type="submit" value="Edit" class="btn btn-primary">
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


