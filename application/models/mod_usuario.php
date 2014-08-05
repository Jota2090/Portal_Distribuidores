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
        
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del usuario
         * @var string      $_nombre            nombre del usuario
         * @var string      $_apellido          apellido del usuario
         * @var string      $_cedula            cédula del usuario
         * @var string      $_correo            correo del usuario
         * @var string      $_usuario           nick del usuario
         * @var string      $_contrasena        contraseña del usuario
         * @var string      $_tipo              tipo de usuario (S=SuperAdministrador, A=Administradores, U=Usuarios(Asistente))
         * @var datetime    $_fecha_modificado  fecha en que es modificado el usuario
         * @var string      $_estado            estado del usuario (A=Activo, B=Bloqueado, I=Inactivo, E=Eliminado)
         *
        */
        var $_name_table        = "tbl_usuario";
        var $_id                = 0;
        var $_nombre            = "";
        var $_apellido          = "";
        var $_cedula            = "";
        var $_correo            = "";
        var $_usuario           = "";
        var $_contrasena        = "";
        var $_tipo              = "";
        var $_fecha_modificado  = "";
        var $_estado            = "";
        
        
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
        * get_usuario() retorna el nick
        * @return string _usuario
        */
        public function get_usuario() {
            return $this->_usuario;
        }

        /**
        * set_usuario() setea un valor en el parámetro de _usuario
        * @param string $_usuario 
        * @return void
        */
        public function set_usuario($_usuario) {
            $this->_usuario = $_usuario;
        }

        /**
        * get_contrasena() retorna la contrasena
        * @return string _contrasena
        */
        public function get_contrasena() {
            return $this->_contrasena;
        }

        /**
        * set_contrasena() setea un valor en el parámetro de _contrasena
        * @param string $_contrasena 
        * @return void
        */
        public function set_contrasena($_contrasena) {
            $this->_contrasena = $_contrasena;
        }

        /**
        * get_tipo() retorna el tipo
        * @return string _tipo
        */
        public function get_tipo() {
            return $this->_tipo;
        }

        /**
        * set_tipo() setea un valor en el parámetro de _tipo
        * @param string $_tipo 
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
        
        
        
        /**
         * Initialize get_usuario()
         * 
         * Esta función retorna un listado de los usuarios o un usuario específico según los parámetros enviados
         * 
         * @access public
         * @param array $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_usuarios($select = array("0" => "*"), $where = array(), $or_where = array(), $join = array()){
            
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
            
            $resultado = $this->db->get($this->get_name_table());

            return $resultado;
        }
        

        /**
         * Initialize guardar_usuario()
         * 
         * Esta función crea un usuario nuevo en el portal
         * 
         * @access public
         * @return void
        */
        public function guardar_usuario(){
            
            $data = array(
               'usu_nombre'             => $this->_nombre,
               'usu_apellido'           => $this->_apellido ,
               'usu_cedula'             => $this->_cedula ,
               'usu_correo'             => $this->_correo ,
               'usu_usuario'            => $this->_usuario ,
               'usu_contrasena'         => $this->_contrasena,
               'usu_tipo'               => $this->_tipo ,
               'usu_fecha_modificado'   => $this->_fecha_modificado
            );

            $this->db->trans_start();
            $result = $this->db->insert($this->get_name_table(), $data); 
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }
                    
            return $result;
        }
        
        
        /**
         * Initialize update_usuarios()
         * 
         * Esta función actualiza la información de un usuario específico según los parámetros enviados
         * 
         * @access public
         * @param array $data 
         * @param array $where 
         * @return array $resultado
        */
        public function update_usuarios($data = array(), $where = array()){
            
            if(count($where) > 0)
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
            
            $this->db->trans_start();
            $resultado = $this->db->update($this->get_name_table(), $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }
            
            return $resultado;
        }
    }
?>
