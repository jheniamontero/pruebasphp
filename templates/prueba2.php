<?php 
	//aqui realizaremos la siguiente operacion
	$objeto =[ [
				"Identificacion" => "1121933490",
				"Nombre de la persona" => "Yesenia",
				"Edad de la persona" => "26 ",
				"Profesion" => "estudiante ing. informatica",
				"Semestre" => "1mer semestre",
			 ],
			 [

			 	"Identificacion" => "1121933490",
				"Nombre de la persona" => "Yesenia",
				"Edad de la persona" => "26 ",
				"Profesion" => "estudiante ing. informatica",
				"Semestre" => "1mer semestre"

			]
		];

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<title>prueba 2</title>
 </head>
 <body>
 	 <table class="table datatable">
	<thead>
		<tr>
			<td>Identificacion</td>
			<td>Nombres</td>
			<td>Edad</td>
			<td>Profesion</td>
			<td>Semestre</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($objeto as $valores) { 
		 echo "<tr>";
		 foreach ($valores as $datostabla) {
				echo "<td> $datostabla </td>";
			
		}
		echo "</tr>";
	   }?>

	</tbody>
</table>
 </body>
 </html>