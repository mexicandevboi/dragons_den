<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic: The Gathering</title>
    <link rel="stylesheet" href="css/tienda - css/menu.css">
    <link rel="icon" href="assets/tienda-Imgs/IconoLogo.png">

    <!--xsi le puse el normalize tambien-->
    <link rel="stylesheet" href="css/tienda - css/normalize.css">

    <!--Para el menu de hamburguesa-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Libreria pa los iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/tienda - js/app.js" async></script>
    <script>
        function menuVer() {
            var x = document.getElementById("Links2");
            if (x.style.display === "inline") {
                x.style.display = "none";
            } else {
                x.style.display = "inline";
            }
        }

    </script>
</head>




<body>
    <?php include 'dbconfig.php'; ?>

    <div id="header">
        <header class="topnav">
            <img id="logo" src="assets/tienda-Imgs/LogoBlanco.png">
            <!-- Quiten como requieran -->
            <div id="Links">
                <button class="boton"><a href="Tienda.php">Inicio</a></button>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="menuVer()">
                <i class="fa fa-bars"></i>
            </a>

        </header>
        <div id="Links2">
            <a href="Tienda.html">Inicio</a>
        </div>
    </div>
    <section>
        <div class="header2" id="encabezado">
            <div class="mb">
                <h1>Cartas</h1>
            </div>
    </section>
    </div>
    <main>
        <section>

            <form>
                <p>
                <div style="text-align: center;">
                    <h2 style="color: black;">Nombre: </h2><input id="barraBusqueda" onkeyup="buscar_cartas()"
                        type="text" name="busqueda" placeholder="Ingresa nombre de la carta..." />
                    </select>
                    <br>
                    <input style="margin: 1rem;" type="submit" value="Buscar" />
                </div>
                </p>
            </form>
            <section class="contenedor">
                <!-- Contenedor de elementos -->
                <div class="contenedor-items">
                    <!-- Setup the card items based on the following example -->
                    <!-- <div class="item">

                        <a href="Producto.html"
                            onclick="establecerInfo('El anillo verdaderamente Único', 'assets/tienda-Imgs/Carta1.png', 55)">
                            <img src="assets/tienda-Imgs/Carta1.png" alt="" class="img-item">
                        </a>
                        <span class="titulo-item">El Anillo Verdaderamente Único</span>
                        <span class="precio-item">$55</span>
                    </div> -->

                    <?php
                    $sql = "SELECT * FROM Cards;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<div class='item'>";
                            // echo "<a href='Producto.php?id=" . "'onclick='establecerInfo(\"" . $row["name"] . "\", \"" . $row["image_uri_normal"] . "\",\"" . $row["rarity"] . "\", " . $row["price_usd"] . "\",\"" . $row["type_line"] . "\", \"" . $row["oracle_text"] . "\")'>";
                            echo "<a href='Producto.php?id=" . $row["id"] . "'>";
                            echo "<img src='" . $row["image_uri_normal"] . "' alt='' class='img-item'>";
                            echo "</a>";
                            echo "<span class='titulo-item'>" . $row["name"] . "</span>";
                            echo "<span class='precio-item'>$" . $row["price_usd"] . "</span>";
                            echo "</div>";
                        }
                    } else
                    {
                        echo "0 results";
                    }
                    ?>

                </div>
                <!--Envío de informacion-->
                <script>
                    //var carta;
                    function establecerInfo(nombreCarta, imagenCarta, rarezaCarta, precioCarta, tipoCarta, textoCarta) {
                        var carta = { nombre: nombreCarta, imagen: imagenCarta, rareza: rarezaCarta, precio: precioCarta, tipo: tipoCarta, texto: textoCarta };
                        const cartaString = JSON.stringify(carta);
                        localStorage.setItem('cartaEscogida', cartaString);
                    }


                    function buscar_cartas() {
                        let input = document.getElementById("barraBusqueda").value;
                        input = input.toLowerCase();
                        let lista = document.getElementsByClassName("item");

                        for (i = 0; i < lista.length; i++) {
                            if (!lista[i].innerHTML.toLowerCase().includes(input)) {
                                lista[i].style.display = "none";
                            } else {
                                lista[i].style.display = "block";
                            }
                        }

                        if (input.value == "") {
                            for (i = 0; i < lista.length; i++) {
                                lista[i].style.display = "block";
                            }
                        }
                    }

                </script>
                <!-- Carrito de Compras -->
                <div class="carrito" id="carrito">
                    <div class="header-carrito">
                        <h2 class="tcarrito">Tu Carrito</h2>
                    </div>

                    <div class="carrito-items">

                    </div>
                    <div class="carrito-total">
                        <div class="fila">
                            <strong>Tu Total</strong>
                            <span class="carrito-precio-total">
                                $120.000,00
                            </span>
                        </div>
                        <button class="btn-pagar">Pagar <i class="fa-solid fa-money-bill"></i> </button>
                    </div>
                </div>
            </section>

        </section>
    </main>


    </div>




    <footer>
        <ul>
            <li>
                <h2>Magic: The Gathering</h2>
            </li>
            <li><a href="https://goo.gl/maps/9Do1MRQcM9nvbFc17">Dirección: Santiago 1913</a></li>
            <li><a href="">Menú</a></li>
            <!--li><p><b>Horario: </b></p></li>
        <li><p>Lunes, miércoles, jueves y viernes: 5:00pm a 12:00am</p></li>
        <li><p>viernes y sábado: 5:00pm a 3:00am</p></li-->
        </ul>

    </footer>

    $conn->close();
</body>

</html>