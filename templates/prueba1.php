<?php

    $nombrearray = [
     				"nombre de la persona" => "Yesenia montero",
     				"edad de la persona" => "26 años",
     				"comida favorita" => "comer pizza y pan"];
   

    $cadena = "Hola soy ".$nombrearray["nombre de la persona"].", y tengo ".$nombrearray["edad de la persona"].", estoy aprendiendo a manejar mi logica, mi comida favorita es ".$nombrearray["comida favorita"]." y me encanta programar es lo mejor que hay en el mundo";
    


    //ahora la tarea es mostrar la $cadena con las especificaciones que me piden{}
   echo "$cadena";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos.css">
    <title>Prueba 1</title>
</head> 
<body>
        <div>
            <h1>
                <?php echo "$cadena"; ?>
            </h1>
        </div>
</body>
</html>