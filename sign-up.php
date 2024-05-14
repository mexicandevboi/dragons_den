<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/tienda-Imgs/IconoLogo.png">

    <title>Magic: The Gathering</title>
    <!-- Styles -->
    <link rel="stylesheet" href="css/tienda - css/menu.css">
    <link rel="stylesheet" href="css/normalize.css">

    <!--Para el menu de hamburguesa-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Libreria pa los iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="js/tienda - js/app.js" async></script>
    <script src="js/index.js"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>




<body>
    <?php include 'header.php'; ?>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h1 style="color: black;">Registro</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="php/registro.php" method="POST">
                    <!-- crea una forma de registro que incluye: nombre de usuario, correo electronico, contraseña, y confirmacion de contraseña -->
                    <div class="form-group">
                        <label for="nombre">Nombre de usuario</label>
                        <input type="text" class="form-control" id="nombre" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="email" class="form-control" id="correo" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirmar" name="confirmar" required>
                    </div>

                    <!-- boton para mandar el registro alineado a la derecha -->
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>

    </footer>
</body>

</html>