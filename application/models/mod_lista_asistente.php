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
    
    class mod_lista_asistente extends CI_Model
    {
        
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del cargo del asistente
         * @var string      $_nombre            nombre de la lista
         * @var string      $_usuario           cedula del usuario a la que pertenece la lista
         * @var string      $_estado            estado de la lista (D=Disponible, E=Eliminado)
        */
        var $_name_table    = "tbl_lista_asistente";
        var $_id            = 0;
        var $_nombre        = "";
        var $_usuario       = "";
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
        * get_usuario() retorna la cedula
        * @return string _usuario
        */
        public function get_usuario()
        {
            return $this->_usuario;
        }

         /**
        * set_usuario() setea un valor en el parámetro de _usuario
        * @param string $_usuario 
        * @return void
        */
        public function set_usuario($_usuario)
        {
            $this->_usuario = $_usuario;
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
        public function get_listas_asitentes($select = "*", $where = array(), $or_where = array(), $join = array())
        {
            $this->db->select($select);
            
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
                    $this->db->or_where($value, $key);
                }
            }
            
            if(count($join) > 0)
            {
                foreach ($join as $key => $value)
                {
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
         * @return array $resultado
        */
        public function guardar_lista_asistente()
        {
            $data = array(
                            'la_nombre'             => $this->_nombre,
                            'la_usuario_id'         => $this->_usuario
                         );
            
            $this->db->trans_start();
            $this->db->insert($this->get_name_table(), $data);
            $resultado['id_insertado'] = $this->db->insert_id();
            $this->db->trans_complete();
            
            $parametros = "";
            foreach($data as $dato)
            {
                $parametros = $parametros.$dato.", ";
            }
            
            $resultado['status'] = $this->db->trans_status();
            
            if ($this->db->trans_status() === FALSE)
            {
                log_message('error', 'Accion: CREAR; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Lista: null; Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');
                    
                $this->db->trans_rollback();
            }
            else
            {
                log_message('info', 'Accion: CREAR; Mensaje: EXITO; Id_Lista: '.$resultado['id_insertado'].'; Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');
                    
                $this->db->trans_commit();
            }
                    
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
         * @return boolean
        */
        public function update_listas_asistente($data = array(), $where = array(), $accion = "EDITAR")
        {
            $id_lista = "";
            if(count($where) > 0)
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                    $id_lista = $id_lista.$value.", ";
                }
            }
            
            $this->db->trans_start();
            $this->db->update($this->get_name_table(), $data);
            $this->db->trans_complete();
            
            $parametros = "";
            foreach($data as $dato)
            {
                $parametros = $parametros.$dato.", ";
            }
            
            if ($this->db->trans_status() === FALSE)
            {
                log_message('error', 'Accion: '.$accion.'; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Lista: ('.$id_lista.'); Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');
                    
                $this->db->trans_rollback();
            }
            else
            {
                log_message('info', 'Accion: '.$accion.'; Mensaje: EXITO; Id_Lista: ('.$id_lista.'); Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');
                    
                $this->db->trans_commit();
            }
            
            return $this->db->trans_status();
        }
        
        
        /**
         * Initialize sp_lista_asistente()
         * 
         * Esta función invoca los stored procedures que existen en la base de datos con respecto a esta tabla
         * 
         * @access public
         * @param array $nombre_sp 
         * @param array $data 
         * @return boolean
        */
        public function sp_lista_asistente($nombre_sp = "", $data = array())
        {
            switch ($nombre_sp) 
            {    
                case 'sp_eliminar_lista_asistente':
                    
                    $query = "call ".$nombre_sp."(".$data['lista'].",".$data['usuario'].")";
                    $this->db->trans_start();
                    $this->db->query($query); 
                    $this->db->trans_complete();
                    
                    $resultado = $this->db->trans_status();
                    
                    if ($this->db->trans_status() === FALSE)
                    {
                        log_message('error', 'Accion: ELIMINAR; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Lista: ('.$data['lista'].'); Info_Lista: (); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_rollback();
                    }
                    else
                    {
                        log_message('info', 'Accion: ELIMINAR; Mensaje: EXITO; Id_Lista: ('.$data['lista'].'); Info_Lista: (); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_commit();
                    }
                    
                    break;
                    
                
                case 'sp_quitar_asistente_lista':
                    
                    $query = "call ".$nombre_sp."(".$data['lista'].",".$data['asistente'].")";
                    $this->db->trans_start();
                    $this->db->query($query); 
                    $this->db->trans_complete();
                    
                    $resultado = $this->db->trans_status();
                    
                    if ($this->db->trans_status() === FALSE)
                    {
                        log_message('error', 'Accion: QUITAR_ASISTENTE; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Lista: ('.$data['lista'].'); Info_Lista: (Asistente: '.$data['asistente'].'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_rollback();
                    }
                    else
                    {
                        log_message('info', 'Accion: QUITAR_ASISTENTE; Mensaje: EXITO; Id_Lista: ('.$data['lista'].'); Info_Lista: (Asistente: '.$data['asistente'].'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_commit();
                    }
                    
                    break;
                    
                    
                case 'sp_select_asistentes_registrados_curso':
                    
                    $query = "call ".$nombre_sp."(".$data['usuario'].",".$data['estado_lista'].",".$data['curso'].")";
                    $this->db->trans_start();
                    $resultado = $this->db->query($query); 
                    $this->db->trans_complete();
                    
                    if ($this->db->trans_status() === FALSE)
                    {
                        log_message('error', 'Accion: SELECT_ASISTENTES_REGISTRADOS_CURSO; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Lista: ('.$data['usuario'].'); Info_Lista: (Estado: '.$data['estado_lista'].', Curso: '.$data['curso'].'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_rollback();
                    }
                    else
                    {
                        log_message('info', 'Accion: SELECT_ASISTENTES_REGISTRADOS_CURSO; Mensaje: EXITO; Id_Lista: ('.$data['usuario'].'); Info_Lista: (Estado: '.$data['estado_lista'].', Curso: '.$data['curso'].'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Lista_Asistente');

                        $this->db->trans_commit();
                    }
                    
                    break;
            }
            
            return $resultado;
        }
    }
?>
