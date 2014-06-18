<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_usuario
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_usuario extends CI_Model {
        
        function __construct(){
            parent::__construct();
        }
        
        /**
         * Initialize crear_usuario()
         * 
         * Esta función crea un usuario nuevo en el portal
         * 
         * @access public
         * @return void
        */
        function guardar_usuario(){
            
            $salt = '6&KTTmxa$Tej|y6uH%OhSrK@caXbNNo%I23tQmJ20Sid';
            $contrasena = sha1(md5($salt.$this->input->post("contrasena")));
            
            $data = array(
               'usu_nombre'             => $this->input->post("nombre"),
               'usu_apellido'           => $this->input->post("apellido") ,
               'usu_cedula'             => $this->input->post("cedula") ,
               'usu_correo'             => $this->input->post("correo") ,
               'usu_usuario'            => $this->input->post("usuario") ,
               'usu_contrasena'         => $contrasena,
               'usu_tipo'               => $this->input->post("tipo") ,
               'usu_fecha_modificado'   => date('Y-m-d H:i:s')
            );

            $result = $this->db->insert('tbl_usuario', $data);
            
            return $result;
        }
    }
?>
