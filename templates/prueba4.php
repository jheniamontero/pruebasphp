<?php 

//formulario que captura los valores y asi mismo muestra los resultados


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Prueba 4</title>
</head>
<body>
    <div class="container">
        <label>Ingresa tu operacion</label>
        <input type="text" id="valor" placeholder="Ingrese la fórmula">
        <p>=</p>
        <label id="resultado"></label>
    </div>
    
    <!-- script -->
    <script type="text/javascript">
        
        var fx = document.getElementById('valor'),
        resultado = document.getElementById('resultado');

    fx.addEventListener('input', function () {
        var error = true;
        try{
            //Si sólo tiene números y signos + - * / ( )
            if (/^[\d-+/*()]+$/.test(fx.value)) {
            // Evaluar el resultado
            resultado.innerText = eval(fx.value);
            error = false;
            }
        } catch (err) { }
    if (error) // Si no se pudo calcular
        resultado.innerText = "Error";
    });

    </script>

</body>
</html>