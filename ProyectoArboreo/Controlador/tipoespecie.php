<?php
require('../Modelo/sesion.class.php');
$sesion = new sesion();
if(!$sesion -> validar()) {
    header('Location: http://localhost/ProyectoArboreo/Vista/login.php?error=NoHaySesion');
    exit;
} else {
    require('../Modelo/conexion.class.php');
    $db = new conexion();
    $db -> conn();
    require('../Modelo/tipoespecie.class.php');
    $tipo_especie = new tipo_especie();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($tipo_especie -> eliminar($_GET['id_tipoespecie'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($tipo_especie -> agregar($_POST['tipo_especie'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($tipo_especie -> modificar($_POST['id_tipoespecie'], $_POST['tipo_especie'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/tipo_especies.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

