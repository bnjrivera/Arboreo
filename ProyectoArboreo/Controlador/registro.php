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
    require('../Modelo/registro.class.php');
    $registro = new registro();
 
    if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
        if($registro -> eliminar($_GET['n_registro'])){
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?eliminar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?eliminar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
        if($registro -> agregar($_POST['id_patio'], $_POST['id_especie'], $_POST['longitud'], $_POST['latitud'], $_POST['id_propiedad'], $_POST['id_estado'], $_POST['dap_cm'], $_POST['altura_m'], $_POST['radio_m'], $_POST['id_tipopoda'], $_POST['id_tratamiento'], $_POST['id_observaciones'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?agregar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?agregar=false');
            exit;
        }
    }elseif(isset($_POST['accion']) && $_POST['accion'] == 'editar') {
        if($registro -> modificar($_POST['n_registro'], $_POST['id_registro'], $_POST['id_patio'], $_POST['id_especie'], $_POST['longitud'], $_POST['latitud'], $_POST['id_propiedad'], $_POST['id_estado'], $_POST['dap_cm'], $_POST['altura_m'], $_POST['radio_m'], $_POST['id_tipopoda'], $_POST['id_tratamiento'], $_POST['id_observaciones'])) {
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?editar=true');
            exit;
        }else{
            header('Location: http://localhost/ProyectoArboreo/Vista/registros.php?editar=false');
            exit;
        }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

