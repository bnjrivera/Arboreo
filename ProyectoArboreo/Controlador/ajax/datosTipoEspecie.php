<?php
require('../../Modelo/conexion.class.php');
$db = new conexion();
$db -> conn();
require('../../Modelo/tipoespecie.class.php');
$tipo_especie = new tipo_especie();

$datos = $tipo_especie ->obtenerTipoEspecie($_GET['id_tipoespecie']);
echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

