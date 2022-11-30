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
                        <a href="index.php?controller=index&action=indexMain" class="menu--item">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=product&action=index" class="menu--item">
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu--item">
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
                <div class="producto--form">
                    <div class="card--form">
                        <div class="card--title">
                            <h4>Producto</h4>
                        </div>
                        <form method="POST" action="index.php?controller=product&action=save_edit" enctype="multipart/form-data">
                            <div class="form-group-inline">

                                <input type="hidden" name="id" value="<?=$product->id?>">
                                <div class="group--form">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="control" value="<?=$product->name?>" required>
                                </div>
                            </div>

                            <div class="group--form">
                                <label for="description">Descripción</label>
                                <input type="text" name="description" id="description" class="control" value="<?=$product->description?>" required>
                            </div>

                            <div class="group--form">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" class="control" value="<?=$product->marca?>" required>
                            </div>



                            <div class="group--form">
                                <label for="price">Precio proveedor</label>
                                <input type="number" step="any" name="price" id="price" class="control"  value="<?=$product->supplier_price?>" required>
                            </div>

                            <div class="group--form">
                                <label for="gain_percent">Porcentaje ganancia</label>
                                <input type="number" step="10" name="gain_percent" id="gain_percent" class="control" value="<?=$product->percent_gain?>" required>
                            </div>


                            <div class="group--form">
                                <label for="gain_percent">imagen</label>
                                <input type="file" name="image" id="image" class="control">

                            </div>



                           
                            <div class="form--buttons">
                                <button type="submit" class="btn primary --large">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>