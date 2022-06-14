<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
        @media print
        {
            .noprint {display:none;}
        }

        @media screen
        {
        }
        </style>
    </head>
    <body>
        <div class="noprint">
        <?php
        // put your code here
        require ('../Modelo/conexion.class.php');
        $db = new conexion();
        $db -> conn();
        require ('../Modelo/registro.class.php');
        $registro = new registro();
        $dataLista = $registro -> obtenerTodos();
        $flagAlert = false;
        if(isset($_GET['id_patio']) && isset($_GET['id_estado'])) {
            $flagAlert = true;
            $msg = "<STRONG> EXITO! </strong> Lista de Arboles actualizada";
            $tipoAlert = "success";
            $dataLista = $registro -> listarArboles($_GET['id_patio'], $_GET['id_estado']);
        }elseif(!isset($_GET['id_patio']) && isset($_GET['id_estado'])){
            $flagAlert = true;
            $msg = "<STRONG> ERROR! </strong> No se ha podido agregar el registro";
            $tipoAlert = "danger";
        }
    
        include('header.inc');
        ?>
        <br>
        </div>
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
                <h2><i><b>Lista de Árboles</b></i></h2>
                <br>
                <hr>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10 noprint">
                <a style="float: right" class="glyphicon glyphicon-print" href="javascript:window.print()"> Imprimir</a><br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><b>Filtros:</b></h4>
                        <br>
                        <form class="form-inline" action="ListaDeArboles.php" method="GET">
                        <input type="hidden" name="accion" id="accion" value="listar">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_patio"> Patio: </label>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_estado"> Estado:</label><br>
                                <div class="radio" >
                                    <?php
                                    global $gbd;
                                    $sql = "SELECT * FROM estado";
                                    $res = $gbd -> query($sql);
                                    while ($row = $res -> fetch(PDO::FETCH_ASSOC)) { 
                                        echo "<label><input type='radio' class='form-control' name='id_estado' id='id_estado' value='".$row['id_estado']."'>  ".$row['estado']."</label><br>";
                                    }
                                ?>
                                </div>
                            </div><br>
                        </div>
                        <br>
                    <button type="submit" style="float: right" class="btn btn-info">Filtrar</button>
                    <a href="ListaDeArboles.php" class="stretched-link"> Reestablecer Filtros</a>
                        </form>
                    </div>
                </div>    
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-12">
                <hr>
                <span><h4><i>Mostrando <?php echo count($dataLista) ?> resultados...</i></h4></span><br>
            </div>
            
                <?php foreach($dataLista AS $value) { ?>
            <div class="col-md-4">
                <?php if ($value['estado'] == 'Bueno') { ?>
                <div class="panel panel-success">
                <?php } elseif ($value['estado'] == 'Regular') { ?>
                    <div class="panel panel-warning">
                <?php } elseif ($value['estado'] == 'Malo') { ?>
                    <div class="panel panel-danger">
                <?php } ?>            
                    <div class="panel-heading"><b><?php echo $value['nom_comun'] ?></b></div>
                    <div class="panel-body">
                <?php
                            echo "<h5><i><b>ID:</i></b>  ".$value['id_registro']."</h5>";
                            echo "<h5><i><b>Patio:</i></b>  ".$value['n_patio']."</h5>";
                            echo "<h5><i><b>Longitud:</i></b>  ".$value['longitud']."</h5>";
                            echo "<h5><i><b>Latitud:</i></b>  ".$value['latitud']."</h5>";
                            echo "<h5><i><b>Propiedad:</i></b>  ".$value['propiedad']."</h5>";
                            echo "<h5><i><b>Estado:</i></b>  ".$value['estado']."</h5>";
                            echo "<h5><i><b>Dap:</i></b>  ".$value['dap_cm']." cm.</h5>";
                            echo "<h5><i><b>Altura:</i></b>  ".$value['altura_m']." m.</h5>";
                            echo "<h5><i><b>Radio:</i></b>  ".$value['radio_m']." m.</h5>";
                            echo "<h5><i><b>Tipo Poda:</i></b>  ".$value['tipo_poda']."</h5>";
                            echo "<h5><i><b>Tratamiento:</i></b>  ".$value['tratamiento']."</h5>";
                            echo "<h5><i><b>Observaciones:</i></b>  ".$value['observaciones']."</h5>";
                            echo "<a class='glyphicon glyphicon-eye-open noprint' href='https://www.mapillary.com/app/?lat=".$value['latitud']."&lng=".$value['longitud']."&z=20'> Ver en Mapillary</a>";
                            ?>
                    </div>
                </div>
            </div>
                    <?php } ?>
        </div>
            <br>
            <?php
                include('footer.inc');
            
            ?>
    </body>
</html>

