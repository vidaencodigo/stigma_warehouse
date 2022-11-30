<?php
require_once "model/salidas.php";
require_once "model/entradas.php";
/**
 * Controlador inicio
 * Author: EMMANUEL LUCIO URBINA
 */
class IndexController
{
    public function index()
    {
        if (!isset($_SESSION['session'])) :
            $this->login();
        else :
            $this->indexMain();
        endif;
    }

    public function login()
    {
        require_once "view/login/login_form.php";
    }

    public function indexMain()
    {
        //Solo usuarios logeados
        if (isset($_SESSION['session'])) {
            $entradas = new  Entradas();
            $salidas = new Salidas();
            $total_entries = $entradas->get_total();
            $total_salidas = $salidas->get_total();
            
            require_once "view/index.php";
        } else {
            $this->login();
        }
    }
}
