<?php 	
 echo "ejemplo de ciclo FOR";
 echo "<br>";

	for ($variable=0; $variable < 10 ; $variable++) { 
	 	
	 	echo $variable."<br>";
	}


echo "ciclo WHILE";
echo "<br>";
 	
 	$aumento = 1;

	while($aumento <=10)
	{

		echo "numero".$aumento;
		echo "<br>";
		$aumento++;
	}

echo "ejemplo dos tabla de multiplica de cualquier numero CICLO WHILE";
echo "<br>";
	
	//declaramos variables
	$valor=1;
	$tabla=5;

	while ($valor<=10) 
	{
	
		echo $tabla."x".$valor."=" .$tabla*$valor."<br>";
		$valor++;
	}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>CICLOS</title>
 </head>
 <body>
 
 </body>
 </html>