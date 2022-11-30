<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Stigma Store">
    <meta name="description" content="Inventory of Stigma Store">
    <meta name="keywords" content="PHP, HTML, CSS, KAWAI, STORE">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Spanish">
    <meta name="author" content="Emmanuel Lucio Urbina">

    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/stigma.css">
</head>

<body>
    <div class="content">
        <section class="header">

            <div class="header-info">
                <p><a class="link_menu" href="index.php?controller=login&action=logout">Salir</a></p>
                <p><?= $_SESSION["username"] ?></p>
            </div>
        </section>
        <section class="sidebar">
            <div class="sidebar-title">
                <h3>| STIGMA STORE |</h3>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="list-item"> Nuevo Usuario</li>
                    <li class="list-item"><a class="link_menu_side" href="index.php?controller=user&action=listUser">Usuarios</a></li>
                </ul>
            </div>
        </section>
        <section class="container">
            <div class="card">
                <div class="card-title">
                    <h3>Registra usuario</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php?controller=user&action=saveEditUser">
                      
                        <div class="form-control-fluid">

                            <div class="form-control">
                                <label for="nombre">Usuario</label>
                                <label> <?=$_REQUEST['id']?> </label>
                                <input type="hidden" class="input--control" name="username" value="<?=$_REQUEST['id']?>">
                            </div>

                        </div>
                        <div class="form-control-fluid">

                            <div class="form-control">
                                <label for="nombre">Nueva Contraseña</label>
                                <input type="password" class="input--control" name="password" required>
                            </div>
                            <div class="form-control">
                                <label for="nombre">Repite contraseña</label>
                                <input type="password" class="input--control" name="password_valid" required>
                            </div>
                        </div>
                        



                        <div class="form-button">
                            <button type="submit" name="save" class="btn primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_REQUEST['msg'])) :
            ?>
                <?php if ($_REQUEST['msg'] == "pwderr") : ?>
                    <div class="alert danger">
                        <p>Ambos contraseñas deben coincidir</p>
                    </div>
                <?php endif; ?>
                <?php if ($_REQUEST['msg'] == "usrerr") : ?>
                    <div class="alert danger">
                        <p>Usuario ya esta registrado</p>
                    </div>
                <?php endif; ?>
                <?php if ($_REQUEST['msg'] == "success") : ?>
                    <div class="alert success">
                        <p>Contraseña cambiada exitosamente</p>
                    </div>
                <?php endif; ?>
            <?php

            endif;
            ?>
        </section>
    </div>
</body>

</html>