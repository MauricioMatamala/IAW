<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form method="POST" action="validateLogin.php">
            <label for="name">Nombre: </label>
            <input name="name" id="name" type="text" placeholder="name@domain.dom"/><br>
            <label for="password">Contraseña: </label>
            <input name="password" id="password" type="password"/><br>
            <input type="submit" name="Enviar"/>
        </form>
    </body>
</html>
<?php
