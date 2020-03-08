<?php

class Book
{

    public $id;
    public $name;
    public $description;
    public $resume;
    public $price;
    public $discount;
    public $release_date;
    public $idauthor;
    public $idcategory;
    public $image;

    static function getAll()
    {
        $base = connect_to_db();

        $requette = "SELECT 
        b.id,
        b.name,
        b.description,
        b.resume,
        b.price,
        b.discount,
        b.release_date,
        a.name as author,
        c.name as category,
        b.image 
        from books as b , authors as a , categories as c
        where b.idauthor = a.id and b.idcategory = c.id";

        $data = $base->query($requette);

        return $data;
    }

    static function getOne($id)
    {
        $base = connect_to_db();

        $requette = "SELECT 
        b.id,
        b.name,
        b.description,
        b.resume,
        b.price,
        b.discount,
        b.release_date,
        a.name as author,
        c.name as category,
        b.image 
        from books as b , authors as a , categories as c
        where b.idauthor = a.id and b.idcategory = c.id and b.id=$id";

        $data = $base->query($requette);

        return $data->fetchObject();
    }

    function insert()
    {
        $base = connect_to_db();

        $requette = "INSERT INTO books VALUES (null,'$this->name','$this->description','$this->resume',$this->price,$this->discount,'$this->release_date',$this->idauthor,$this->idcategory,'$this->image');";

        $rowInserted = $base->exec($requette);

        if ($rowInserted == 1) {
            header('location:../views/books/allBooks.php');
        } else {
            echo "SQL Error !";
        }
    }

    function delete()
    {
        $base = connect_to_db();

        $requette = "delete from  books where id=$this->id;";

        $rowDeleted = $base->exec($requette);

        if ($rowDeleted == 1) {
            header('location:../views/books/allBooks.php');
        } else {
            echo "SQL Error !";
        }
    }

    function edit(){
        $base = connect_to_db();

        $requette = "update books set 
        name='$this->name',
        description='$this->description',
        resume='$this->resume',
        price=$this->price,
        discount=$this->discount,
        release_date='$this->release_date',
        idauthor=$this->idauthor,
        idcategory=$this->idcategory,
        image='$this->image' 
        where id=$this->id";


        $rowUpdated = $base->exec($requette) or die(print_r($base->errorInfo(), true));;
        if ($rowUpdated == 1) {
            header('location:../views/books/allBooks.php');
        }else {
            echo "SQL Error !";
        }
    }
}
