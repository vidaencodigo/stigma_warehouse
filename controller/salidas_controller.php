<?php
require_once "model/product.php";

require_once "model/salidas.php";
/**
 * Controlador inicio
 * Author: EMMANUEL LUCIO URBINA
 */
class SalidasController
{
    private $producto;
    public function __construct()
    {
        $this->producto = new Product();
    }
    public function index()
    {
        if (!isset($_SESSION['session'])) :
            $this->login();
        else :
            $this->indexSalidas();
        endif;
    }

    public function login()
    {
        require_once "view/login/login_form.php";
    }

    public function indexSalidas()
    {
        //Solo usuarios logeados
        if (isset($_SESSION['session'])) {
            require_once "view/entries/salidas_form.php";
        } else {
            $this->login();
        }
    }


    public function get_product()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {
            $sku_product = $_REQUEST['producto'];
            $response = new Product();
            $product = $response->get_by_sku($sku_product);
            if ($product) {


                if (isset($_SESSION['session'])) {
                    require_once "view/entries/salidas_form.php";
                } else {
                    $this->login();
                }
            } else {
                $this->indexSalidas();
            }
        }
    }

    public function save_removal()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {
            $id = $_REQUEST['id'];
            $quantity = $_REQUEST['quantity'];
            $ticket = $_REQUEST['ticket'];
            $salida = new Salidas();
            $salida->product_id = $id;
            $salida->ticket = $ticket;
            $salida->quantity = $quantity;
            $salida->create();
            header("Location: index.php?controller=salidas&action=indexSalidas&msg=success");
        }

    }
}
