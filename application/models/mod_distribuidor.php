<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_distribuidor
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_distribuidor extends CI_Model {
        
        /**
         * @var integer     $_id                id del cargo del distribuidor
         * @var string      $_nombre            nombre del distribuidor
         * @var string      $_razon_social      razon social del distribuidor
         * @var string      $_estado            estado del distribuidor
        */
        var $_id            = 0;
        var $_nombre        = "";
        var $_razon_social  = "";
        var $_estado        = "";
        
        
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
        * get_razon_social() retorna el nombre
        * @return string _razon_social
        */
        public function get_razon_social() {
            return $this->_nombre;
        }
        
        /**
        * set_razon_social() setea un valor en el parámetro de _razon_social
        * @param string $_razon_social 
        * @return void
        */
        public function set_razon_social($_razon_social) {
            $this->_nombre = $_razon_social;
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
