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
    require('../Modelo/especie.class.php');
    $especie = new especie();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($especie -> eliminar($_GET['id_especie'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($especie -> agregar($_POST['nom_comun'], $_POST['nom_cientifico'], $_POST['id_tipoespecie'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($especie -> modificar($_POST['id_especie'], $_POST['nom_comun'], $_POST['nom_cientifico'], $_POST['id_tipoespecie'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/especies.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

