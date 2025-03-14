<?php

namespace Models;
use DB\Database;
use PDO;

class Product {
    private static $table = 'tbl_producto';

    public static function createComida($name, $image, $description, $price, $idCategory) {
        $database = new Database();
        $conn = $database->getConnection();

        try{
            $query = "INSERT INTO ".self::$table." (product, image, description, price, id_category) 
                  VALUES (:name, :image, :description, :price, :category)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
            $stmt->bindValue(':image', $image, \PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, \PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, \PDO::PARAM_STR);
            $stmt->bindValue(':category', $idCategory, \PDO::PARAM_INT);

            $database->closeConnection();
            $stmt->execute();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function getAllFood(){
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT * FROM ".self::$table." WHERE id_category != 4";

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $allFood = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $database->closeConnection();

            return $allFood;
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function editFood($id, $name, $image, $description, $price, $idCategory)
    {
        $database = new Database();
        $conn = $database->getConnection();
        try {
            $query = "UPDATE ".self::$table." SET product = :name, image = :image, description = :description, price = :price, id_category = :id_category WHERE id_poducto = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
            $stmt->bindValue(':image', $image, \PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, \PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, \PDO::PARAM_STR);
            $stmt->bindValue(':id_category', $idCategory, \PDO::PARAM_INT);

            $stmt->execute();

            $database->closeConnection();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function deleteProduct($id){
        $database = new Database();
        $conn = $database->getConnection();
        try {
            $query = "DELETE FROM ".self::$table." WHERE id_poducto = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $database->closeConnection();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function getProductById($id){
        $database = new Database();
        $conn = $database->getConnection();
        try {
            $query = "SELECT * FROM ".self::$table." WHERE id_poducto = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $food = $stmt->fetch(PDO::FETCH_ASSOC);
            $database->closeConnection();
            return $food;
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function createDrink($name, $price){
        $database = new Database();
        $conn = $database->getConnection();

        try{
            $query = "INSERT INTO ".self::$table." (product, image, description, price, id_category) 
                  VALUES (:name, :image, :description, :price, :category)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
            $stmt->bindValue(':image', '', \PDO::PARAM_STR);
            $stmt->bindValue(':description', '', \PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, \PDO::PARAM_STR);
            $stmt->bindValue(':category', 4, \PDO::PARAM_INT);

            $database->closeConnection();
            $stmt->execute();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function editDrink($id, $name, $price){
        $database = new Database();
        $conn = $database->getConnection();
        try {
            $query = "UPDATE ".self::$table." SET product = :name, image = :image, description = :description, price = :price WHERE id_poducto = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
            $stmt->bindValue(':image', '', \PDO::PARAM_STR);
            $stmt->bindValue(':description', '', \PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, \PDO::PARAM_STR);

            $stmt->execute();

            $database->closeConnection();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

}
