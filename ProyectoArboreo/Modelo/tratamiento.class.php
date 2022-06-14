<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tratamiento
 *
 * @author cetecom
 */
class tratamiento {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM tratamiento";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($tratamiento) {
        global $gbd;
        $sql = "INSERT INTO tratamiento (tratamiento) VALUES (:tratamiento)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':tratamiento' => $tratamiento) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_tratamiento) {
        global $gbd;
        $sql = "DELETE FROM tratamiento WHERE id_tratamiento=:id_tratamiento";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_tratamiento' => $id_tratamiento ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerTratamiento($id_tratamiento) {
        global $gbd;
        $sql = "SELECT * FROM tratamiento WHERE id_tratamiento=".$id_tratamiento;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_tratamiento, $tratamiento) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE tratamiento SET tratamiento=:tratamiento WHERE id_tratamiento=:id_tratamiento";
        $datos[':tratamiento'] = $tratamiento;
        $datos[':id_tratamiento'] = $id_tratamiento;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
