<?php

$db=$conexion = mysqli_connect("localhost","id20740173_usuario","jMJHC34r_NFB4Q\V","id20740173_based");
if (isset($_POST["crear"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $curp = $_POST["curp"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];
    $email = $_POST["correo"];
    $pass = $_POST["clave"];
    $priv = $_POST["privilegio"];

    if (empty($nombre)) {
        echo '<div><font color="red"><center>Favor de llenar todos los campos</center></font></div>';
    } else {
        $sql_u = "SELECT * FROM clientes WHERE correo='$email'";
        $res_u = $db->query($sql_u);
        if ($res_u->num_rows > 0) {
            echo '<div><font color="red"><center>El correo ya está en uso</center></font></div>';
        } else {
            $sql=$conexion->query( "insert into clientes(nombre, apellido, curp, telefono, estado, correo, clave , priv) values ('$nombre', '$apellido', '$curp', '$telefono', '$estado', '$email', '$pass', '$priv');");
                echo '<div><font color="green"><center>Usuario registrado con éxito!</center></font></div>';
        }
    }

}


?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<form action="#" method="post">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Agregar cliente</h2>
                    <p>Favor de llenar los datos para agregar al cliente a la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Curp</label>
                            <input type="text" name="curp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" name="correo" class="form-control">
                        </div>
                        <div class="form-group" >
                            <label>Contraseña</label>
                            <input type="text" name="clave" class="form-control" data-validate="Introduce una contraseña">
                        </div>
                        <div class="form-group">
                            <label>Privilegios (Admin o cliente)</label>
                            <input type="text" name="privilegio" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Crear" name="crear">
                        <a href="tablasuper.php" class="btn btn-secondary ml-2">Cancelar</a>

                        <br><br><br>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<?php

?>
