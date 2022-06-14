<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/especie.class.php');
$especie = new especie();

$datos = $especie ->obtenerEspecie($_GET['id_especie']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

