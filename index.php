<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio - Programación Web</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
    <h2>Notas del Estudiante</h2>
    <form action="" method="post">
        <label for="cedula">Cédula del Alumno:</label><br><br>
        <input type="number" name="cedula" id="cedulaid"><br><br>
        
        <label for="nombre">Nombre del Alumno:</label><br><br>
        <input type="text" name="nombre" id="nombreid"><br><br>

        <label for="matematica">Nota de Matemáticas:</label><br><br>
        <input type="number" name="matematica" id="matematicaid"><br><br>

        <label for="fisica">Nota de Física:</label><br><br>
        <input type="number" name="fisica" id="fisicaid"><br><br>

        <label for="programacion">Nota de Programación:</label><br><br>
        <input type="number" name="programacion" id="programacionid"><br><br>

        <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>

<?php
    include('php/logica.php');
?>