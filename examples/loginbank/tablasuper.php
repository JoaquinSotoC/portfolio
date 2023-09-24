<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla super usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <style>
        .wrapper{
            width: 100%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                    <a href="index.php" class="btn btn-danger pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
                        <br><br><br>
                    <h2 class="pull-left">Informacion clientes</h2><br><br>
                        <a href="create.php" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Agregar cliente</a>
                        <a href="tablasuper.php" class="btn btn-warning pull-left"><i class="fa fa-refresh"></i> Actualizar tabla</a>
                        <button class="btn btn-success pull-left"  onclick="ExportToExcel('xlsx')">Exportar tabla a excel</button>
                        <script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('tbl_exporttable_to_xls');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "Clientes" });
    return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
        XLSX.writeFile(wb, fn || ('Clientes.' + (type || 'xlsx')));
}
</script>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM clientes";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped" id="tbl_exporttable_to_xls">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>ID</th>";
                                    echo "<th>Nombre</th>";
                                    echo "<th>Apellido</th>";
                                    echo "<th>Correo</th>";
                                    echo "<th>Estado</th>";
                                    echo "<th>CURP</th>";
                                    echo "<th>Telefono</th>";
                                    echo "<th>Privilegio</th>";
                                    echo "<th>Contraseña</th>";
                                    echo "<th>Opciones</th>";
                                    
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['apellido'] . "</td>";
                                        echo "<td>" . $row['correo'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        echo "<td>" . $row['curp'] . "</td>";
                                        echo "<td>" . $row['telefono'] . "</td>";
                                        echo "<td>" . $row['priv'] . "</td>";
                                        echo "<td>" . $row['clave'] . "</td>";
                                        echo "<td>";
                                            
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Actualizar cliente" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Eliminar cliente" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No existen clientes.</em></div>';
                        }
                    } else{
                        echo "No disponible, favor de intentar despues.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>