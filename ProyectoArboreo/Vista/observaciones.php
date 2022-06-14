<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require ('../Modelo/sesion.class.php');
$sesion = new sesion();
if (!$sesion -> validar()) {
    header('Location: http://localhost/ProyectoArboreo/Vista/login.php?error=NoHaySesion');
    exit;
} else {
    require ('../Modelo/conexion.class.php');
    $db = new conexion();
    $db -> conn();
    require ('../Modelo/observaciones.class.php');
    $observaciones = new observaciones();
    $data = $observaciones -> obtenerTodos();
    $flagAlert = false;
    if(isset($_GET['agregar']) && $_GET['agregar'] == 'true') {
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Observación agregada con éxito";
        $tipoAlert = "success";
    }elseif(isset($_GET['agregar']) && $_GET['agregar'] == 'false'){
        $flagAlert = true;
        $msg = "<STRONG> ERROR! </strong> No se ha podido agregar la observación";
        $tipoAlert = "danger";
    }elseif(isset($_GET['editar']) && $_GET['editar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Observación modificada exitosamente";
        $tipoAlert = "info";
    }elseif(isset($_GET['eliminar']) && $_GET['eliminar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> BORRADO! </strong> Observación eliminada con éxito";
        $tipoAlert = "warning";
    }
    
    include('header.inc');
?>
<script>
    $(document).ready(function(){
        $('#tablaObservaciones').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".editar").click(function() {
            $.ajax({
                url: "../Controlador/ajax/datosObservaciones.php?id_observaciones="+this.id,
                type: "GET",
                success: function(data) {
                    //alert(data);
                    var result = $.parseJSON(data);
                    $("#id_observaciones").val(result.id_observaciones);
                    $("#observaciones").val(result.observaciones);
                    $("#accion").val("editar");
                }
            });
        });
    });
</script>
    <div class="container"> 
        <?php 
        if($flagAlert) { ?>
            <div class="row">
                <div class="alert alert-<?php echo $tipoAlert; ?> alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $msg; ?>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2><i>Observaciones</i></h2>
                <br>
                <table id="tablaObservaciones" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Observación</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Observación</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach($data AS $value) {
                            echo "<tr>";
                            echo "<td>".$value['id_observaciones']."</td>";
                            echo "<td>".$value['observaciones']."</td>";
                            echo "<td><a href='#' class='editar' id='".$value['id_observaciones']."' ><img src='img/editar_pro.png' width='24' height='24' /></a></td>";
                            echo "<td><a href='../Controlador/observaciones.php?accion=eliminar&id_observaciones=".$value['id_observaciones']."' ><img src='img/eliminar_pro.png' width='24' height='24' /></a> </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h3><i>Nueva Observación</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="../Controlador/observaciones.php" method="POST">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="id_observaciones" id="id_observaciones" value="">
                    <div class="form-group">
                        <label for="observaciones"> Nombre:</label>
                        <input type="text" class="form-control" id="observaciones" name="observaciones" required>
                    </div>&nbsp&nbsp&nbsp;
                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>
    </div>
<?php
    include('footer.inc');
}
?>
