<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of propiedad
 *
 * @author cetecom
 */
class propiedad {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM propiedad";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($propiedad) {
        global $gbd;
        $sql = "INSERT INTO propiedad (propiedad) VALUES (:propiedad)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':propiedad' => $propiedad) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_propiedad) {
        global $gbd;
        $sql = "DELETE FROM propiedad WHERE id_propiedad=:id_propiedad";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_propiedad' => $id_propiedad ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerPropiedad($id_propiedad) {
        global $gbd;
        $sql = "SELECT * FROM propiedad WHERE id_propiedad=".$id_propiedad;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_propiedad, $propiedad) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE propiedad SET propiedad=:propiedad WHERE id_propiedad=:id_propiedad";
        $datos[':propiedad'] = $propiedad;
        $datos[':id_propiedad'] = $id_propiedad;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
