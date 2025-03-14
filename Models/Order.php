<?php
namespace Models;
use DB\Database;
use PDO;
class Order {
    private static $table_order = 'tbl_order';
    private static $table_detail = 'tbl_order_detail';

    public static function createOrder($idUser){
        $db = new Database();
        $conn = $db->getConnection();

        try{
            $query = "INSERT INTO ".self::$table_order." (id_orden_status, id_user, created_at, updated_at) 
                  VALUES (1, :idUser, NOW(), NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':idUser', $idUser, \PDO::PARAM_STR);

            $stmt->execute();
            $db->closeConnection();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function getLastOrderIdByUser($idUser){
        $db = new Database();
        $conn = $db->getConnection();
        try {
            $query = "SELECT MAX(id_order) AS id_order FROM ".self::$table_order." WHERE id_user = :idUser";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':idUser', $idUser, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public static function createOrderDetail($idOrder,$arrIdProduct)
    {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            foreach ($arrIdProduct as $Product) {
                $query = "INSERT INTO ".self::$table_detail." (id_order, id_producto, quantity) 
                VALUES (:idOrder, :idProduct, :quantity)";
                $stmt = $conn->prepare($query);
                $stmt->bindValue(':idOrder', $idOrder["id_order"], \PDO::PARAM_STR);
                $stmt->bindValue(':idProduct', $Product['idProduct'], \PDO::PARAM_STR);
                $stmt->bindValue(':quantity', $Product['quantity'], \PDO::PARAM_STR);

                $stmt->execute();
            }
            $db->closeConnection();
            return $response = [ 'response'=> true];
        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }
}
