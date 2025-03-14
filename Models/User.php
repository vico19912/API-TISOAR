<?php
namespace Models;
use DB\DataBase;
use PDO;

class User
{
    protected static $table = 'tbl_user';

    public static function login($mail, $pass){
        $database = new DataBase();
        $conn = $database->getConnection();

        try {
            $query = "SELECT * FROM ". self::$table . " WHERE mail = '".$mail."' AND pass = SHA2('".$pass."',256)";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $userProfile = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $database->closeConnection();

            return $userProfile;
        }catch (\PDOException $e){
            return $e->getMessage();
        }

    }

    public static function createUser($mail, $pass, $idPerfil){
        $database = new DataBase();
        $conn = $database->getConnection();
        $query = "INSERT INTO ".self::$table."(mail, pass, id_perfil, created_at) VALUES('".$mail."',SHA2('".$pass."',256),'".$idPerfil."',NOW())";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $database->closeConnection();

        $user = self::login($mail, $pass);
        if (count($user) > 0) {
            return $response = [ 'response'=> true];
        }else{
            return $response = [ 'response'=> false];
        }
    }

}