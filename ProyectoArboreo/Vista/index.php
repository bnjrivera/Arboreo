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
    </head>
    <body>
        <?php
        // put your code here
        include('header.inc');
        ?>
        <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <br><br>
                <h2><i><b>Bienvenido al Proyecto Arbóreo</b></i></h2>
                <hr>
                <h4>Gracias al Fondo de Desarrollo Institucional (FDI), el equipo de estudiantes del Departamento de Cartografía y Geomática de la Universidad Tecnológica Metropolitana (UTEM) se dedicó desde el año 2019 a generar un archivo cartográfico de la flora introducida en el Cementerio General de Recoleta. 
                En este sitio web, Ud. podrá revisar el número de árboles registrados dentro de cada patio, junto con su localización geográfica, información relevante de sus especies, estado de gravedad en el que se encuentra y métodos de cuidado y tratamiento para cada uno.</h4>
                <hr>
                <a href="mapa.php" class="btn btn-primary btn-lg btn-block" role="button"><b>Ver Mapa de Visualización</b></a>
                <a href="ListaDeArboles.php" class="btn btn-secondary btn-lg btn-block" role="button"><b>Revisar Lista de Árboles</b></a>
                <br><br>
            </div>
            <div class="col-md-6">
                <img src="img/20190705_140823.png" alt="Bienvenido" style="max-width: 100%; height: auto; border-radius: 8px;"/>
            </div>
        </div>
        </div>
            <br>
            <?php
                include('footer.inc');
            
            ?>