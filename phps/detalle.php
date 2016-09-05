
   <?php
    include 'conexion.php';
    $idgerenc=intval($_GET['param_id']);
    $idproced=intval($_GET['param_proc']);
    $idsubp=intval($_GET['param_sub']);

    $sql="SELECT * FROM detalle WHERE id_gerencias='$idgerenc' and id_procedimientos='$idproced' and id_subproced='$idsubp' and estado_detalle='1'";
    $resultado= mysqli_query($coneccion,$sql) or die ('Consulta del detalle fallida: '. mysqli_error());
    $fila_cnt=mysqli_num_rows($resultado);
    $contador=0;
    echo "<table>";
    echo "<tr>";
    echo "<td>item</td>";
    echo "<td>Detalles</td>";
    echo "</tr>";
    while($row=mysqli_fetch_array($resultado)){
        $lineanalizar=$row['detalle_tupa'];
        $analizando1=strrpos($lineanalizar,"A.");
        $analizando2=strrpos($lineanalizar,"B.");
        $analizando3=strrpos($lineanalizar,"*");
       # if(($analizando1===false) || ($analizando2===false) || ($analizando3===false)){
        /*if($analizando1===false) {
            $contador=$contador+1;
            echo "<tr>";
            echo '<td>'.$contador.'</td><td> '.utf8_encode($row['detalle_tupa']).'</td>';
            echo "<tr>";
        }else{
            echo "<tr>";
            echo '<td></td>&nbsp;<td> '.utf8_encode($row['detalle_tupa']).'</td>';
            echo "<tr>";
        }*/
        
        $busca1='A.';
        $busca2='B.';
        $busca3='* ';
        $busca4='Notas:';
        $analiz1=strpos($lineanalizar,$busca1);
        $analiz2=strpos($lineanalizar,$busca2);
        $analiz3=strpos($lineanalizar,$busca3);
        $analiz4=strpos($lineanalizar,$busca4);
        if($analiz1!==false){
            echo "<tr>";
            echo '<td></td>&nbsp;<td> '.utf8_encode($row['detalle_tupa']).'</td>';
            echo "<tr>";
        }elseif($analiz2!==false){
            echo "<tr>";
            echo '<td></td>&nbsp;<td> '.utf8_encode($row['detalle_tupa']).'</td>';
            echo "<tr>";
        }elseif($analiz3!==false){
                 echo "<tr>";
                echo '<td></td>&nbsp;<td> '.utf8_encode($row['detalle_tupa']).'</td>';
                echo "<tr>";
        }elseif($analiz4!==false){
                echo "<tr>";
                echo '<td></td>&nbsp;<td> '.utf8_encode($row['detalle_tupa']).'</td>';
                echo "<tr>";
        }else{
             $contador=$contador+1;
            echo "<tr>";
            echo '<td>'.$contador.'</td><td> '.utf8_encode($row['detalle_tupa']).'</td>';
            echo "<tr>";
        }
        
        
    }
    echo "<tr><td>Pagos</td></tr>";
    $sql1="SELECT * FROM pago WHERE id_gerencias='$idgerenc' AND id_procedimientos='$idproced' AND id_subproced='$idsubp'";
    $resultado1=mysqli_query($coneccion,$sql1) or die ('consulta de Pago Fallido: '. mysqli_error());
    while($fila=mysqli_fetch_array($resultado1)){
        echo "<tr><td></td><td>".utf8_encode($fila['detalle_pago'])."</td><td>".$fila['pago_porc']."</td><td>";
            if($fila['pago_valor']==0){
                echo " ".$fila['pago_valor']."</td></tr>";
            }else{
                echo "S/.".$fila['pago_valor']."</td></tr>";
            }
    }
    /*rutina para sacar la clasificacion */
    echo "<tr><td>Calificacion</td></tr>";
    $sql2="SELECT * FROM calificacion WHERE id_gerencias='$idgerenc' AND id_procedimientos='$idproced' AND id_subproced='$idsubp'";
    $resultado2=mysqli_query($coneccion,$sql2) or die ('consulta de la Clasifiacion a Fallado'. mysqli_error());
    while($filas=mysqli_fetch_array($resultado2)){
        $valorCal='Sin casisficar';
        if($filas['calificacion']==1){
            $valorCal='Automatico';
        }
        if($filas['calificacion']==2){
            $valorCal='Positivo';
        }
        if($filas['calificacion']==3){
            $valorCal='Negativo';
        }
        echo "<tr><td>calificacion          : </td><td>".$valorCal."</td></tr>";
        echo "<tr><td>Plazo para Resolver   : </td><td>".$filas['plazo_resolver']." dias Hábiles</td></tr>";
        echo "<tr><td>Inicio del Proceso    : </td><td>".utf8_encode($filas['inicio_procedimiento']).".</td></tr>";
        echo "<tr><td>Autoridad que Resuelve: </td><td>".utf8_encode($filas['resuelve']).".</td></tr>";
    }
    echo "</table>";
?>