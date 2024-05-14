<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic: The Gathering</title>
    <link rel="icon" href="assets/tienda-Imgs/IconoLogo.png">
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
    <main>
        <?php include 'dbconfig.php'; ?>
        <section>
            <div class="header2" id="encabezado">
                <div class="mb">
                    <h1 class="text-light">Cartas</h1>
                </div>
        </section>
        </div>
        <section>
            <form>
                <div style="text-align: center;">
                    <h2 style="color: black;">Nombre</h2>
                    <input id="barraBusqueda" onkeyup="buscar_cartas()" type="text" name="busqueda"
                        placeholder="Ingresa nombre de la carta..." />
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="instant"
                            autocompleted="">
                        <label class="form-check-label" for="inlineCheckbox1">Instant</label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="creature"
                            autocompleted="">
                        <label class="form-check-label" for="inlineCheckbox2">Creature</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Artifact"
                            autocompleted="">
                        <label class="form-check-label" for="inlineCheckbox5">Artifact</label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Sorcery">
                        <label class="form-check-label" for="inlineCheckbox3">Sorcery</label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Enchantment">
                        <label class="form-check-label" for="inlineCheckbox4">Enchantment</label>
                    </div>
                </div>
            </form>
            <div class="contenedor">
                <!-- Contenedor de elementos -->
                <div class="contenedor-items">
                    <?php
                    $sql = "SELECT * FROM Cards;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<div class='item' data-typeline=\"" . $row["type_line"] . "\">";
                            // echo "<a href='Producto.php?id=" . "'onclick='establecerInfo(\"" . $row["name"] . "\", \"" . $row["image_uri_normal"] . "\",\"" . $row["rarity"] . "\", " . $row["price_usd"] . "\",\"" . $row["type_line"] . "\", \"" . $row["oracle_text"] . "\")'>";
                            echo "<a href='carta.php?id=" . $row["id"] . "'>";
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
                    function filter_cards() {
                        // filter the list of cards in contenedor-items using the checkboxes in the form above using jquery
                        let input = document.getElementById("barraBusqueda").value;
                        let lista = document.getElementsByClassName("item");
                        let instant = document.getElementById("inlineCheckbox1").checked;
                        let creature = document.getElementById("inlineCheckbox2").checked;
                        let sorcery = document.getElementById("inlineCheckbox3").checked;
                        let enchantment = document.getElementById("inlineCheckbox4").checked;
                        let artifact = document.getElementById("inlineCheckbox5").checked;

                        for (i = 0; i < lista.length; i++) {
                            let cardType = lista[i].getAttribute("data-typeline").toLowerCase();
                            let cardName = lista[i].querySelector(".titulo-item").textContent.toLowerCase();
                            let displayCard = false;

                            if (instant && cardType.includes("instant")) {
                                displayCard = true;
                            } else if (creature && cardType.includes("creature")) {
                                displayCard = true;
                            } else if (sorcery && cardType.includes("sorcery")) {
                                displayCard = true;
                            } else if (enchantment && cardType.includes("enchantment")) {
                                displayCard = true;
                            } else if (artifact && cardType.includes("artifact")) {
                                displayCard = true;
                            } else if (!instant && !creature && !sorcery && !enchantment && !artifact) {
                                displayCard = true;
                            }

                            let input = document.getElementById("barraBusqueda").value.toLowerCase();
                            if (input && !cardName.includes(input)) {
                                displayCard = false;
                            }

                            lista[i].style.display = displayCard ? "block" : "none";
                        }

                    }

                    // add event listener to the checkboxes using jquery
                    $(document).ready(function () {
                        $('#barraBusqueda').on('input', function () {
                            filter_cards();
                        });

                        $('#inlineCheckbox1').change(function () {
                            filter_cards();
                        });
                        $('#inlineCheckbox2').change(function () {
                            filter_cards();
                        });
                        $('#inlineCheckbox3').change(function () {
                            filter_cards();
                        });
                        $('#inlineCheckbox4').change(function () {
                            filter_cards();
                        });
                        $('#inlineCheckbox5').change(function () {
                            filter_cards();
                        });
                    });


                </script>
            </div>

        </section>
    </main>
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
</body>


</html>li--