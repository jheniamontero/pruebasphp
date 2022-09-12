<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Prueba 7</title>
</head>
    <script type="text/javascript"> 
        $(document).on("click","#boton", function(){
            window.open("informe2.php");
        });
    </script>
<body>
    <button type="button" id="boton" class="btn btn-primary">Ver informe</button>
    <div id="mostrar">
        <label for="">Buscar y generar reporte en pdf</label>
    </div>
    
</body>
</html>