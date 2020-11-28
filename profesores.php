<?php
include_once "Profesor.php";
include_once "Programacion.php";
include_once "Leccion.php";

$profesor = new Profesor();
$programacion = new Programacion();
$leccion = new Leccion();
$profesores = $profesor->mostrar();
echo "<table border='1'>
        <tr>
            <th>Profesor</th>
            <th>Programaciones Libres</th>
        </tr>";

foreach ($profesores as $item){
    echo "<tr>
            <td>
                Nombre: ".$item["nombre"]."<br>
                Idioma: ".$item["idioma"]."
            </td>
            <td>";
                $datosProgramacion = $programacion->programacionLibre($item["id"]);
                foreach ($datosProgramacion as $datoProgramacion){
                    $idProgramacion =  $datoProgramacion["id"];
                    if(!$leccion->buscarIdProgramacion($idProgramacion)){
                        echo "Inicio: ".$datoProgramacion["inicio"]."<br>
                              Tipo: ".$datoProgramacion["tipo"];
                        echo "<form method='post' action='guardarLeccion.php'>
                                  <input type='submit' name='submit1' value='Programar'>
                                  <input type='hidden' name='idProgramacion' value='$idProgramacion'>
                              </form>";
                        echo "<form method='post' action='eliminarProgramacion.php'>
                                  <input type='submit' name='submit2' value='Eliminar'>
                                  <input type='hidden' name='idProgramacion' value='$idProgramacion'>
                              </form>";
                    }
                }
    echo    "</td>
          </tr>";
}
echo "</table>";