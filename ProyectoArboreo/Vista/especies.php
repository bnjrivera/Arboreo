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
    require ('../Modelo/especie.class.php');
    $especie = new especie();
    $data = $especie -> obtenerTodos();
    $flagAlert = false;
    if(isset($_GET['agregar']) && $_GET['agregar'] == 'true') {
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Especie agregada con éxito";
        $tipoAlert = "success";
    }elseif(isset($_GET['agregar']) && $_GET['agregar'] == 'false'){
        $flagAlert = true;
        $msg = "<STRONG> ERROR! </strong> No se ha podido agregar la especie";
        $tipoAlert = "danger";
    }elseif(isset($_GET['editar']) && $_GET['editar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Especie modificada exitosamente";
        $tipoAlert = "info";
    }elseif(isset($_GET['eliminar']) && $_GET['eliminar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> BORRADO! </strong> Especie eliminada con éxito";
        $tipoAlert = "warning";
    }
    
    include('header.inc');
?>
<script>
    $(document).ready(function(){
        $('#tablaEspecies').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".editar").click(function() {
            $.ajax({
                url: "../Controlador/ajax/datosEspecie.php?id_especie="+this.id,
                type: "GET",
                success: function(data) {
                    //alert(data);
                    var result = $.parseJSON(data);
                    $("#id_especie").val(result.id_especie);
                    $("#nom_comun").val(result.nom_comun);
                    $("#nom_cientifico").val(result.nom_cientifico);
                    $("#id_tipoespecie").val(result.id_tipoespecie);
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
                <h2><i>Especies</i></h2>
                <br>
                <table id="tablaEspecies" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Común</th>
                            <th>Nombre Científico</th>
                            <th>Tipo de Especie</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Común</th>
                            <th>Nombre Científico</th>
                            <th>Tipo de Especie</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach($data AS $value) {
                            echo "<tr>";
                            echo "<td>".$value['id_especie']."</td>";
                            echo "<td>".$value['nom_comun']."</td>";
                            echo "<td>".$value['nom_cientifico']."</td>";
                            echo "<td>".$value['tipo_especie']."</td>";
                            echo "<td><a href='#' class='editar' id='".$value['id_especie']."' ><img src='img/editar_pro.png' width='24' height='24' /></a></td>";
                            echo "<td><a href='../Controlador/especie.php?accion=eliminar&id_especie=".$value['id_especie']."' ><img src='img/eliminar_pro.png' width='24' height='24' /></a> </td>";
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
                <h3><i>Nueva Especie</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="../Controlador/especie.php" method="POST">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="id_especie" id="id_especie" value="">
                    <div class="form-group">
                        <label for="nom_comun"> Nombre Común:</label>
                        <input type="text" class="form-control" id="nom_comun" name="nom_comun" required>
                    </div><br>
                    <div class="form-group">
                        <label for="nom_cientifico"> Nombre Científico:</label>
                        <input type="text" class="form-control" id="nom_cientifico" name="nom_cientifico">
                    </div><br>
                    <div class="form-group">
                        <label for="id_tipoespecie"> Tipo de Especie:</label>
                        <select class="form-control" name="id_tipoespecie" id="id_tipoespecie">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM tipo_especie";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_tipoespecie']."'>".$row['tipo_especie']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
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
