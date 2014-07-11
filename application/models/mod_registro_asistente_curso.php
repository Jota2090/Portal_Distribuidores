<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_registro_asistente_curso
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_registro_asistente_curso extends CI_Model {
        
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del cargo del asistente
         * @var string      $_curso             id del curso
         * @var string      $_asistente         cedula del asistente
         * @var string      $_lista_asistente   id de la lista
        */
        var $_name_table        = "tbl_registro_asistente_curso";
        var $_id                = 0;
        var $_curso             = "";
        var $_asistente         = "";
        var $_lista_asistente   = "";
        
        
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
        * get_curso() retorna el id
        * @return string _curso
        */
        public function get_curso() {
            return $this->_curso;
        }

         /**
        * set_curso() setea un valor en el parámetro de _curso
        * @param string $_curso 
        * @return void
        */
        public function set_curso($_curso) {
            $this->_asistente = $_curso;
        }
        
        /**
        * get_asistente() retorna la cedula
        * @return string _asistente
        */
        public function get_asistente() {
            return $this->_asistente;
        }

         /**
        * set_asistente() setea un valor en el parámetro de _asistente
        * @param string $_asistente 
        * @return void
        */
        public function set_asistente($_asistente) {
            $this->_asistente = $_asistente;
        }
        
        /**
        * get_lista_asistente() retorna el id
        * @return string _lista_asistente
        */
        public function get_lista_asistente() {
            return $this->_lista_asistente;
        }
        
        /**
        * set_lista_asistente() setea un valor en el parámetro de _lista_asistente
        * @param string $_lista_asistente 
        * @return void
        */
        public function set_lista_asistente($_lista_asistente) {
            $this->_lista_asistente = $_lista_asistente;
        }

                
        public function __construct(){
            parent::__construct();
        }
        
        
        /**
         * Initialize get_registro_asistente_curso()
         * 
         * Esta función retorna un listado de los asistentes registrados en los cursos o un asistente de un curso específico según los parámetros enviados
         * 
         * @access public
         * @param array $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_registro_asistente_curso($select = array("0" => "*"), $where = array(), $or_where = array(), $join = array(), $order_by = array()){
            
            if(count($select) > 0){
                foreach ($select as $key => $value) {
                    switch ($key) {    
                        case "0":
                            $this->db->select($value);
                            break;
                        
                        case "1":
                            $this->db->select_max($value);
                            break;
                        
                        case "2":
                            $this->db->select_min($value);
                            break;
                        
                        case "3":
                            $this->db->select_avg($value);
                            break;
                        
                        case "4":
                            $this->db->select_sum($value);
                            break;
                    }
                }
            }
            
            if(count($where) > 0){
                foreach ($where as $key => $value) {
                    $this->db->where($key, $value);
                }
            }
            
            if(count($or_where) > 0){
                foreach ($or_where as $key => $value) {
                    $this->db->or_where($value, $key);
                }
            }
            
            if(count($join) > 0){
                foreach ($join as $key => $value) {
                    $this->db->join($key, $value);
                }
            }
            
            if(count($order_by) > 0){
                foreach ($order_by as $key => $value) {
                    $this->db->order_by($key, $value);
                }
            }
            
            $resultado = $this->db->get($this->get_name_table());
            //var_dump($this->db->last_query());
            return $resultado;
        }
        
    }
?>
