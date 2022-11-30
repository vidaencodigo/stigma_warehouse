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
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <content class="content">
        <section class="login">
            <article class="title--login">
                <h3>Stigma Store</h3>
            </article>
            <article class="form--login">
                <form class="form" method="post" action="index.php?controller=login&action=login">
                    <div class="controls">
                        <label for="user">Usuario</label>
                        <input type="text" id="user" name="user" class="input--control" placeholder="Usuario" required>
                    </div>
                    <div class="controls">
                        <label for="pwd">Contraseña</label>
                        <input type="password" id="pwd" name="password" class="input--control"
                            placeholder="Contraseña..." required>
                    </div>

                    <div class="controls--helper">
                        <a href="#">Recuperar Contraseña...</a>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="btn primary">Iniciar sesión</button>
                    </div>
                </form>
            </article>

        </section>
    </content>
</body>

</html>