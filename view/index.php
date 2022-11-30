<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3d68344ae4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/warehouse.css">
</head>

<body>

    <div class="container">
        <section class="heading">
            <div class="heading--content">
                <div class="logo--header">
                    <h1>
                        Sigma Store
                    </h1>
                </div>
                <div class="action--header">
                    <ul>
                        <li>
                            <a class="action-link" href="index.php?controller=login&action=logout">

                                Salir
                            </a>
                        </li>
                        <li>
                            <?= $_SESSION['username'] ?>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="container_app">
            <section class="sidebar">
                <ul>
                    <li>
                        <a href="index.php?controller=index&action=index" class="menu--item">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=product&action=index" class="menu--item">
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=product&action=newProduct" class="menu--item">
                            Nuevo producto
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=entradas&action=indexEntradas" class="menu--item">
                            Entradas producto
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=salidas&action=indexSalidas" class="menu--item">
                            Salidas producto
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu--item">
                            Reportes
                        </a>
                    </li>

                    <?php if ($_SESSION['rol'] == "administrador") : ?>
                        <li>
                            <a href="#" class="menu--item">
                                <a href="index.php?controller=user&action=index" class="menu--item">Nuevo Usuario</a>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </section>
            <section class="content-app">
                <div class="search--product--content">
                    <form>
                        <div class="group-form">
                            <label for="producto" class="icono"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></label>
                            <input type="text" name="producto" id="producto" class="input" placeholder="producto">
                        </div>
                    </form>
                </div>
                <div class="content--alerts--warehouse">
                    <div class="card faltante">
                        <div class="card--header">
                            <h2>
                                <i class="fa-solid fa-warehouse"></i>
                            </h2>
                        </div>
                        <div class="card--body">
                            <h3>
                                Producto esta al minimo
                            </h3>
                        </div>
                    </div>

                    <div class="card entrada">
                        <div class="card--header">
                            <h2>
                                <i class="fa-solid fa-truck-fast"></i>
                            </h2>
                        </div>
                        <div class="card--body">

                            <h3>
                                Hoy entraron 300 productos en total
                            </h3>
                        </div>
                    </div>

                    <div class="card salida">
                        <div class="card--header">
                            <h2>
                                <i class="fa-solid fa-truck-fast"></i>
                            </h2>
                        </div>
                        <div class="card--body">

                            <h3>
                                Hoy entraron 70 productos en total
                            </h3>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>