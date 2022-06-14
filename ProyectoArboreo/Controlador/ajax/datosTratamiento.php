<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/tratamiento.class.php');
$tratamiento = new tratamiento();

$datos = $tratamiento ->obtenerTratamiento($_GET['id_tratamiento']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

