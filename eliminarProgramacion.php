<?php
$idProgramacion = $_POST["idProgramacion"];

include "Programacion.php";
$programacion = new Programacion();
if ($programacion->eliminar($idProgramacion)) {
    echo "Programacion Eliminada";
} else {
    echo "Error";
}