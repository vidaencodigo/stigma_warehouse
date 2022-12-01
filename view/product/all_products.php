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
                        <a href="#" class="menu--item">
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
                <div class="producto--form">
                    <div class="card--form table--card">
                        <div class="card--title">
                            <h4>Producto</h4>
                        </div>
                        <div class="card--body">
                            <table class="table">
                                <thead>
                                    <th> - </th>
                                    <th>SKU</th>
                                    <th>Nombre</th>
                                    <th>Precio compra</th>
                                    <th>% Ganancia</th>
                                    <!-- 
                                    <th>Impuesto agregado</th>
                                    -->
                                    <th>SubTotal</th>
                                    <th>Total con impuestos</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($products as $producto) :
                                            $porcentaje = 1 - ($producto->percent_gain / 100);
                                            $subtotal = $producto->supplier_price / $porcentaje;
                                        ?>
                                            <td>
                                            <img src="data:image/png;base64,<?=base64_encode($producto->product_image)?>" alt="<?=$producto->name;?>" class="image--table">
                                            </td>
                                            <td>
                                                <?= $producto->sku ?>
                                            </td>
                                            <td>
                                                <?= $producto->name ?>
                                            </td>
                                            <td>
                                                $<?= $producto->supplier_price ?>
                                            </td>
                                            <td>
                                                <?= $producto->percent_gain ?>%
                                            </td>
                                            <!--
                                            <td>
                                                <?= $producto->taxes ?>%
                                            </td>
                                            -->
                                            <td>
                                                <?= round($subtotal, 2) ?>
                                            </td>
                                            <td>
                                                $<?= round(($subtotal * (($producto->taxes / 100) + 1)), 2) ?>
                                            </td>
                                            <td>
                                                <div class="actions--buttons">
                                                    <a href="index.php?controller=product&action=edit_product&id=<?= $producto->id ?>">Editar</a>
                                                    <a href="#">Eliminar</a>
                                                </div>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</body>

</html>