<?php 
    #include("/phps/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>T.U.P.A. - MDPP</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
   <!-- <link rel="stylesheet" type="text/css" href="css/reset.css"/>-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(){
            /*alert("jquery esta listo");*/
            /*alert($("#ingerencia").val());*/
            $( "#ingerencia" ).load( "phps/gerencias.php" );
            $( "#ingerencia" ).change(function(){
                var id = $("#ingerencia").val();
                $.get("phps/procedimientos.php",{param_id:id})
                .done(function(data){
                    $("#inProcedimiento").html(data);
                })
            })
            $( "#inProcedimiento" ).change(function(){
                var id   = $("#ingerencia").val();
                var proc = $("#inProcedimiento").val();
                $.get("phps/subprocedimientos.php",{param_id:id,param_proc:proc})
                .done(function(data){
                    $("#inSubproce").html(data);
                })
            })
            $( "#inSubproce" ).change(function(){
                var id   = $("#ingerencia").val();
                var proc = $("#inProcedimiento").val();
                var subp = $("#inSubproce").val();
                $.get("phps/detalle.php",{param_id:id,param_proc:proc,param_sub:subp})
                .done(function(data){
                    $("#detalles").html(data);
                })
            })
        })
    </script>
</head>
<body>
  <h1>T.U.P.A VIGENTE - Municipalidad Distrital de Puente Piedra</h1>
  <h2>Tr&aacute;mite &Uacute;nico de Procedimientos Administrativos Aprobado con el DA 20-2015</h2>
   <form action="">
    <fieldset>
            <legend>Seleccione una Gerencia :D</legend>
            <label>Gerencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</label>
                <select id="ingerencia">
                </select>
            <hr>
            <label>Procedimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</label>
                <select id="inProcedimiento">
                    <option value="0">- Seleccione su Procedimiento -</option>
                </select>
            <hr>
            <label>Sub_Procedimiento&nbsp;:</label>
                <select id="inSubproce">
                    <option value="0" >- Seleccione su Sub Procedimiento -</option>
                </select>
    </fieldset>
            <hr>
    <fieldset>
        <legend>Detalles solicitados</legend>
        <div id="detalles">
        <!--aqui se muestra los detalles de lo seleccionado-->        
        </div>
    </fieldset>
    </form>
    <footer>
        <p>municipalidad Distrital de Puente Piedra</p>
    </footer>
</body>
</html>
