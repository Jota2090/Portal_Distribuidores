<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_instructor
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_instructor extends CI_Model {
        
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del instructor
         * @var string      $_nombre            nombre del instructor
         * @var string      $_apellido          apellido del instructor
         * @var string      $_cedula            cédula del instructor
         * @var string      $_correo            correo del instructor
         * @var string      $_estado            estado del instructor (A=Activo, E=Eliminado)
        */
        var $_name_table    = "tbl_instructor";
        var $_id            = 0;
        var $_nombre        = "";
        var $_apellido      = "";
        var $_cedula        = "";
        var $_correo        = "";
        var $_estado        = "";
        
        
        /**
        * get_name_table() retorna el nombre de la tabla
        * @return string _name_table
        */
        public function get_name_table() {
            return $this->_name_table;
        }
        
        /**
        * set_name_table() setea un valor en el parámetro de _name_table
        * @param string $_name_table 
        * @return void
        */
        public function set_name_table($_name_table) {
            $this->_name_table = $_name_table;
        }
        
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
        * get_apellido() retorna el apellido
        * @return string _apellido
        */
        public function get_apellido() {
            return $this->_apellido;
        }

        /**
        * set_apellido() setea un valor en el parámetro de _apellido
        * @param string $_apellido 
        * @return void
        */
        public function set_apellido($_apellido) {
            $this->_apellido = $_apellido;
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
  
        
        /**
         * Initialize get_instructores()
         * 
         * Esta función retorna el listado de intructores o un intructor específico según los parámetros enviados
         * 
         * @access public
         * @param string $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_instructores($select = "*", $where = array(), $or_where = array(), $join = array()){
            
            $this->db->select($select);
            
            if(count($where) > 0){
                foreach ($where as $key => $value) {
                    $this->db->where($key, $value);
                }
            }
            
            if(count($or_where) > 0){
                foreach ($or_where as $key => $value) {
                    $this->db->or_where($key, $value);
                }
            }
            
            if(count($join) > 0){
                foreach ($join as $key => $value) {
                    $this->db->join($key, $value);
                }
            }
            
            $this->db->order_by("ins_apellido, ins_nombre", "asc"); 
            
            $resultado = $this->db->get($this->get_name_table());
            
            return $resultado;
        }
    }
?>
