<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especie
 *
 * @author cetecom
 */
class especie {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT A.id_especie, A.nom_comun, A.nom_cientifico, A.id_tipoespecie, B.tipo_especie FROM especie A INNER JOIN tipo_especie B ON A.id_tipoespecie = B.id_tipoespecie ";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($nom_comun, $nom_cientifico, $id_tipoespecie) {
        global $gbd;
        $sql = "INSERT INTO especie (id_especie, nom_comun, nom_cientifico, id_tipoespecie) "
                . "VALUES (UPPER(CONCAT(MID(:nom_comun, 1, 3), '_', MID(SUBSTR(:nom_comun FROM (INSTR(:nom_comun, ' ') + 1)), 1, 2))), "
                . ":nom_comun, :nom_cientifico, :id_tipoespecie)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':nom_comun' => $nom_comun,
                                ':nom_cientifico' => $nom_cientifico,
                                ':id_tipoespecie' => $id_tipoespecie ) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function eliminar($id_especie) {
        global $gbd;
        $sql = "DELETE FROM especie WHERE id_especie=:id_especie";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_especie' => $id_especie ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerEspecie($id_especie) {
        global $gbd;
        $sql = "SELECT * FROM especie WHERE id_especie=".$id_especie;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($id_especie, $nom_comun, $nom_cientifico, $id_tipoespecie) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE especie SET nom_comun=:nom_comun, nom_cientifico=:nom_cientifico, id_tipoespecie=:id_tipoespecie WHERE id_especie=:id_especie";
        $datos[':nom_comun'] = $nom_comun;
        $datos[':nom_cientifico'] = $nom_cientifico;
        $datos[':id_tipoespecie'] = $id_tipoespecie;
        $datos[':id_especie'] = $id_especie;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
