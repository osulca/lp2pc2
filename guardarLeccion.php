<?php
$idProgramacion = $_POST["idProgramacion"];
$estatus = "programado";
$nro = 2;

include "Leccion.php";
$leccion = new Leccion();
if (($leccion->crearLeccion($nro, $estatus, $idProgramacion)) != 0) {
    echo "Leccion Programada";
} else {
    echo "Error";
}


