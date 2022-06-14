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
    require ('../Modelo/tratamiento.class.php');
    $tratamiento = new tratamiento();
    $data = $tratamiento -> obtenerTodos();
    $flagAlert = false;
    if(isset($_GET['agregar']) && $_GET['agregar'] == 'true') {
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Tratamiento agregado con éxito";
        $tipoAlert = "success";
    }elseif(isset($_GET['agregar']) && $_GET['agregar'] == 'false'){
        $flagAlert = true;
        $msg = "<STRONG> ERROR! </strong> No se ha podido agregar el tratamiento";
        $tipoAlert = "danger";
    }elseif(isset($_GET['editar']) && $_GET['editar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Tratamiento modificado exitosamente";
        $tipoAlert = "info";
    }elseif(isset($_GET['eliminar']) && $_GET['eliminar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> BORRADO! </strong> Tratamiento eliminado con éxito";
        $tipoAlert = "warning";
    }
    
    include('header.inc');
?>
<script>
    $(document).ready(function(){
        $('#tablaTratamientos').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".editar").click(function() {
            $.ajax({
                url: "../Controlador/ajax/datosTratamiento.php?id_tratamiento="+this.id,
                type: "GET",
                success: function(data) {
                    //alert(data);
                    var result = $.parseJSON(data);
                    $("#id_tratamiento").val(result.id_tratamiento);
                    $("#tratamiento").val(result.tratamiento);
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
                <h2><i>Tratamientos</i></h2>
                <br>
                <table id="tablaTratamientos" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Tratamiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Tratamiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach($data AS $value) {
                            echo "<tr>";
                            echo "<td>".$value['id_tratamiento']."</td>";
                            echo "<td>".$value['tratamiento']."</td>";
                            echo "<td><a href='#' class='editar' id='".$value['id_tratamiento']."' ><img src='img/editar_pro.png' width='24' height='24' /></a></td>";
                            echo "<td><a href='../Controlador/tratamiento.php?accion=eliminar&id_tratamiento=".$value['id_tratamiento']."' ><img src='img/eliminar_pro.png' width='24' height='24' /></a> </td>";
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
                <h3><i>Nuevo Tratamiento</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="../Controlador/tratamiento.php" method="POST">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="id_tratamiento" id="id_tratamiento" value="">
                    <div class="form-group">
                        <label for="tratamiento"> Nombre:</label>
                        <input type="text" class="form-control" id="tratamiento" name="tratamiento" required>
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
