<?php

/**
 * Controlador producto
 * Author: EMMANUEL LUCIO URBINA
 */

require_once "model/product.php";

class ProductController
{

    private $producto;
    public function __construct()
    {
        $this->producto = new Product();
    }
    public function index()
    {

        $this->listAllProducts();
    }

    public function edit_product()
    {
        if (isset($_REQUEST['id'])) {
            $product = $this->producto->get_by_id($_REQUEST['id']);
            require_once "view/product/product_edit.php";
        } else {
            $this->listAllProducts();
        }
    }

    public function listAllProducts()
    {
        if (isset($_SESSION['session'])) {
            $products = $this->producto->get_all();
            require_once "view/product/all_products.php";
        } else {
            echo "Inicia sesión";
        }
    }

    public function newProduct()
    {
        if (isset($_SESSION['session'])) {
            if ($_SESSION['rol'] == "administrador") {

                require_once "view/product/product_new.php";
            } else {
                /* redireccion a index del rol */
                echo "Usuario no tiene permiso para ver este documento";
            }
        } else {
            echo "Inicia sesión";
        }
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {
            $producto = new Product();
            $producto->sku = $_REQUEST['sku'];
            $producto->name = $_REQUEST['name'];
            $producto->description = $_REQUEST['description'];
            $producto->marca = $_REQUEST['marca'];
            $producto->taxes = $_REQUEST['taxa'];
            $producto->category = $_REQUEST['category'];
            $producto->supplier_price = $_REQUEST['price'];
            $producto->percent_gain = $_REQUEST['gain_percent'];
            $producto->min = $_REQUEST['min'];
            $producto->max = $_REQUEST['max'];
            $producto->create();
            header("Location: index.php?controller=product&action=newProduct&msg=success");
        }
    }

    public function save_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {

            $image = $_FILES['image']['tmp_name'];
            $imgContenido = file_get_contents($image);

            $producto = new Product();
            $producto->id = $_REQUEST['id'];
            $producto->name = $_REQUEST['name'];
            $producto->description = $_REQUEST['description'];
            $producto->marca = $_REQUEST['marca'];
            $producto->supplier_price = $_REQUEST['price'];
            $producto->percent_gain = $_REQUEST['gain_percent'];
            $producto->product_image = $imgContenido;
            $producto->update();
            header("Location: index.php?controller=product&action=edit_product&msg=success");
        }
    }
}
