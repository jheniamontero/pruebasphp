<?php 

//arrays 
$nombrearray = "1 2 3 4 5 6 7 8 9";
$datos2 = "2 6 8 10 12 14 16";
$datos = $nombrearray;

for($i=0; $i<$nombrearray; $i++){

	$nombrearray=str_replace([$i]," ? ", $i);
	// = str_replace("1", " ? ", $nombrearray);
}
	// $nombrearray = str_replace("1", " ? ", $nombrearray);
	// $nombrearray = str_replace("2", " ,? ", $nombrearray);
	// $nombrearray = str_replace("3", " ,? ", $nombrearray);
	// $nombrearray = str_replace("4", " ,? ", $nombrearray);
	// $nombrearray = str_replace("5", " ,? ", $nombrearray);
	// $nombrearray = str_replace("6", " ,? ", $nombrearray);
	// $nombrearray = str_replace("7", " ,? ", $nombrearray);
	// $nombrearray = str_replace("8", " ,? ", $nombrearray);
	// $nombrearray = str_replace("9", " ? ", $nombrearray);


echo "estos son los numeros: ";
echo "$nombrearray";
echo "\n";
echo "el valor total es: ";
echo strlen($nombrearray);



///otro forma de mostrar


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prueba 3</title>
</head>
<body>

</body>
</html>