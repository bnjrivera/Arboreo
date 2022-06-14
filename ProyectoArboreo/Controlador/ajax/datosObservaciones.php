<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/observaciones.class.php');
$observaciones = new observaciones();

$datos = $observaciones ->obtenerObservaciones($_GET['id_observaciones']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

