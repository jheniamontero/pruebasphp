<?php   
require_once("../config/conexionPHP.php");

    class ConexionGLPI{
        private $conexion;
        public function __construct(){
            $this->conexion = null;
        }
        protected function conectarBD(){
            if ($this->conexion == null) {
				global $ConfigGLPI;

				$this->conexion = new PDO("mysql:host="
					.$ConfigGLPI["bdhost"].";bdname="
					.$ConfigGLPI["bdatabase"].";charset=utf8"
					.$ConfigGLPI["bduser"]
					.$ConfigGLPI["bdpassword"]);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			}
			return $this->conexion;
        }
        protected function mostrarQuery($sql){
	    	$datos= $this->conectarBD()->query($sql);
	    	$retorno = array();

	    	while($row = $datos->fetch(PDO::FETCH_ASSOC)){
	    		 $retorno[] = $row;
	    	} 

	   		return $retorno;
		}


    }
?>