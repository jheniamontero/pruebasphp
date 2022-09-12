<?php 
    class UsuarioView{

        public function __construct(){
            $this->base=file_get_contents('../templates/base.html');
            $this->entrar=file_get_contents('../templates/informe.html');
        }
        public function cargarUsuariosView($datos){
            $combo="";

            foreach($datos as $fila){
                $datos ="<tr><td>".$fila["id"]."</td>
                             <td>".$fila["name"]."</td>
                        </tr>";
                $combo .=$datos;
            }

            $this->entrar = str_ireplace('{datosUsuario}', $combo, $this->entrar);
        }
    }

?>