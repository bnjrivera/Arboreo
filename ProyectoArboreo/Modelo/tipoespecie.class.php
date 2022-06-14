<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoespecie
 *
 * @author cetecom
 */
class tipo_especie {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT * FROM tipo_especie";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($tipo_especie) {
        global $gbd;
        $sql = "INSERT INTO tipo_especie (tipo_especie) VALUES (:tipo_especie)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':tipo_especie' => $tipo_especie) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_tipoespecie) {
        global $gbd;
        $sql = "DELETE FROM tipo_especie WHERE id_tipoespecie=:id_tipoespecie";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_tipoespecie' => $id_tipoespecie ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerTipoEspecie($id_tipoespecie) {
        global $gbd;
        $sql = "SELECT * FROM tipo_especie WHERE id_tipoespecie=".$id_tipoespecie;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_tipoespecie, $tipo_especie) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE tipo_especie SET tipo_especie=:tipo_especie WHERE id_tipoespecie=:id_tipoespecie";
        $datos[':tipo_especie'] = $tipo_especie;
        $datos[':id_tipoespecie'] = $id_tipoespecie;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
