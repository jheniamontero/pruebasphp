<?php
require_once('../config/conexionPHP.php');

//ingresar datos
if(isset($_POST["enviar"])){//se tomo en cuenta si llego algin dato

    // Check connection
    if ($conn->connect_error) {//valido si habia conexion
       die("Connection failed: " . $conn->connect_error); //si  no hay enotnces error
    } 
    $sql = "INSERT INTO nameanimals(name)VALUES ('".$_POST["nameAnimal"]."')"; //realiza la consulta

    if (mysqli_query($conn, $sql)) {//si la conexion es correcta entonces ok
       echo "ok";
    } else { //de lo contrario es ERROR
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();

    
 }
 //!Mostrar indormacion, los primeros 10 en orden alfabetico
 $datos = "SELECT idnameAnimals, name FROM nameanimals ORDER BY name ASC LIMIT 10";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Prueba_1</title>
</head>
<body>
    <label for="">registrar 20 animales</label>

    <form action="" method="POST">
        <input type="text" name="nameAnimal" id="nameAnimal" placeholder="ingrese animal">
        <input type="submit" name="enviar" value="enviar">
    </form>
    <label>Muestra de Datos de 10 animales de forma ascendente</label>
    <form>
        <table cellpadding="2" cellspacing="3" class="table-datatable table-bordered">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >NAME</th>
                    
                </tr>
            </thead>
            <tbody>
                <!--  //crea una variable $resul= la cual tomara la conexion a la base de datos y la consulta a la base de datos -->
                <?php $result = mysqli_query($conn, $datos); ?>
                <?php while($dataRow=mysqli_fetch_assoc($result)){ ?> <!--utilizo el ciclo while para traer la consulta  con la fncon mysqli y le asocio la varible que me trae la conexion y la consulta a la base de datos -->
                    <tr>
                    <?php echo '<td>'.$dataRow['idnameAnimals'].'</td>'; ?><!-- aqui -->
                    <?php echo '<td>'.$dataRow['name'].'</td>'; ?>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </form>
</body>
</html>