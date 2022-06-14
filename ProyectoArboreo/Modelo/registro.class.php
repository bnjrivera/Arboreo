<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro
 *
 * @author cetecom
 */
class registro {
    
    function obtenerTodos() {
        global $gbd;
        $sql = "SELECT A.n_registro, A.id_registro, B.n_patio, C.nom_comun, A.longitud, A.latitud, D.propiedad, E.estado, A.dap_cm, A.altura_m, A.radio_m, F.tipo_poda, G.tratamiento, H.observaciones "
                . "FROM registro A "
                . "INNER JOIN patio B ON A.id_patio = B.id_patio "
                . "INNER JOIN especie C ON A.id_especie = C.id_especie "
                . "INNER JOIN propiedad D ON A.id_propiedad = D.id_propiedad "
                . "INNER JOIN estado E ON A.id_estado = E.id_estado "
                . "INNER JOIN tipo_poda F ON A.id_tipopoda = F.id_tipopoda "
                . "INNER JOIN tratamiento G ON A.id_tratamiento = G.id_tratamiento "
                . "INNER JOIN observaciones H ON A.id_observaciones = H.id_observaciones "
                . "ORDER BY A.n_registro";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function listarArboles($id_patio, $id_estado) {
        global $gbd;
        $sql = "SELECT A.n_registro, A.id_registro, B.n_patio, C.nom_comun, A.longitud, A.latitud, D.propiedad, E.estado, A.dap_cm, A.altura_m, A.radio_m, F.tipo_poda, G.tratamiento, H.observaciones "
                . "FROM registro A "
                . "INNER JOIN patio B ON A.id_patio = B.id_patio "
                . "INNER JOIN especie C ON A.id_especie = C.id_especie "
                . "INNER JOIN propiedad D ON A.id_propiedad = D.id_propiedad "
                . "INNER JOIN estado E ON A.id_estado = E.id_estado "
                . "INNER JOIN tipo_poda F ON A.id_tipopoda = F.id_tipopoda "
                . "INNER JOIN tratamiento G ON A.id_tratamiento = G.id_tratamiento "
                . "INNER JOIN observaciones H ON A.id_observaciones = H.id_observaciones "
                . "WHERE A.id_patio=:id_patio AND A.id_estado=:id_estado "
                . "ORDER BY A.n_registro";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_patio' => $id_patio,
                                ':id_estado' => $id_estado ) )) {
            $row = $res -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function agregar($id_patio, $id_especie, $longitud, $latitud, $id_propiedad, $id_estado, $dap_cm, $altura_m, $radio_m, $id_tipopoda, $id_tratamiento, $id_observaciones) {
        global $gbd;
        $sql = "INSERT INTO registro (id_registro, id_patio, id_especie, longitud, latitud, id_propiedad, id_estado, dap_cm, altura_m, radio_m, id_tipopoda, id_tratamiento, id_observaciones) "
                . "VALUES (CONCAT(:id_especie, '_', :id_patio, '_'), "
                . ":id_patio, :id_especie, :longitud, :latitud, :id_propiedad, :id_estado, :dap_cm, :altura_m, :radio_m, :id_tipopoda, :id_tratamiento, :id_observaciones)";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':id_patio' => $id_patio,
                                ':id_especie' => $id_especie,
                                ':longitud' => $longitud,
                                ':latitud' => $latitud, 
                                ':id_propiedad' => $id_propiedad,
                                ':id_estado' => $id_estado,
                                ':dap_cm' => $dap_cm,
                                ':altura_m' => $altura_m,
                                ':radio_m' => $radio_m,
                                ':id_tipopoda' => $id_tipopoda,
                                ':id_tratamiento' => $id_tratamiento,
                                ':id_observaciones' => $id_observaciones ) )) {
            return true;
        }else{
            return false;
        } 
    }
    
    function obtenerLastId() {
        global $gbd;
        $sql = "SELECT n_registro FROM registro ORDER BY n_registro DESC LIMIT 1";
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            echo $row;
        }
    }
    
    function eliminar($n_registro) {
        global $gbd;
        $sql = "DELETE FROM registro WHERE n_registro=:n_registro";
        $res = $gbd -> prepare($sql);
        if($res -> execute(array(':n_registro' => $n_registro ))) {
            return true;
        }else{
            return false;
        }
    }
    
    function obtenerRegistro($n_registro) {
        global $gbd;
        $sql = "SELECT * FROM registro WHERE n_registro=".$n_registro;
        $res = $gbd -> query($sql);
        if($res) {
            $row = $res -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }else{
            return false;
        }
    }
    
    function modificar($n_registro, $id_registro, $id_patio, $id_especie, $longitud, $latitud, $id_propiedad, $id_estado, $dap_cm, $altura_m, $radio_m, $id_tipopoda, $id_tratamiento, $id_observaciones) {
        global $gbd;
        $datos = array();
        $sql = "UPDATE registro SET id_patio=:id_patio, id_especie=:id_especie, longitud=:longitud, latitud=:latitud, id_propiedad=:id_propiedad, id_estado=:id_estado, dap_cm=:dap_cm, altura_m=:altura_m, radio_m=:radio_m, id_tipopoda=:id_tipopoda, id_tratamiento=:id_tratamiento, id_observaciones=:id_observaciones WHERE n_registro=:n_registro AND id_registro=:id_registro";
        $datos[':id_patio'] = $id_patio;
        $datos[':id_especie'] = $id_especie;
        $datos[':longitud'] = $longitud;
        $datos[':latitud'] = $latitud;
        $datos[':id_propiedad'] = $id_propiedad;
        $datos[':id_estado'] = $id_estado;
        $datos[':dap_cm'] = $dap_cm;
        $datos[':altura_m'] = $altura_m;
        $datos[':radio_m'] = $radio_m;
        $datos[':id_tipopoda'] = $id_tipopoda;
        $datos[':id_tratamiento'] = $id_tratamiento;
        $datos[':id_observaciones'] = $id_observaciones;
        $datos[':n_registro'] = $n_registro;
        $datos[':id_registro'] = $id_registro;
        $res = $gbd -> prepare($sql);
        if($res->execute($datos)) {
            return true;
        }else{
            return false;
        }
    }
}
