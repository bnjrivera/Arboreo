<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-search@2.3.6/dist/leaflet-search.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@2.3.6/dist/leaflet-search.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.1.0/leaflet.markercluster.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.1.0/MarkerCluster.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.1.0/MarkerCluster.Default.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.4.2/Control.FullScreen.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.4.2/Control.FullScreen.min.css"/>
    </head>
    <body>
        <?php
        // put your code here
        require ('../Modelo/conexion.class.php');
        $db = new conexion();
        $db -> conn();
        require ('../Modelo/registro.class.php');
        $registro = new registro();
        $dataLista = $registro -> obtenerTodos();
        $flagAlert = false;
    
        include('header.inc');
        ?>
        <br>
        <div class="container"> 
        <?php 
        if($flagAlert) { ?>
            <div class="row">
                <div class="alert alert-<?php echo $tipoAlert; ?> alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $msg; ?>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2><i><b>Mapa de Visualización</b></i></h2>
                <br>
                <span>En esta página, usted podrá observar un plano aéreo del Cementerio General con múltiples puntos donde están situados los árboles. Al seleccionar cualquiera de esos puntos, se mostrará información relevante del árbol, su especie y su tratamiento de cuidado. Estos íconos están categorizados según el estado de gravedad de cada árbol.</span>
                <hr>
            </div>
        </div>
        <div class="row">
            <div id="mapid" style="height: 700px;" class="col-md-12">
            <script>    
                var mymap = L.map('mapid').setView([-33.412846, -70.648516], 16);
                
                var mapaSatelite = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, <a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>',
                    maxZoom: 22
                }).addTo(mymap);
                
                var mapaCalle = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, <a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>',
                    maxZoom: 22
                }).addTo(mymap);
                
                L.control.fullscreen({
                    position: 'topright',
                    title: 'Pantalla Completa',
                    titleCancel: 'Salir',
                    forceSeparateButton: true,
                }).addTo(mymap);
                mymap.on('enterFullscreen', function(){
                    console.log('entered fullscreen');
                });
                
                var ArbolIcono = L.Icon.extend({
                    options: {
                        shadowUrl: 'img/arbolsombra.png',
                        iconSize:     [28, 55],
                        shadowSize:   [32, 34],
                        iconAnchor:   [13, 56],
                        shadowAnchor: [0, 36],
                        popupAnchor:  [0, -65]
                    }
                });
                
                var arbolBueno = new ArbolIcono({iconUrl: 'img/arbolbueno.png'}),
                    arbolRegular = new ArbolIcono({iconUrl: 'img/arbolregular.png'}),
                    arbolMalo = new ArbolIcono({iconUrl: 'img/arbolmalo.png'});
            
                var polyCementerioCatolico = L.polygon([
                    [-33.413032, -70.6394021],
                    [-33.4129117, -70.6394358],
                    [-33.4128086, -70.6392486],
                    [-33.4122333, -70.6395106],
                    [-33.4117895, -70.6397556],
                    [-33.411118, -70.6401264],
                    [-33.4099086, -70.6430529],
                    [-33.4121646, -70.6432077],
                    [-33.4133399, -70.6432718],
                    [-33.4133328, -70.6433704],
                    [-33.41333, -70.6434013],
                    [-33.4139315, -70.6434216],
                    [-33.414036, -70.6409248],
                    [-33.4139635, -70.6405814],
                    [-33.4135495, -70.6405905],
                    [-33.4135313, -70.6403674],
                    [-33.4131825, -70.6404172],
                    [-33.413032, -70.6394021]
                ]).addTo(mymap);
                var polyPiedraVerde = L.polygon([
                    [-33.4131105, -70.6480499],
                    [-33.4133798, -70.6481096],
                    [-33.4133923, -70.6480288],
                    [-33.4134211, -70.6480352],
                    [-33.4134356, -70.6479412],
                    [-33.4134086, -70.6479353],
                    [-33.41342, -70.6478617],
                    [-33.4131489, -70.6478016],
                    [-33.4131105, -70.6480499]
                ]).addTo(mymap);
                var CementerioGeneral = L.polygon([
                    [-33.4141077, -70.6437883],
                    [-33.4138521, -70.6438046],
                    [-33.4125492, -70.6437686],
                    [-33.4125189, -70.6449589],
                    [-33.4106806, -70.6448382],
                    [-33.4090137, -70.6447369],
                    [-33.4085241, -70.6469861],
                    [-33.4079281, -70.6498121],
                    [-33.4075335, -70.6517403],
                    [-33.4072383, -70.6531646],
                    [-33.4081327, -70.6531438],
                    [-33.4084699, -70.6531403],
                    [-33.409417, -70.6531548],
                    [-33.4096002, -70.6532699],
                    [-33.409601, -70.6535062],
                    [-33.4112772, -70.6535158],
                    [-33.4112654, -70.6527348],
                    [-33.4128434, -70.6527055],
                    [-33.4151684, -70.6526794],
                    [-33.4174544, -70.652693],
                    [-33.4174691, -70.6517996],
                    [-33.4176396, -70.6505497],
                    [-33.4176711, -70.6505529],
                    [-33.4176804, -70.6505467],
                    [-33.4177108, -70.6505086],
                    [-33.4177309, -70.6503611],
                    [-33.4177108, -70.6503316],
                    [-33.4177264, -70.6502109],
                    [-33.4177645, -70.6501867],
                    [-33.4177883, -70.6500297],
                    [-33.41776, -70.649999],
                    [-33.4177757, -70.649889],
                    [-33.4178025, -70.6498675],
                    [-33.4178294, -70.6497066],
                    [-33.4178137, -70.6496798],
                    [-33.4177938, -70.6496777],
                    [-33.4179975, -70.6484317],
                    [-33.4175111, -70.6474619],
                    [-33.4171371, -70.646853],
                    [-33.4165576, -70.6457958],
                    [-33.4163836, -70.6453493],
                    [-33.4163259, -70.6452286],
                    [-33.4162446, -70.6446046],
                    [-33.4162594, -70.6445157],
                    [-33.4162571, -70.6445049],
                    [-33.4161581, -70.6439057],
                    [-33.4141077, -70.6437883]
                ]).addTo(mymap);
                
                var macro = new L.GeoJSON({'generator': 'overpass-ide', 'timestamp': '2019-12-23T19:49:02Z', 'features': [{'id': 'way/33972899', 'geometry': {'coordinates': [[[-70.6394021, -33.413032], [-70.6394358, -33.4129117], [-70.6392486, -33.4128086], [-70.6395106, -33.4122333], [-70.6397556, -33.4117895], [-70.6401264, -33.411118], [-70.6430529, -33.4099086], [-70.6432077, -33.4121646], [-70.6432718, -33.4133399], [-70.6433704, -33.4133328], [-70.6434013, -33.41333], [-70.6434216, -33.4139315], [-70.6409248, -33.414036], [-70.6405814, -33.4139635], [-70.6405905, -33.4135495], [-70.6403674, -33.4135313], [-70.6404172, -33.4131825], [-70.6394021, -33.413032]]], 'type': 'Polygon'}, 'properties': {'name': 'Cementerio Católico', 'name:en': 'Catholic Cementary', '@id': 'way/33972899', 'landuse': 'cemetery'}, 'type': 'Feature'}, {'id': 'way/180645139', 'geometry': {'coordinates': [[[-70.6480499, -33.4131105], [-70.6481096, -33.4133798], [-70.6480288, -33.4133923], [-70.6480352, -33.4134211], [-70.6479412, -33.4134356], [-70.6479353, -33.4134086], [-70.6478617, -33.41342], [-70.6478016, -33.4131489], [-70.6480499, -33.4131105]]], 'type': 'Polygon'}, 'properties': {'name': 'Piedra Verde', '@id': 'way/180645139', 'landuse': 'cemetery', 'building': 'yes'}, 'type': 'Feature'}, {'id': 'way/197839099', 'geometry': {'coordinates': [[[-70.6437883, -33.4141077], [-70.6438046, -33.4138521], [-70.6437686, -33.4125492], [-70.6449589, -33.4125189], [-70.6448382, -33.4106806], [-70.6447369, -33.4090137], [-70.6469861, -33.4085241], [-70.6498121, -33.4079281], [-70.6517403, -33.4075335], [-70.6531646, -33.4072383], [-70.6531438, -33.4081327], [-70.6531403, -33.4084699], [-70.6531548, -33.409417], [-70.6532699, -33.4096002], [-70.6535062, -33.409601], [-70.6535158, -33.4112772], [-70.6527348, -33.4112654], [-70.6527055, -33.4128434], [-70.6526794, -33.4151684], [-70.652693, -33.4174544], [-70.6517996, -33.4174691], [-70.6505497, -33.4176396], [-70.6505529, -33.4176711], [-70.6505467, -33.4176804], [-70.6505086, -33.4177108], [-70.6503611, -33.4177309], [-70.6503316, -33.4177108], [-70.6502109, -33.4177264], [-70.6501867, -33.4177645], [-70.6500297, -33.4177883], [-70.649999, -33.41776], [-70.649889, -33.4177757], [-70.6498675, -33.4178025], [-70.6497066, -33.4178294], [-70.6496798, -33.4178137], [-70.6496777, -33.4177938], [-70.6484317, -33.4179975], [-70.6474619, -33.4175111], [-70.646853, -33.4171371], [-70.6457958, -33.4165576], [-70.6453493, -33.4163836], [-70.6452286, -33.4163259], [-70.6446046, -33.4162446], [-70.6445157, -33.4162594], [-70.6445049, -33.4162571], [-70.6439057, -33.4161581], [-70.6437883, -33.4141077]]], 'type': 'Polygon'}, 'properties': {'name': 'Cementerio General', '@id': 'way/197839099', 'landuse': 'cemetery'}, 'type': 'Feature'}], 'type': 'FeatureCollection'});
                mymap.addLayer(macro);
                var searchControl = new L.Control.Search({
                    layer: macro,
                    propertyName: 'name',
                    
                    initial: false,
                    zoom: 16,
                    position:'topleft',
                    hideMarkerOnCollapse: true         
                });
                searchControl.on('search:locationfound', function(e) {
                    e.layer.setStyle({fillColor: '#3f0', color: '#0f0'});
                    if(e.layer._popup)
                        e.layer.openPopup();
                }).on('search:collapsed', function(e) {
                    macro.eachLayer(function(layer) {
                        macro.resetStyle(layer);
                    });
                });
                mymap.addControl( searchControl );
                
                var clusterbueno = L.markerClusterGroup({});
                mymap.addLayer(clusterbueno);
                var clusterregular = L.markerClusterGroup({});
                mymap.addLayer(clusterregular);
                var clustermalo = L.markerClusterGroup({});
                mymap.addLayer(clustermalo);
                
                <?php foreach($dataLista AS $value) { 
                    if ($value['estado'] == 'Bueno') {
                        echo "var marker".$value['n_registro']." = L.marker([".$value['latitud'].", ".$value['longitud']."], {icon: arbolBueno}).addTo(clusterbueno);";
                    } elseif ($value['estado'] == 'Regular') {
                        echo "var marker".$value['n_registro']." = L.marker([".$value['latitud'].", ".$value['longitud']."], {icon: arbolRegular}).addTo(clusterregular);";
                    } elseif ($value['estado'] == 'Malo') {
                        echo "var marker".$value['n_registro']." = L.marker([".$value['latitud'].", ".$value['longitud']."], {icon: arbolMalo}).addTo(clustermalo);";
                    }
                            echo "marker".$value['n_registro'].".bindPopup('<h4><b>".$value['nom_comun']."</h4></b> ";
                            echo "<span><i><b>ID:</i></b>  ".$value['id_registro']."</span><br>";
                            echo "<span><i><b>Patio:</i></b>  ".$value['n_patio']."</span><br>";
                            echo "<span><i><b>Longitud:</i></b>  ".$value['longitud']."</span><br>";
                            echo "<span><i><b>Latitud:</i></b>  ".$value['latitud']."</span><br>";
                            echo "<span><i><b>Propiedad:</i></b>  ".$value['propiedad']."</span><br>";
                            echo "<span><i><b>Estado:</i></b>  ".$value['estado']."</span><br>";
                            echo "<span><i><b>Dap:</i></b>  ".$value['dap_cm']." cm.</span><br>";
                            echo "<span><i><b>Altura:</i></b>  ".$value['altura_m']." m.</span><br>";
                            echo "<span><i><b>Radio:</i></b>  ".$value['radio_m']." m.</span><br>";
                            echo "<span><i><b>Tipo Poda:</i></b>  ".$value['tipo_poda']."</span><br>";
                            echo "<span><i><b>Tratamiento:</i></b>  ".$value['tratamiento']."</span><br>";
                            echo "<span><i><b>Observaciones:</i></b>  ".$value['observaciones']."</span><br>";
                            echo "<a class=\'glyphicon glyphicon-eye-open\' href=\'https://www.mapillary.com/app/?lat=".$value['latitud']."&lng=".$value['longitud']."&z=17&pKey=aTS8sJ-LHWhn5A6Ti5u8rw\'> Ver en Mapillary</a>');";
                    } ?>

                var popup = L.popup();
                function onMapClick(e) {
                    popup
                    .setLatLng(e.latlng)
                    .setContent("Ubicación: " + e.latlng.toString())
                    .openOn(mymap);
                }
                mymap.on('click', onMapClick);
                
                var layerControl = {
                    base_layers : { "Vista Satélite" : mapaSatelite, "Vista Calle" : mapaCalle },
                    overlays : { "Árboles Buenos" : clusterbueno, "Árboles Regulares" : clusterregular, "Árboles Malos" : clustermalo }
                };
                L.control.layers(
                    layerControl.base_layers,
                    layerControl.overlays,
                    { position: 'topright',
                    collapsed: true,
                    autoZIndex: true
                }).addTo(mymap);            
                mapaCalle.remove();
                
            </script>
            </div>
        </div>
            <br>
            <?php
                include('footer.inc');
            
            ?>

