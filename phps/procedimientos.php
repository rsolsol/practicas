<option value="0">- Seleccione su Procedimiento -</option>
<?php
    include 'conexion.php';
    $idgerenc=intval($_GET['param_id']);
    $sql="SELECT * FROM procedimientos WHERE id_gerencias='$idgerenc'";
    $resultado= mysqli_query($coneccion,$sql) or die ('Consulta fallida: '. mysqli_error());
    while($row=mysqli_fetch_array($resultado)){
        echo '<option value="'.$row['id_procedimientos'].'">'.utf8_encode($row['detalles_proced']).'</option>';
    }
   
?>
        