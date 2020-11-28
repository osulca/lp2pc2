<?php
include_once  "ConexionBD.php";
class Leccion{
    private $numero;
    private $estatus;
    private $comentarioProfesor;
    private $comentarioEstudiante;
    private $idEstudiante;
    private $idProgramacion;

    public function buscarIdProgramacion($idProgramacion){
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM leccion WHERE id_programacion = $idProgramacion";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->rowCount();

            $conexionDB->cerrarConexion();

            if($resultado>0){
                return true;
            }else{
                return false;
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function crearLeccion($numero, $status, $idProgramacion): int{
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO leccion(numero, estatus, id_programacion)
                    VALUES(?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $numero, PDO::PARAM_INT);
            $stmt->bindParam(2, $status, PDO::PARAM_STR);
            $stmt->bindParam(3, $idProgramacion, PDO::PARAM_INT);
            $stmt->execute();
            $filas = $stmt->rowCount();

            $conexionDB->cerrarConexion();
            return $filas;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}