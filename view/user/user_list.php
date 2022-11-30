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
                    <li class="list-item"> <a class="link_menu_side" href="index.php">Inicio</a></li>
                    <li class="list-item"> <a class="link_menu_side" href="index.php?controller=user&action=index">Nuevo Usuario</a></li>
                    <li class="list-item"> Usuarios</li>
                </ul>
            </div>
        </section>
        <section class="container">
        <div class="card">
                <div class="card-title">
                    <h3>Lista usuarios</h3>
                </div>
                <div class="card-body">
                    <?php require_once "./view/user/table_users.php"?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>