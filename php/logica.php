<?php
    if (isset($_POST['cedula']) && !empty($_POST['cedula']) && isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['matematica']) && !empty($_POST['matematica']) && isset($_POST['fisica']) && !empty($_POST['fisica']) &&
    isset($_POST['programacion']) && !empty($_POST['programacion'])) {

    session_start();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $matematica = (int) $_POST['matematica'];
    $fisica = (int) $_POST['fisica'];
    $programacion = (int) $_POST['programacion'];

    if (!isset($_SESSION['promedio']) || !isset($_SESSION['aprobado']) || !isset($_SESSION['reprobado']) || !isset($_SESSION['rangoAprobacion']) || !isset($_SESSION['notasMaximas'])) {
        $_SESSION['promedio'] = array(
            'matematica' => 0.0,
            'fisica' => 0.0,
            'programacion' => 0.0
        );

        // aprobado no aprobado
        $_SESSION['aprobado'] = array(
            'matematica' => 0,
            'fisica' => 0,
            'programacion' => 0
        );
        
        $_SESSION['reprobado'] = array(
            'matematica' => 0,
            'fisica' => 0,
            'programacion' => 0
        );

        // aprobacion ratio
        $_SESSION['rangoAprobacion'] = array(
            '1' => 0,
            '2' => 0,
            '3' => 0
        );

        // notamaxima
        $_SESSION['notasMaximas'] = array(
            'matematica' => 0,
            'fisica' => 0,
            'programacion' => 0
        );

    }
        $_SESSION['promedio']['matematica']= ($_SESSION['promedio']['matematica'] + $matematica) / 2;
        $_SESSION['promedio']['fisica'] = ($_SESSION['promedio']['fisica'] + $fisica) / 2;
        $_SESSION['promedio']['programacion'] = ($_SESSION['promedio']['programacion'] + $programacion) / 2;

        if ($matematica >= 10) {
            $_SESSION['aprobado']['matematica']++;
        } else {
            $_SESSION['reprobado']['matematica']++;
        }

        
        if ($fisica >= 10) {
            $_SESSION['aprobado']['fisica']++;
        } else {
            $_SESSION['reprobado']['fisica']++;
        }

                            
        if ($programacion >= 10) {
            $_SESSION['aprobado']['programacion']++;
        } else {
            $_SESSION['reprobado']['programacion']++;
        }

        if ($matematica >= 10 && $fisica >= 10 && $programacion >= 10) {
            $_SESSION['rangoAprobacion']['3']++;
        } else if ($matematica < 10 && $fisica >= 10 && $programacion >= 10
        || $matematica >= 10 && $fisica < 10 && $programacion >= 10 
        || $matematica >= 10 && $fisica >= 10 && $programacion < 10) {
            $_SESSION['rangoAprobacion']['2']++;
        } else if ($matematica < 10 && $fisica < 10 && $programacion >= 10
        || $matematica >= 10 && $fisica < 10 && $programacion < 10 
        || $matematica < 10 && $fisica >= 10 && $programacion < 10){
            $_SESSION['rangoAprobacion']['1']++;
        }

        if ( $matematica > $_SESSION['notasMaximas']['matematica']) {
            $_SESSION['notasMaximas']['matematica'] = $matematica;
        } if ($fisica > $_SESSION['notasMaximas']['fisica']) {
            $_SESSION['notasMaximas']['fisica'] = $fisica;
        } if ($programacion > $_SESSION['notasMaximas']['programacion']) {
            $_SESSION['notasMaximas']['programacion'] = $programacion;
        }

        echo "<div class='resp'>" . 
        "Notas Promedios: " . "<br>" . "Matematica: " . $_SESSION['promedio']['matematica'] . "<br>" . "Fisica: " . $_SESSION['promedio']['matematica'] . "<br>" . "Programacion: " . $_SESSION['promedio']['programacion'] . "<br>" . "<br>" . 
        "Alumnos Aprobados: " . "<br>" . "Matematica: " . $_SESSION['aprobado']['matematica'] . "<br>" . "Fisica: " . $_SESSION['aprobado']['fisica'] . "<br>" . "Programacion: " . $_SESSION['aprobado']['programacion'] . "<br>" . "<br>" .  
        "Numero de Alumnos Reprobados: " .  "<br>" . "Matematica: " . $_SESSION['reprobado']['matematica'] . "<br>" . "Fisica: " . $_SESSION['reprobado']['fisica'] . "<br>" . "Programacion: " . $_SESSION['reprobado']['programacion'] . "<br>" . "<br>" .  
        "Numero de Alumnos que aprobaron todas las materias: " . $_SESSION['rangoAprobacion']['3'] . "<br>" .
        "Numero de Alumnos que aprobaron dos materias: " . $_SESSION['rangoAprobacion']['2'] . "<br>" . 
        "Numero de Alumnos que aprobaron una materia: " . $_SESSION['rangoAprobacion']['1'] . "<br>" . "<br>" . 
        "Nota Maxima en cada Materia: " . "<br>" . "Matematica: " . $_SESSION['notasMaximas']['matematica'] . "<br>" .
        "Fisica: " . $_SESSION['notasMaximas']['fisica'] . "<br>" . "Programacion: " . $_SESSION['notasMaximas']['programacion'] . "<br>" .
        "</div>";
}
?>  