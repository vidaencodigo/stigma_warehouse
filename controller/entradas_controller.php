<?php
require_once "model/product.php";

require_once "model/entradas.php";
/**
 * Controlador inicio
 * Author: EMMANUEL LUCIO URBINA
 */
class EntradasController
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
            $this->indexEntradas();
        endif;
    }

    public function login()
    {
        require_once "view/login/login_form.php";
    }

    public function indexEntradas()
    {
        //Solo usuarios logeados
        if (isset($_SESSION['session'])) {
            require_once "view/entries/entradas_form.php";
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
                    require_once "view/entries/entradas_form.php";
                } else {
                    $this->login();
                }
            } else {
                $this->indexEntradas();
            }
        }
    }

    public function save_entrie()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {
            $id = $_REQUEST['id'];
            $quantity = $_REQUEST['quantity'];
            $ticket = $_REQUEST['ticket'];
            $entrada = new  Entradas();
            $entrada->product_id = $id;
            $entrada->ticket = $ticket;
            $entrada->quantity = $quantity;
            $entrada->create();
            header("Location: index.php?controller=entradas&action=indexEntradas&msg=success");
        }

    }
}
