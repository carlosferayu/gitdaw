<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="TPV Hamburgueseria" />
        <meta name="author" content="Dumitru Cosmin Boycsuk" />
        <title>Extasis - Preparando pedido...</title>
        <link rel="icon" type="image/x-icon" href="../utilities/images/favicon.ico" />
        <link href="../utilities/css/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="../utilities/css/main.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container-fluid">
	        <div class="row text-dark">
		        <div class="col-md-12 p-3 mb-2 d-flex fs-5 justify-content-between align-items-center">
                    <div>
                        <b class="text-danger">Le atiende: </b>
                        <?php
                            $sW = $_POST['sendWorker'];
                            //Comentario de clara
                            echo $sW;
                        ?>
                    </div>
                    <span class="fw-bolder" id="showTime"></span>
                    <script>
                        setInterval(getTime, 1000);

                        function getTime() {
                            const displayDate = new Date();
                            let localTime = displayDate.toLocaleTimeString();
                            document.getElementById("showTime").innerHTML = localTime;
                        }

                        getTime();
                    </script>
                    <span class="fw-bolder">Pedido nº 1</span>
		        </div>
	        </div>
	        <div class="row">
		        <div class="lista col-md-2 text-dark">
                    <?php
                        require "../utilities/functions.php";
                        $getFood = getFoodType();

                        foreach ($getFood as &$valor) {
                            echo "<form method='POST' action='menu/menu.php'>";
                                echo "<ul class='nav nav-pills flex-column mb-auto'>";
                                    echo "<li class='nav-item'>";
                                        echo "<a class='nav-link link-light' href='#'>".$valor[0]."</a>";
                                        echo "<input type='hidden' name='sendFoodType' value='".$valor[0]."'>";
                                    echo "</li>";
                                echo "</ul>";
                            echo "</form>";
                        }
                    ?> 
		        </div>
		        <div class="col-md-8 text-light">
                    <div class="container">
                        <div class="row class='select-article'">
                        <?php
                            $displayAllTypes = displayEverything();

                            $folder = "../utilities/images/food-menu/";

                            $scan = array_slice(scandir($folder), 2);

                            $bebidas = false;
                            $hamburguesas = false;
                            $ensaladas = false;
                            $complementos = false;
                            $postres = false;

                            foreach ($displayAllTypes as &$valor) {

                                $displayPic;

                                foreach($scan as &$file) {
                                    if (basename($file, ".png") == $valor[4]) {
                                        $displayPic = $file;
                                    }
                                }

                                if ($valor[2] == 1 && $hamburguesas == false) {
                                    echo "<h3 class='article-title fw-bolder'>Hamburguesas</h3>";
                                    $hamburguesas = true;
                                } else if ($valor[2] == 2 && $ensaladas == false) {
                                    echo "<h3 class='article-title fw-bolder mt-4'>Ensaladas</h3>";
                                    $ensaladas = true;
                                } else if ($valor[2] == 3 && $complementos == false) {
                                    echo "<h3 class='article-title fw-bolder mt-4'>Complementos</h3>";
                                    $complementos = true;
                                } else if ($valor[2] == 4 && $bebidas == false) {
                                    echo "<h3 class='article-title fw-bolder mt-4'>Bebidas</h3>";
                                    $bebidas = true;
                                } else if ($valor[2] == 5 && $postres == false) {
                                    echo "<h3 class='article-title fw-bolder mt-4'>Postres</h3>";
                                    $postres = true;
                                }
                                    
                                echo "<div class='article col-2'>";
                                    echo "<form method='POST' action='menu.php'>";
                                        echo 
                                        "<button value='".$valor[1]."'>
                                            <img class='img-fluid' src='../utilities/images/food-menu/".$displayPic."'/>
                                        </button>";
                                    echo "</form>";
                                    echo "<button class='minus-items text-light' onclick='subNumber();'>-</button>";
                                    echo "<form class='form-inline d-inline' method='POST' action='menu.php'>";
                                        echo "<input id='quantity' type='number' name='".$valor[1]."' value='1'/>";
                                    echo "</form>";
                                    echo "<button class='sum-items text-light' onclick='sumNumber();'>+</button>";
                                    echo "<h5 class='text-style text-center text-dark fw-bolder'>".$valor[1]."</h5>";
                                echo "</div>"; 
                            }
                        ?>
                        </div>
                    </div>
		        </div>
		        <div class="col-md-2 text-dark">
                    
        		</div>
        	</div>
        </div>
    </body>
    <script>
        
    </script>
</html>