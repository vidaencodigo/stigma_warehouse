<?php
require_once "model/user.php";
/**
 * Controlador para usuarios
 * Author: EMMANUEL LUCIO URBINA
 */

class UserController
{

    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        if (isset($_SESSION['session'])) {
            if ($_SESSION['rol'] == "administrador") {

                require_once "view/user/user_form.php";
            } else {
                /* redireccion a index del rol */
                echo "Usuario no tiene permiso para ver este documento";
            }
        } else {
            echo "Inicia sesión";
        }
    }

    public function editUser()
    {
        if (isset($_SESSION['session'])) {
            if ($_SESSION['rol'] == "administrador") {

                require_once "view/user/user_form_edit.php";
            } else {
                /* redireccion a index del rol */
                echo "Usuario no tiene permiso para ver este documento";
            }
        } else {
            echo "Inicia sesión";
        }
    }

    public function listUser()
    {
        if (isset($_SESSION['session'])) {
            if ($_SESSION['rol'] == "administrador") {
                $usuarios = $this->user->get_all_active('active');
                require_once "view/user/user_list.php";
            } else {
                /* redireccion a index del rol */
                echo "Usuario no tiene permiso para ver este documento";
            }
        } else {
            echo "Inicia sesión";
        }
    }

    public function saveUser()
    {
        if (isset($_REQUEST['save'])) {
            if (validPassword($_REQUEST['password'], $_REQUEST['password_valid'])) { //valida que sea el mismo pwd
                $usuarioexist = $this->user->get_by_username($_REQUEST['username']);

                if ($usuarioexist) {
                    header("Location: index.php?controller=user&action=index&msg=usrerr");
                } else {

                    $username = $_REQUEST['username'];
                    $name = $_REQUEST['name'];
                    $lastname = $_REQUEST['lastname'];
                    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
                    $rol = $_REQUEST['rol'];

                    $usuario = $this->user;

                    $usuario->user = $username;
                    $usuario->name = $name;
                    $usuario->last_name = $lastname;
                    $usuario->password = $password;
                    $usuario->user_type = $rol;

                    $usuario->create();
                    header("Location: index.php?controller=user&action=index&msg=success");
                }
            } else {
                header("Location: index.php?controller=user&action=index&msg=pwderr");
            }
        }
    }

    public function saveEditUser()
    {
        if (isset($_REQUEST['save'])) {
            if (validPassword($_REQUEST['password'], $_REQUEST['password_valid'])) { //valida que sea el mismo pwd
                $usuarioexist = $this->user->get_by_username($_REQUEST['username']);

                if ($usuarioexist) {
                    header("Location: index.php?controller=user&action=index&msg=usrerr");
                    $username = $_REQUEST['username'];

                    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);


                    $usuario = $this->user;
                    $usuario->user = $username;
                    $usuario->password = $password;


                    $usuario->editPassword();
                    header("Location: index.php?controller=user&action=editUser&id={$username}&msg=success");
                }
            } else {
                header("Location: index.php?controller=user&action=editUser&id={$_REQUEST['username']}&msg=pwderr");
            }
        }
    }
}



function validPassword($pwd, $pwd2)
{
    if ($pwd == $pwd2) {
        return true;
    }
    return false;
}
