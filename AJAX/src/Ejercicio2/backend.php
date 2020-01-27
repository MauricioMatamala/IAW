<?php
    $datosRecibidos = file_get_contents('php://input');
    $datosDecodificados = json_decode($datosRecibidos,true);

    if ($datosDecodificados["conversion_type"] == "cm_to_inch")
        $value = $datosDecodificados["value"]/2.54;
    else
        $value = $datosDecodificados["value"]*2.54;

    $returnedData = ["conversion_type"=>$datosDecodificados["conversion_type"],"value" => $value];
    $jsonDevuelto = json_encode($returnedData);
    echo $jsonDevuelto;