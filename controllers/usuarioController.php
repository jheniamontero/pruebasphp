<?php 
include('views/usuarioView.php');
include('models/usuariosModels.php');

class UsuarioController{
    private $vista;
	private $conexion;

		public function __construct(){
			$this->vista=new UsuarioView();
			$this->modelo=new UsuarioModels();
		}

}

?>