<?php

namespace Controllers;
use Models\Product;

class ProductController
{
    public static function getAllFood() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $arrFood = Product::getAllFood();
            echo json_encode($arrFood);
        }
    }

    public static function createFood()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $name = $data['name'];
            $price  = $data['price'];
            $category = $data['category'];
            $image = $data['image'];
            $description = $data['description'];
            $comida = Product::createComida($name, $image, $description, $price, $category);
            echo json_encode($comida);
            //Falta que busque el registro para validar si lo ingreso a la bd
        }
    }

    public static function editFood(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $id = $data['id'];
            $name = $data['name'];
            $price  = $data['price'];
            $category = $data['category'];
            $image = $data['image'];
            $description = $data['description'];
            $comida = Product::editFood($id,$name, $image, $description, $price, $category);
            echo json_encode($comida);
            //Falta que busque el registro para validar si lo ingreso a la bd
        }
    }

    public static function deleteFood(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $id = $data['id'];
            $comida = Product::deleteProduct($id);
            echo json_encode($comida);
        }
    }

    public static function getProductById()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $id = $data['id'];
            $comida = Product::getProductById($id);
            echo json_encode($comida);
        }
    }

    public static function createDrink()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }

            $name = $data['name'];
            $price  = $data['price'];
            $drink = Product::createDrink($name, $price);
            echo json_encode($drink);
        }
    }

    public static function editDrink(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }
            $id = $data['id'];
            $name = $data['name'];
            $price  = $data['price'];
            $drink = Product::editDrink($id,$name, $price);
            echo json_encode($drink);
        }
    }
    public static function deleteDrink(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }
            $id = $data['id'];
            $comida = Product::deleteProduct($id);
            echo json_encode($comida);
        }
    }
}
