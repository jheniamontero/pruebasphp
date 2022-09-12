<?php
include('conexionPHP.php');
    $datosUser = "SELECT id, description, price,stock, created_at, updated_at FROM products";
    header("Expires: 0");
    header("Pragma: public");
    $filename = "datos-usuario.xls";
    header("Content-Type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=$filename");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>

<!--Generar excel con php datos de tabla bases de datos -->
<table class="table table-bordered datatable">
        <caption>Datos Usuario</caption>
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