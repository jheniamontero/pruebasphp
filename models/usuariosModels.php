<?php 
    require_once("../models/conexionGLPI.php");

    class UsuarioModels extends ConexionGLPI{

        private $conexion;

		public function __construct(){
            $this->conexion=new ConexionGLPI();
        }
        //CREAMOS DEMAS FUNCIONES QUE VAYAMOS A UTILIZAR
        public function CargarUsuariosModel(){
        	$sentencia = "SELECT * FROM glpi_users";

        	return $this->conexion->mostrarQuery($query);
        }

    }
?>