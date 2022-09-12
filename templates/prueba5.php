<?php 


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<title>Prueba 5</title>
 </head>
 <body>
 	<h3 class="center-block">Tabla de pitagoras</h3>
	<table class="table">
		<thead>
			<tr>
				<th>0</th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
			</tr>
			
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>
	<!-- otra tabla-->
	<label for="">SE MUESTRA LA TABLA CON PHP <b>TABLA PITAGORICA</b></label>
	<table class="table">
		<thead>	
			<tr>
			<?php for($column = 0; $column <= 10; $column++) {?>
				<th><?php echo $column; ?></th>
			<?php }?>
			</tr>
		</thead>
		<tbody>
		<?php for($row = 1; $row <=10; $row++) { ?>
			<tr>			
				<?php for($column = 0; $column <=10; $column++) {
						$result = $column;	

					if ($column === 0){
						$result = $row;
					}
					//creamos otra condicional para hacer la operacion
					if($column >= 1){
						$result = $row * $column;
					}
				?>
				<td><?php echo $result; ?></td>
				<?php } ?>
			</tr>
		<?php }?>
		</tbody>
	</table>
 </body>
 </html>