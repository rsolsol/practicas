<option value="0">-Seleccione su Gerencia-</option>
<?php
  
   include 'conexion.php';
   $sql='SELECT * FROM gerencias WHERE activacion > 0 ';
   $resultado= mysqli_query($coneccion,$sql) or die ('Consulta fallida: '. mysqli_error());
   while($row=mysqli_fetch_array($resultado)){
        echo '<option value="'.$row['id_gerencias'].'">'.$row['gerencia_dependencia'].'</option>';
   }
   
?>