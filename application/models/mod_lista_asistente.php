<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_lista_asistente
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_lista_asistente extends CI_Model {
        
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del cargo del asistente
         * @var string      $_nombre            nombre de la lista
         * @var string      $_asistente         cedula del asistente a la que pertenece la lista
         * @var string      $_estado            estado de la lista (D=Disponible, E=Eliminado)
        */
        var $_name_table    = "tbl_lista_asistente";
        var $_id            = 0;
        var $_nombre        = "";
        var $_asistente     = "";
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
         * Initialize get_listas_asitentes()
         * 
         * Esta función retorna un listado de las listas de los asistentes o una lista específica según los parámetros enviados
         * 
         * @access public
         * @param string $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_listas_asitentes($select = "*", $where = array(), $or_where = array(), $join = array()){
            
            $this->db->select($select);
            
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
            
            $this->db->order_by("la_nombre"); 
            
            $resultado = $this->db->get($this->get_name_table());
            
            return $resultado;
        }
        
        
        /**
         * Initialize guardar_lista_asistente()
         * 
         * Esta función crea una lista de asistentes nueva en el portal
         * 
         * @access public
         * @return void
        */
        public function guardar_lista_asistente(){
            
            $data = array(
               'la_nombre'             => $this->_nombre,
               'la_asistente_id'       => $this->_asistente
            );

            $resultado = $this->db->insert($this->get_name_table(), $data);
            
            return $resultado;
        }
        
        
        /**
         * Initialize update_listas_asistente()
         * 
         * Esta función actualiza la información de una lista específica según los parámetros enviados
         * 
         * @access public
         * @param array $data 
         * @param array $where 
         * @return array $resultado
        */
        public function update_listas_asistente($data = array(), $where = array()){
            
            if(count($where) > 0){
                foreach ($where as $key => $value) {
                    $this->db->where($key, $value);
                }
            }
            
            $resultado = $this->db->update($this->get_name_table(), $data);
            
            return $resultado;
        }
    }
?>
