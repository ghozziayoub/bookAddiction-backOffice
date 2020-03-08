<?php
class Category{

    public $id;
    public $name;

    
    public static function getAll(){

        $base = connect_to_db();
        $requette = "SELECT * From categories ;";
        $data = $base->query($requette);

        return $data;
    }

    public function insert(){
        $base = connect_to_db();

        $requette = "INSERT INTO categories VALUES(null,'$this->name');";
        $rowInserted = $base->exec($requette);
        if ($rowInserted == 1) {
            header('location:../views/categories/allCategories.php');
        }else {
            echo "SQL Error !";
        }
    }

    public function edit(){
        $base = connect_to_db();

        $requette = "update categories set name ='$this->name' where id=$this->id";
        $rowUpdated = $base->exec($requette);
        if ($rowUpdated == 1) {
            header('location:../views/categories/allCategories.php');
        }else {
            echo "SQL Error !";
        }
    }

    public function delete(){
        $base = connect_to_db();

        $requette = "delete from  categories where id=$this->id;";
        $rowDeleted = $base->exec($requette);
        if ($rowDeleted == 1) {
            header('location:../views/categories/allCategories.php');
        }else {
            echo "SQL Error !";
        }
    }
}
?>