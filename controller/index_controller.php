<?php

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
            require_once "view/index.php";
        } else {
            $this->login();
        }
    }
}
