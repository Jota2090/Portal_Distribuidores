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
    
    class mod_asistente extends CI_Model {
        
        /**
         * @var integer     $_id                id del asistente
         * @var string      $_nombre            nombre del asistente
         * @var string      $_cedula            cédula del asistente
         * @var string      $_correo            correo del asistente
         * @var string      $_telefono          telefono del asistente
         * @var string      $_antiguedad        contraseña del asistente
         * @var integer     $_distribuidor      id del distribuidor del asistente
         * @var integer     $_cargo             id del cargo del asistente
         * @var integer     $_tipo              id del tipo del asistente
         * @var datetime    $_fecha_modificado  fecha en que es modificado el asistente
         * @var string      $_estado            estado del asistente
         *
        */
        var $_id                = 0;
        var $_nombre            = "";
        var $_cedula            = "";
        var $_correo            = "";
        var $_telefono          = "";
        var $_antiguedad        = "";
        var $_distribuidor      = 0;
        var $_cargo             = 0;
        var $_tipo              = 0;
        var $_fecha_modificado  = "";
        var $_estado            = "";
        
        
        /**
        * get_id() retorna el id
        * @return integer _id
        */
        public function get_id() {
            return $this->_id;
        }
        
        /**
        * set_id() setea un valor en el parámetro de _id
        * @param integer $_id 
        * @return void
        */
        public function set_id($_id) {
            $this->_id = $_id;
        }
        
        /**
        * get_nombre() retorna el nombre
        * @return string _nombre
        */
        public function get_nombre() {
            return $this->_nombre;
        }
        
        /**
        * set_nombre() setea un valor en el parámetro de _nombre
        * @param string $_nombre 
        * @return void
        */
        public function set_nombre($_nombre) {
            $this->_nombre = $_nombre;
        }
        
        /**
        * get_cedula() retorna el numero de cedula
        * @return string _cedula
        */
        public function get_cedula() {
            return $this->_cedula;
        }

        /**
        * set_cedula() setea un valor en el parámetro de _cedula
        * @param string $_cedula 
        * @return void
        */
        public function set_cedula($_cedula) {
            $this->_cedula = $_cedula;
        }

        /**
        * get_correo() retorna el correo
        * @return string _correo
        */
        public function get_correo() {
            return $this->_correo;
        }

        /**
        * set_correo() setea un valor en el parámetro de _correo
        * @param string $_correo 
        * @return void
        */
        public function set_correo($_correo) {
            $this->_correo = $_correo;
        }

        /**
        * get_telefono() retorna el telefono
        * @return string _telefono
        */
        public function get_telefono() {
            return $this->_telefono;
        }

        /**
        * set_telefono() setea un valor en el parámetro de _telefono
        * @param string $_telefono 
        * @return void
        */
        public function set_telefono($_telefono) {
            $this->_telefono = $_telefono;
        }

        /**
        * get_antiguedad() retorna la antiguedad
        * @return string _antiguedad
        */
        public function get_antiguedad() {
            return $this->_antiguedad;
        }

        /**
        * set_antiguedad() setea un valor en el parámetro de _antiguedad
        * @param string $_antiguedad 
        * @return void
        */
        public function set_antiguedad($_antiguedad) {
            $this->_antiguedad = $_antiguedad;
        }

        /**
        * get_distribuidor() retorna el id del distribuidor
        * @return integer _distribuidor
        */
        public function get_distribuidor() {
            return $this->_distribuidor;
        }

        /**
        * set_distribuidor() setea un valor en el parámetro de _distribuidor
        * @param integer $_distribuidor 
        * @return void
        */
        public function set_distribuidor($_distribuidor) {
            $this->_distribuidor = $_distribuidor;
        }
        
        /**
        * get_cargo() retorna el id del cargo
        * @return integer _cargo
        */
        public function get_cargo() {
            return $this->_cargo;
        }

        /**
        * set_cargo() setea un valor en el parámetro de _cargo
        * @param integer $_cargo 
        * @return void
        */
        public function set_cargo($_cargo) {
            $this->_cargo = $_cargo;
        }
        
        /**
        * get_tipo() retorna el tipo
        * @return integer _tipo
        */
        public function get_tipo() {
            return $this->_tipo;
        }

        /**
        * set_tipo() setea un valor en el parámetro de _tipo
        * @param integer $_tipo 
        * @return void
        */
        public function set_tipo($_tipo) {
            $this->_tipo = $_tipo;
        }

        /**
        * get_fecha_modificado() retorna la fecha en que fue modificado
        * @return datetime _fecha_modificado
        */
        public function get_fecha_modificado() {
            return $this->_fecha_modificado;
        }

        /**
        * set_fecha_modificado() setea un valor en el parámetro de _fecha_modificado
        * @param datetime $_fecha_modificado
        * @return void
        */
        public function set_fecha_modificado($_fecha_modificado) {
            $this->_fecha_modificado = $_fecha_modificado;
        }

        /**
        * get_estado() retorna el estado
        * @return string _estado
        */
        public function get_estado() {
            return $this->_estado;
        }

        /**
        * set_estado() setea un valor en el parámetro de _estado
        * @param string $_estado 
        * @return void
        */
        public function set_estado($_estado) {
            $this->_estado = $_estado;
        }

                
        public function __construct(){
            parent::__construct();
        }
        
        
    }
?>
