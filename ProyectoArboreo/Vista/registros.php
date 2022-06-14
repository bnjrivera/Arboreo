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
    require ('../Modelo/registro.class.php');
    $registro = new registro();
    $data = $registro -> obtenerTodos();
    $flagAlert = false;
    if(isset($_GET['agregar']) && $_GET['agregar'] == 'true') {
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Registro agregado con éxito";
        $tipoAlert = "success";
    }elseif(isset($_GET['agregar']) && $_GET['agregar'] == 'false'){
        $flagAlert = true;
        $msg = "<STRONG> ERROR! </strong> No se ha podido agregar el registro";
        $tipoAlert = "danger";
    }elseif(isset($_GET['editar']) && $_GET['editar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> EXITO! </strong> Registro modificado exitosamente";
        $tipoAlert = "info";
    }elseif(isset($_GET['eliminar']) && $_GET['eliminar'] == 'true'){
        $flagAlert = true;
        $msg = "<STRONG> BORRADO! </strong> Registro eliminado con éxito";
        $tipoAlert = "warning";
    }
    
    include('header.inc');
?>
<script>
    $(document).ready(function(){
        $('#tablaRegistros').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".editar").click(function() {
            $.ajax({
                url: "../Controlador/ajax/datosRegistro.php?n_registro="+this.id,
                type: "GET",
                success: function(data) {
                    //alert(data);
                    var result = $.parseJSON(data);
                    $("#n_registro").val(result.n_registro);
                    $("#id_registro").val(result.id_registro);
                    $("#id_patio").val(result.id_patio);
                    $("#id_especie").val(result.id_especie);
                    $("#longitud").val(result.longitud);
                    $("#latitud").val(result.latitud);
                    $("#id_propiedad").val(result.id_propiedad);
                    $("#id_estado").val(result.id_estado);
                    $("#dap_cm").val(result.dap_cm);
                    $("#altura_m").val(result.altura_m);
                    $("#radio_m").val(result.radio_m);
                    $("#id_tipopoda").val(result.id_tipopoda);
                    $("#id_tratamiento").val(result.id_tratamiento);
                    $("#id_observaciones").val(result.id_observaciones);
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
                <h2><i>Registros</i></h2>
                <br>
                <table id="tablaRegistros" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>ID</th>
                            <th>Patio</th>
                            <th>Especie</th>
                            <th>Longitud</th>
                            <th>Latitud</th>
                            <th>Propiedad</th>
                            <th>Estado</th>
                            <th>Dap (cm)</th>
                            <th>Altura (m)</th>
                            <th>Radio (m)</th>
                            <th>Tipo Poda</th>
                            <th>Tratamiento</th>
                            <th>Observaciones</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>ID</th>
                            <th>Patio</th>
                            <th>Especie</th>
                            <th>Longitud</th>
                            <th>Latitud</th>
                            <th>Propiedad</th>
                            <th>Estado</th>
                            <th>Dap (cm)</th>
                            <th>Altura (m)</th>
                            <th>Radio (m)</th>
                            <th>Tipo Poda</th>
                            <th>Tratamiento</th>
                            <th>Observaciones</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach($data AS $value) {
                            echo "<tr>";
                            echo "<td>".$value['n_registro']."</td>";
                            echo "<td>".$value['id_registro']."</td>";
                            echo "<td>".$value['n_patio']."</td>";
                            echo "<td>".$value['nom_comun']."</td>";
                            echo "<td>".$value['longitud']."</td>";
                            echo "<td>".$value['latitud']."</td>";
                            echo "<td>".$value['propiedad']."</td>";
                            echo "<td>".$value['estado']."</td>";
                            echo "<td>".$value['dap_cm']."</td>";
                            echo "<td>".$value['altura_m']."</td>";
                            echo "<td>".$value['radio_m']."</td>";
                            echo "<td>".$value['tipo_poda']."</td>";
                            echo "<td>".$value['tratamiento']."</td>";
                            echo "<td>".$value['observaciones']."</td>";
                            echo "<td><a href='#' class='editar' id='".$value['n_registro']."' ><img src='img/editar_pro.png' width='24' height='24' /></a></td>";
                            echo "<td><a href='../Controlador/registro.php?accion=eliminar&n_registro=".$value['n_registro']."' ><img src='img/eliminar_pro.png' width='24' height='24' /></a> </td>";
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
                <h3><i>Ingresar Registro</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="../Controlador/registro.php" method="POST">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="n_registro" id="n_registro" value="">
                    <input type="hidden" name="id_registro" id="id_registro" value="">
                    <div class="form-group">
                        <label for="id_patio"> Patio:</label>
                        <select class="form-control" name="id_patio" id="id_patio">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM patio";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_patio']."'>".$row['n_patio']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="id_especie"> Especie:</label>
                        <select class="form-control" name="id_especie" id="id_especie">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM especie";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_especie']."'>".$row['nom_comun']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="longitud"> Longitud:</label>
                        <input type="text" class="form-control" id="longitud" name="longitud" required>
                    </div><br>
                    <div class="form-group">
                        <label for="latitud"> Latitud:</label>
                        <input type="text" class="form-control" id="latitud" name="latitud" required>
                    </div><br>
                    <div class="form-group">
                        <label for="id_propiedad"> Tipo de Propiedad:</label>
                        <select class="form-control" name="id_propiedad" id="id_propiedad">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM propiedad";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_propiedad']."'>".$row['propiedad']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="id_estado"> Estado:</label>
                        <select class="form-control" name="id_estado" id="id_estado">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM estado";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_estado']."'>".$row['estado']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="dap_cm"> Dap (cm):</label>
                        <input type="number" class="form-control" id="dap_cm" name="dap_cm" required>
                    </div><br>
                    <div class="form-group">
                        <label for="altura_m"> Altura (m):</label>
                        <input type="number" class="form-control" id="altura_m" name="altura_m" required>
                    </div><br>
                    <div class="form-group">
                        <label for="radio_m"> Radio (m):</label>
                        <input type="number" class="form-control" id="radio_m" name="radio_m" required>
                    </div><br>
                    <div class="form-group">
                        <label for="id_tipopoda"> Tipo de Poda:</label>
                        <select class="form-control" name="id_tipopoda" id="id_tipopoda">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM tipo_poda";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_tipopoda']."'>".$row['tipo_poda']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="id_tratamiento"> Tratamiento:</label>
                        <select class="form-control" name="id_tratamiento" id="id_tratamiento">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM tratamiento";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_tratamiento']."'>".$row['tratamiento']."</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="id_observaciones"> Observaciones:</label>
                        <select class="form-control" name="id_observaciones" id="id_observaciones">
                            <?php
                            global $gbd;
                            $sql = "SELECT * FROM observaciones";
                            $res = $gbd -> query($sql);
                            while ($row = $res -> fetch(PDO::FETCH_ASSOC)) {                                                
                                echo "<option value='".$row['id_observaciones']."'>".$row['observaciones']."</option>";
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
