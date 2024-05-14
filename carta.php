<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Magic: The Gathering</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/producto-Imgs/IconoLogo.png">

    <!--Para el menu de hamburguesa-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Libreria pa los iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


    <!-- css -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/producto - css/menu.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>


    <?php include 'header.php'; ?>
    <main>
        <!-- Product section / Producto-->
        <?php include 'dbconfig.php';

        // Verificar si se ha pasado un ID válido por la URL
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];

            // Consultar la información de la carta con el ID especificado
            $sql = "SELECT * FROM Cards WHERE id = $id;";
            $result = $conn->query($sql);

            // Verificar si se encontró la carta
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();

                // Obtener los datos de la carta
                $nombreCarta = $row["name"];
                $imagenCarta = $row["image_uri_normal"];
                $precioCarta = $row["price_usd"];
                $tipoCarta = $row["type_line"];
                $textoCarta = $row["oracle_text"];
                $rarity = ucfirst($row["rarity"]);
                $type_line = $row["type_line"];
                $oracle_text = $row["oracle_text"];
                $standard = $row["standard"];
                $pioneer = $row["pioneer"];
                $modern = $row["modern"];
                $legacy = $row["legacy"];
                $pauper = $row["pauper"];
                $historic = $row["historic"];
                $timeless = $row["timeless"];
                $commander = $row["commander"];

                $legalities = [
                    'Standard' => $standard,
                    'Pioneer' => $pioneer,
                    'Modern' => $modern,
                    'Legacy' => $legacy,
                    'Pauper' => $pauper,
                    'Historic' => $historic,
                    'Timeless' => $timeless,
                    'Commander' => $commander,
                ];

                // Mostrar el código HTML con la información de la carta
                echo <<<HTML
                <section class="py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <!--Carta-->
                            <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" id="tilt"
                                    src="{$imagenCarta}" alt="..." /></div>
                            <div class="col-md-6 mb-5">
                                <div class="small mb-1">{$rarity} · {$type_line}</div>
                                <h1 id="nombreCarta" class="display-5 fw-bolder">{$nombreCarta}</h1>
                                <div class="fs-5 mb-4">
                                    <span class="text-decoration-line-through">$57.97</span>
                                    <span id="precioTexto">$ {$precioCarta}</span>
                                </div>
                                <div class="card-text-oracle d-block" id="oracle-text">
                                    <p>{$oracle_text}</p>
                                </div>
                                <div class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                        style="max-width: 3rem" />
                                    <button id="addToCart" class="btn btn-primary flex-shrink-0 me-3" type="button">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                    <!-- Button trigger modal / Boton Lupa -->
                                    <button type="button" class="btn btn-outline-dark flex-shrink-0 me-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="bi bi-zoom-in"></i>
                                        Inspect
                                    </button>
                                    <!-- Boton Detalles-->
                                    <button type="button" class="btn btn-outline-dark d-flex me-3"
                                        onclick="toggleVisibility('oracle-text')">
                                        <i id="oracleIcon" class="bi bi-eye-slash-fill"></i>
                                        &nbsp;Oracle
                                    </button>


                                    <!-- Legalidad -->
                                    <div class="col-md-2 container d-none">
                                        <div class="legality-row row">
                                            <?php if ({$standard}): ?>
                                            <div class="legality-item col">
                                                <dt>Standard</dt>
                                                <dd class="legality bg-success text-white rounded">Legal</dd>
                                            </div>
                                            <?php else: ?>
                                            <div class="legality-item col">
                                                <dt>Standard</dt>
                                                <dd class="legality bg-secondary text-white rounded">Not Legal</dd>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <!-- Modal / Lupa-->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content bg-transparent border-0">
                                                <div class="modal-body bg-transparent">
                                                    <img id="card_inspect" src="{$imagenCarta}" alt="the-one-ring">
                                                </div>
                                                <div class="modal-footer bg-transparent border-0">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                HTML;
            } else
            {
                echo "Carta no encontrada";
            }
        } else
        {
            echo "ID de carta no especificado";
        }
        ?>

    </main>


    </div>




    <footer class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
        <ul>
            <li>
                <h2>Magic: The Gathering</h2>
            </li>
        </ul>

    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/producto - js/scripts.js"></script>
    <script src="js/producto - js/magnifier.js"></script>
</body>

</html>