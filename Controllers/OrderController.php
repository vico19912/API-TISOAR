<?php
namespace Controllers;
use Models\Order;


class OrderController
{
    public static function createOrder(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);
            if (!$data) {
                echo json_encode(['response' => false, 'message' => 'Error al decodificar JSON']);
                return;
            }
            $idUser = $data['idUser'];
            $arrProducts = $data['products'];
            $order = Order::createOrder($idUser);
            if($order['response']){
                $idOrder = Order::getLastOrderIdByUser($idUser);
                if($idOrder > 0){
                    $orderDetail = Order::createOrderDetail($idOrder, $arrProducts);
                    if($orderDetail['response']){
                        echo json_encode($idOrder);
                        //Aqui falta generar el codigo QR
                    }
                }else{
                    echo json_encode($idOrder);
                }
            }else{
                echo json_encode($order);
            }
        }
    }
}

