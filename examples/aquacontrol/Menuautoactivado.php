<?php
session_start();
if (empty($_SESSION["iden"])) {
    header("location: index.php");

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AquaxControl </title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="hover.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="assets/img/drop.png">
</head>


<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">AquaxControl</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="controlador/controlador_cerrarsesion.php"
                    class="btn btn-danger square-btn-adjust">Cerrar Sesion</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="aquaicono.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="active-menu" href="Menu.php"><i class="fa fa-dashboard fa-3x"></i> Menu de
                            control</a>
                    </li>
                    <li>
                        <a href="estadisticas.php"><i class="fa fa-bar-chart-o fa-3x"></i> Estadisticas</a>
                    </li>
                    <li>
                        <a href="historiales.php"><i class="fa fa-table fa-3x"></i> Historiales</a>
                    </li>
                    <li>
                        <a href="config.php"><i class="fa fa-desktop fa-3x"></i> Enlace a dispositivo</a>
                    </li>
                    <li>
                        <a href="info.php"><i class="fa fa-square-o fa-3x"></i> Informacion y noticias</a>
                    </li>
                </ul>

            </div>


        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Menu de Control </h2>
                        <h5>
                            Bienvenido!
                            <?php
                            echo $_SESSION["nom"];
                            ?>
                            Empecemos a maniobrar!
                        </h5>
                    </div>
                </div>
                <style>
                    .horizontal {

                        justify-content: center;
                    }

                    .recuadro {
                        background-color: rgb(247, 247, 247);
                        width: 60%;
                        height: 40%;
                        margin: auto;
                        border-style: solid;
                        border-width: normal;
                        border-color: rgb(232, 230, 230);

                    }

                    .recuadro2 {
                        background-color: rgb(244, 244, 244);
                        width: 100%;
                        margin: auto;
                        border-style: solid;
                        border-width: normal;
                        border-color: rgb(219, 227, 227);


                    }

                    .espaciobtn1 {
                        width: 5%;
                    }

                    .autoactivado {
                        background-color: rgb(132, 230, 117);
                        border-color: rgb(41, 112, 30);
                    }
                </style>


                <!-- /. ROW  -->
                <hr />
                <div class="recuadro2">
                    <div class="row">
                        <center>
                            <h1><b>
                                    Modo activado:
                                </b></h1>
                        </center>
                    </div>
                    <div class="recuadro">
                        <center>
                            <h2><b>
                                    <font color="orange">Modo manual</font>
                                </b></h2>

                        </center>
                    </div><br>

                    <div class="horizontal">
                        <center>

                            <input type="submit" class="btn btn-primary btn-lg" value="Modo Automatico"
                                name="mautomatico" href="Menuauto.php">
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <input type="submit" class="btn btn-warning btn-lg" value="Modo Manual" name="mmanual">

                        </center><br>
                    </div><br>
                </div>
                <div class="row">
                    <center>
                        <h1><b>
                                Informacion de consumo:
                            </b></h1><br>
                    </center>
                </div>



                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box">

                            <i class="fa-sharp fa-solid fa-glass-water"></i>


                            </span>
                            <div class="text-box">
                                <p class="main-text">
                                    <center>
                                        <b>Litros consumidos</b>
                                </p>
                                </center>
                                <center>
                                    <div class="hvr-float"> <svg width="91px" height="91px" viewBox="0 0 24 24"
                                            id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #020202;
                                                            stroke-miterlimit: 10;
                                                            stroke-width: 1.92px;
                                                        }
                                                    </style>
                                                </defs>
                                                <path class="cls-1"
                                                    d="M18.71,14.88a6.71,6.71,0,0,1-13.42,0C5.29,9.12,12,2.42,12,2.42S18.71,9.12,18.71,14.88Z">
                                                </path>
                                                <path class="cls-1" d="M12,17.75a2.88,2.88,0,0,1-2.88-2.87"></path>
                                                <line class="cls-1" x1="21.58" y1="14.88" x2="23.5" y2="14.88"></line>
                                                <line class="cls-1" x1="19.67" y1="21.58" x2="21.58" y2="21.58"></line>
                                                <line class="cls-1" x1="19.67" y1="8.17" x2="21.58" y2="8.17"></line>
                                                <line class="cls-1" x1="0.5" y1="14.88" x2="2.42" y2="14.88"></line>
                                                <line class="cls-1" x1="2.42" y1="21.58" x2="4.33" y2="21.58"></line>
                                                <line class="cls-1" x1="2.42" y1="8.17" x2="4.33" y2="8.17"></line>
                                            </g>
                                        </svg>
                                    </div>
                                    <h3> 10.01 Litros</h3>
                                </center>
                                <p class="text-muted"></p>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box">

                            </span>
                            <div class="text-box">
                                <p class="main-text">
                                    <center>
                                        <b>Presion actual</b>
                                </p>
                                </center>
                                <center>
                                    <div class="hvr-float"><svg width="91px" height="91px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M14,19V17.73a8,8,0,1,0-4,0V19H2v3H22V19ZM6.12,11.17A5.9,5.9,0,0,1,6.46,7.7a6,6,0,1,1,7.84,7.84,5.9,5.9,0,0,1-3.47.34,6,6,0,0,1-4.71-4.71ZM11,14.05A1.41,1.41,0,0,1,10.5,13c.17-1.9,1.5-7.5,1.5-7.5s1.33,5.6,1.5,7.5a1.39,1.39,0,0,1-.45,1.05h0l0,0A1.45,1.45,0,0,1,11,14.05ZM7,10H8v1H7Zm9,0h1v1H16Zm0-2H15V7h1ZM8,7H9V8H8Zm3-1H10V5h1Zm3,0H13V5h1Z">
                                                </path>
                                                <rect width="24" height="24" fill="none"></rect>
                                            </g>
                                        </svg>
                                    </div>
                                    <h3>5 lts/min</h3>
                                </center>
                                <p class="text-muted"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box">

                            </span>
                            <div class="text-box">
                                <p class="main-text">
                                    <center>
                                        <b>Consumo</b>
                                </p>
                                </center>
                                <center>
                                    <div class="hvr-float"> <svg fill="#000000" height="91px" width="91px" version="1.1"
                                            id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.6 490.6"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <path
                                                        d="M14.25,343.2v-12.5c0-6,4.8-10.8,10.8-10.8h440.5c6,0,10.8,4.8,10.8,10.8v12.5c0,6-4.8,10.8-10.8,10.8H25.05 C19.05,354,14.25,349.2,14.25,343.2z M25.05,422.3h440.5c6,0,10.8-4.8,10.8-10.8V399c0-6-4.8-10.8-10.8-10.8H25.05 c-6,0-10.8,4.8-10.8,10.8v12.5C14.25,417.5,19.05,422.3,25.05,422.3z M25.05,490.6h440.5c6,0,10.8-4.8,10.8-10.8v-12.5 c0-6-4.8-10.8-10.8-10.8H25.05c-6,0-10.8,4.8-10.8,10.8v12.5C14.25,485.7,19.05,490.6,25.05,490.6z M333.15,142.9 c0,48.4-39.2,87.6-87.6,87.6s-87.6-39.2-87.6-87.6s39.2-87.6,87.6-87.6C293.95,55.3,333.15,94.5,333.15,142.9z M262.25,137.4 c-4.7-2.6-9.7-4.6-14.7-6.6c-2.9-1.2-5.6-2.6-8-4.5c-4.8-3.8-3.9-10,1.7-12.5c1.6-0.7,3.2-0.9,4.9-1c6.5-0.4,12.7,0.8,18.5,3.7 c2.9,1.4,3.9,1,4.9-2.1c1-3.2,1.9-6.5,2.9-9.7c0.6-2.2-0.1-3.6-2.2-4.5c-3.8-1.7-7.6-2.9-11.7-3.5c-5.3-0.8-5.3-0.9-5.3-6.2 c0-7.5,0-7.5-7.6-7.5c-1.1,0-2.2,0-3.3,0c-3.5,0.1-4.1,0.7-4.2,4.3c0,1.6,0,3.2,0,4.8c0,4.7-0.1,4.6-4.6,6.3 c-10.9,4-17.6,11.4-18.4,23.3c-0.6,10.5,4.8,17.6,13.5,22.8c5.3,3.2,11.2,5.1,16.9,7.6c2.2,1,4.3,2.1,6.2,3.6 c5.4,4.5,4.4,12-2,14.8c-3.5,1.5-7.1,1.9-10.8,1.4c-5.8-0.7-11.3-2.2-16.5-4.9c-3-1.6-3.9-1.2-5,2.1c-0.9,2.8-1.7,5.7-2.5,8.6 c-1.1,3.9-0.7,4.8,3,6.6c4.7,2.3,9.7,3.4,14.9,4.3c4,0.6,4.1,0.8,4.2,5c0,1.9,0,3.8,0.1,5.7c0,2.4,1.2,3.8,3.6,3.8 c2.8,0.1,5.6,0.1,8.4,0c2.3-0.1,3.5-1.3,3.5-3.6c0-2.6,0.1-5.2,0-7.8s1-4,3.6-4.7c5.8-1.6,10.8-4.7,14.6-9.4 C281.25,164.6,277.25,145.7,262.25,137.4z M476.25,11v263.8c0,6.1-4.9,11-11,11H25.75c-6.1,0-11-4.9-11-11V11c0-6.1,4.9-11,11-11 h439.5C471.35,0,476.25,4.9,476.25,11z M442.15,83.2c-3.2,0.8-6.6,1.3-10,1.3c-22.4,0-40.5-18.1-40.5-40.5c0-3.4,0.4-6.7,1.2-9.9 h-297c0.5,2.4,0.7,4.9,0.7,7.4c0,22.4-18.1,40.5-40.5,40.5c-2.4,0-4.8-0.2-7.1-0.6v122.9c2.3-0.4,4.7-0.6,7.1-0.6 c22.4,0,40.5,18.1,40.5,40.5c0,2.5-0.2,5-0.7,7.4h296.2c-0.2-1.6-0.3-3.3-0.3-5c0-22.4,18.1-40.5,40.5-40.5c3.5,0,6.8,0.4,10,1.3 V83.2H442.15z M398.95,127.7h-34c-3,0-5.4,2.4-5.4,5.4v19.5c0,3,2.4,5.4,5.4,5.4h34c3,0,5.4-2.4,5.4-5.4v-19.5 C404.35,130.2,401.85,127.7,398.95,127.7z M126.15,127.7h-34c-3,0-5.4,2.4-5.4,5.4v19.5c0,3,2.4,5.4,5.4,5.4h34 c3,0,5.4-2.4,5.4-5.4v-19.5C131.55,130.2,129.15,127.7,126.15,127.7z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <h3>10.03 MXN</h3>
                                </center>
                                <p class="text-muted"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box">
                            <div class="autoactivado">
                                <div class="text-box">
                                    <center>Operando en modo automatico</center>
                                    <p class="main-text">
                                        <center>
                                            <b>Estado de la valvula</b>
                                    </p>
                                    </center>
                                    <center>
                                        <div class="hvr-float"><svg width="91px" height="91px" viewBox="0 0 1024 1024"
                                                fill="#000000" class="icon" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M906.895 675.529c0-164.007-45.881-287.583-136.353-367.23-107.742-94.929-237.319-90.326-270.497-87.343h-58.548c-6.849-22.867-29.053-39.805-55.675-39.805h-29.127c-26.622 0-48.826 16.9-55.749 39.805h-205.874v174.466h203.518v17.307c0 30.009 26.107 54.461 58.106 54.461h29.127c32.073 0 58.106-24.413 58.106-54.461v-17.307h60.572l4.676 0.11 5.45-0.699c0.848-0.11 82.335-8.027 141.914 45.55 50.41 45.292 75.891 124.386 75.891 235.148h174.466zM268.173 156.147h210.993c24.985-0.020 45.233-20.27 45.255-45.253v-23.31c-0.020-24.985-20.27-45.233-45.253-45.255h-210.994c0 0 0 0 0 0-25.002 0-45.27 20.257-45.292 45.253v23.346c0.041 24.982 20.304 45.219 45.292 45.219 0 0 0 0 0 0zM852.73 720.157l-29.347-33.249-29.347 33.249c-21.872 24.781-93.271 110.135-93.271 166.659 0 67.606 55.012 122.62 122.62 122.62s122.62-55.012 122.62-122.62c0-56.523-71.325-141.875-93.271-166.659zM823.381 931.187c-24.502-0.041-44.35-19.903-44.371-44.405 0.074-12.117 19.148-44.889 44.371-78.729 25.334 33.767 44.223 66.539 44.371 78.726 0 24.524-19.847 44.407-44.371 44.407z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                        <h3>Abierto</h3>
                                    </center>
                                    <p class="text-muted"></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recuadro2">

                    <div class="row">
                        <center>
                            <h1><b>
                                    Control manual de valvula
                                </b></h1><br><br>
                        </center>
                    </div>
                    <div class="horizontal">
                        <center>

                            <input type="submit" class="btn btn-primary btn-lg" value="Abrir valvula"
                                name="btningresar">
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;

                            &nbsp;
                            &nbsp;
                            <input type="submit" class="btn btn-danger btn-lg" value="Cerrar valvula"
                                name="btningresar">

                        </center><br>
                    </div><br>
                </div>
                <div class="recuadro2">

                    <div class="row">
                        <center>
                            <h1><b>
                                    Control modo automatico
                                </b></h1><br><br>
                        </center>
                    </div>
                    <div class="horizontal">
                        <center>

                            <input type="submit" class="btn btn-primary btn-lg" value="Iniciar modo automatico"
                                name="inimauto">
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <input type="submit" class="btn btn-danger btn-lg" value="Detener modo automatico"
                                name="detmauto">

                        </center><br>
                    </div><br>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">



                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->




            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
        </div>
    </div>
    <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

<footer>
    <center>
        <h4>
            <font color="black">AUTOMAT</font>
            <font color="red">IoT</font>
            <font color="black">®</font>
        </h4>
        <img src="assets/img/Automatiot.jpeg" class="user-image img-responsive" />
        <h6>
            2023
        </h6>
    </center>
</footer>

</html>