<?php
$datos ="abcd";
$datos2="12abde";
$datos3="12AbcDe23";

//strlen: obtien la logitud de un string

for($i=0;$i<strlen($datos);$i++)
{
	// Mostramos cada uno de los caracteres...
	// con $cadena[0] se muestra el primera caracter, [1], el segundo, etc...
	echo "<br>".$datos[$i];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba_2</title>
</head>
<body>
    <label for="">Mostrar un cuantas veces es diferente uno del otro</label>


    <script type="text/javascript">
        const datos2 = "12efds";
        let acumulador = '';
        i=datos2[1];
                

        for(const i in datos2){
        
                if(i>acumulador){
                console.log(datos2[2]+"-"+datos2[5]);
                    // datos2[3];
                }else{
                console.log(datos2[i]);
                }
            
        }

    </script>   
</body>
</html>