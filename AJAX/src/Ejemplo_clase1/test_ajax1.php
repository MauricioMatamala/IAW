<?php
if (isset($_GET["q"])){
    $q = $_GET["q"];
    if ($q == "info"){
        echo "En un lugar de la Mancha...";
    }
    if ($q == "title"){
        echo "Don Quijote de la Mancha";
    }
}