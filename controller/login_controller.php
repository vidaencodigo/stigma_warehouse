<?php
require_once "model/user.php";
/**
 * Controlador para login
 * Author: EMMANUEL LUCIO URBINA
 */
class LoginController
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] = "post") {
            $usuario = $_REQUEST['user'];
            $password = $_REQUEST['password'];
            $usuarioexist = $this->user->get_by_username($usuario);

            if ($usuarioexist) {

                if (password_verify($password,  $usuarioexist->password)) {
                    // sessiones con valor
                    $_SESSION['session'] = true;
                    $_SESSION["username"] = $usuarioexist->user;
                    $_SESSION["rol"] = $usuarioexist->user_type;
                    header("Location: index.php?controller=index&action=indexMain");
                } else {
                    echo "password no valido";
                }
            } else {
                header("Location: index.php?controller=index&action=index");
            }
        }
    }

    public function logout()
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        header("Location: index.php?controller=index&action=index");
    }
}
