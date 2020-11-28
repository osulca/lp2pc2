<?php
include_once  "ConexionBD.php";
class Programacion{
    private $inicio;
    private $tipo;
    private $idProfesor;

    public function programacionLibre($idProfesor){
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM programacion WHERE id_profesor = $idProfesor";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();

            return $resultado;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminar($id): bool{
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();

            $sql = "DELETE FROM programacion WHERE id=$id";
            $filasAfectadas = $conn->exec($sql);

            if($filasAfectadas != 0){
                $resultado = true;
            }else{
                $resultado = false;
            }

            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
