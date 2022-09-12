<?php
include('conexionPHP.php');

//consulta a la base de datos //cambiar la consulta a bases de datos
$datosUser = "SELECT id, description, price,stock, created_at, updated_at FROM products";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">la
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Prueba 6</title>
</head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>-->
<body>
    <div>
        <label for="" id="mostrar">Mostrar Datos y asegurarse de descargar los datos por medio de un pdf o excel</label>
    </div>
    <div class="contenedor">
        <form action="">
            <table class="table table-bordered">
                <div class="title">Datos Usuario<a href="generarExcel.php">Generar Excel</a></div>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>DESCRIPTION</td>
                        <td>PRICE</td>
                        <td>STOCK</td>
                        <td>Creation</td>
                        <td>Updated</td>
                        
                    </tr>
                </thead>
                <tbody>
            <?php $result = mysqli_query($conn, $datosUser);
                 while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["description"];?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["stock"]; ?></td>
                    <td><?php echo $row["created_at"]; ?></td>
                    <td><?php echo $row["updated_at"]; ?></td>
                   </tr>
                <?php }mysqli_free_result($result);?>           
                </tbody>
            </table>
        </form>
    </div>
    <footer>
        <h1>Hola soy Yesenia</h1>
    </footer>
    <script type="text/javascript"></script>
</body>
</html>