<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/estado.class.php');
$estado = new estado();

$datos = $estado ->obtenerEstado($_GET['id_estado']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

