<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/patio.class.php');
$patio = new patio();

$datos = $patio ->obtenerPatio($_GET['id_patio']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

