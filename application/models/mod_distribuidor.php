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
    
    class mod_distribuidor extends CI_Model
    {
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del cargo del distribuidor
         * @var string      $_nombre            nombre del distribuidor
         * @var string      $_razon_social      razon social del distribuidor
         * @var string      $_estado            estado del distribuidor (A=Activo, E=Eliminado)
        */
        var $_name_table    = "tbl_distribuidor";
        var $_id            = 0;
        var $_nombre        = "";
        var $_razon_social  = "";
        var $_estado        = "";
        
        /**
        * get_name_table() retorna el nombre de la tabla
        * @return string _name_table
        */
        public function get_name_table()
        {
            return $this->_name_table;
        }
        
        /**
        * set_name_table() setea un valor en el parámetro de _name_table
        * @param string $_name_table 
        * @return void
        */
        public function set_name_table($_name_table)
        {
            $this->_name_table = $_name_table;
        }
        
        /**
        * get_id() retorna el id
        * @return integer _id
        */
        public function get_id()
        {
            return $this->_id;
        }
        
        /**
        * set_id() setea un valor en el parámetro de _id
        * @param integer $_id 
        * @return void
        */
        public function set_id($_id)
        {
            $this->_id = $_id;
        }
        
        /**
        * get_nombre() retorna el nombre
        * @return string _nombre
        */
        public function get_nombre()
        {
            return $this->_nombre;
        }
        
        /**
        * set_nombre() setea un valor en el parámetro de _nombre
        * @param string $_nombre 
        * @return void
        */
        public function set_nombre($_nombre)
        {
            $this->_nombre = $_nombre;
        }
        
        /**
        * get_razon_social() retorna el nombre
        * @return string _razon_social
        */
        public function get_razon_social()
        {
            return $this->_nombre;
        }
        
        /**
        * set_razon_social() setea un valor en el parámetro de _razon_social
        * @param string $_razon_social 
        * @return void
        */
        public function set_razon_social($_razon_social)
        {
            $this->_nombre = $_razon_social;
        }
        
        /**
        * get_estado() retorna el estado
        * @return string _estado
        */
        public function get_estado()
        {
            return $this->_estado;
        }

        /**
        * set_estado() setea un valor en el parámetro de _estado
        * @param string $_estado 
        * @return void
        */
        public function set_estado($_estado)
        {
            $this->_estado = $_estado;
        }

                
        public function __construct()
        {
            parent::__construct();
        }
        
        
        /**
         * Initialize get_distribuidores()
         * 
         * Esta función retorna el listado de distribuidores o un distribuidor específico según los parámetros enviados
         * 
         * @access public
         * @param array $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_distribuidores($select = array("0" => "*"), $where = array(), $or_where = array(), $join = array())
        {
            if(count($select) > 0)
            {
                foreach ($select as $key => $value)
                {
                    switch ($key)
                    {    
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
            
            if(count($where) > 0)
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
            
            if(count($or_where) > 0)
            {
                foreach ($or_where as $key => $value)
                {
                    $this->db->or_where($key, $value);
                }
            }
            
            if(count($join) > 0)
            {
                foreach ($join as $key => $value)
                {
                    $this->db->join($key, $value);
                }
            }
            
            $this->db->order_by("dis_nombre", "asc"); 
            
            $resultado = $this->db->get($this->get_name_table());
            
            return $resultado;
        }
        
    }
?>
