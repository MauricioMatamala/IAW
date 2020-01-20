<?php

$dbConn = new mysqli("localhost","depositouser","Perro20","deposito");
if (isset($_GET["q"])){
    $tipoVehiculo = $_GET["q"];
    $idVehiculosResult = $dbConn->query("SELECT numero_id FROM vehiculos WHERE tipo='" . $tipoVehiculo . "'");
    $listadoHTMLIds = "<ul>";
    while ($idVehiculo = $idVehiculosResult->fetch_assoc())
        $listadoHTMLIds .= "<li>".$idVehiculo['numero_id']."</li>";
    $listadoHTMLIds .= "</ul>";
    echo $listadoHTMLIds;
} else if (isset($_GET["id"])){
    $idVehiculo = $_GET["id"];
    $datosVehiculoResult = $dbConn->query("SELECT tipo,numero_id,propietario,dni,estado FROM vehiculos WHERE numero_id='".$idVehiculo."'");
    $listadoHTMLvehiculo = "<ul>";
    while ($datosVehiculo = $datosVehiculoResult->fetch_assoc()) {
        $listadoHTMLVehiculo .= "<li>" . $datosVehiculo['tipo'] . "</li>";
        $listadoHTMLVehiculo .= "<li>" . $datosVehiculo['numero_id']."</li>";
        $listadoHTMLVehiculo .= "<li>" . $datosVehiculo['propietario']."</li>";
        $listadoHTMLVehiculo .= "<li>" . $datosVehiculo['dni']."</li>";
        $listadoHTMLVehiculo .= "<li>" . $datosVehiculo['estado']."</li>";
    }
    $listadoHTMLVehiculo .= "</ul>";
    echo utf8_encode($listadoHTMLVehiculo);
}
