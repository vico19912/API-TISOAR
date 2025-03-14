<?php
namespace Controllers;
use Models\User;

class LoginController
{
    public static function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $mail =  $data['mail'];
            $pass = $data['pass'];
            $userProfile = User::login($mail,$pass);

            echo json_encode($userProfile);
        }

    }

    public static function createUser(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }
            $mail =  $data['mail'];
            $pass = $data['pass'];
            $profile = $data['profile'];
            $userProfile = User::createUser($mail,$pass,$profile);

            echo json_encode($userProfile);
        }
    }
}
