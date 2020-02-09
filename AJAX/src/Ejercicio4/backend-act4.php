<?php
$data = file_get_contents('php://input');
$data = json_decode($data,true); // $data contiene un array asociativo

$dbConn = new mysqli("localhost","act4user","Perro20","act4_ajax");

$response = array();

if (isset($data['consulta'])){
    if ($data['consulta'] == 'tecnologia') {
        if (!$dbConn->connect_error) {
            $result = $dbConn->query("INSERT INTO Tecnologias(nombre) VALUES ('{$data['datos'][0]}')");
            if ($result == true) {
                $response['estado'] = "1";
                $response['datos'] = [$data['datos'][0]];
            }
            else{
                $response['estado'] = "0";
                $response['datos'] = ["Problema al insertar en la base de datos"];
            }
        }
        else{
            $response['estado'] = "0";
            $response['datos'] = ["Problema al conectar en la base de datos"];
        }
    } else if ($data['consulta'] == "curso"){
        if (!$dbConn->connect_error){
            $idTecnologia = $dbConn->query("SELECT id FROM Tecnologias WHERE nombre='{$data['datos'][1]}'")->fetch_assoc()['id'];
            $result = $dbConn->query("INSERT INTO Cursos(nombre, id_tecnologia) VALUES('{$data['datos'][0]}','$idTecnologia')");
            if ($result == true){
                $response['estado'] = 1;
                $response['datos'] = [$data['datos'][0],$data['datos'][1]];
            } else {
                $response['estado'] = 0;
                $response['datos'] = ["Problemas al insertar el curso"];
            }
        } else {
            $response['estado'] = "0";
            $response['datos'] = ["Problema al conectar en la base de datos"];
        }
    } else if ($data['consulta'] == "lista_tecnologias"){
        if (!$dbConn->connect_error){
            $result = $dbConn->query("SELECT nombre FROM Tecnologias");
            $listaTecnologias = array();
            while ($row = $result->fetch_assoc())
                array_push($listaTecnologias, $row['nombre']);
            $response['estado'] = 1;
            $response['datos'] = $listaTecnologias;
        } else {
            $response['estado'] = 0;
            $response['datos'] = ["Ha habido un problema con la base de datos"];
        }
    }
}

echo json_encode($response);