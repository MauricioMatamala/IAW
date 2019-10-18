<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["name"])){
        echo "<br>post_name";
        $userName = $_POST["name"];
    }
    if (isset($_POST["password"])){
        echo "<br>post_password";
        $userPassword = $_POST["password"];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if (isset($_GET["name"])){
        echo "<br>get_name";
        $userName = $_GET["name"];
    }
    if (isset($_GET["password"])){
        echo "<br>get_password";
        $userPassword = $_GET["password"];
    }
}

echo "El usuario es $userName<br>";
echo "La contraseña es $userPassword";

