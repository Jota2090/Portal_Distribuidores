<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_asistente
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_asistente extends CI_Model
    {
        /**
         * @var string      $_name_table        nombre de la tabla en nuestra base de datos
         * @var integer     $_id                id del asistente
         * @var string      $_nombre            nombre del asistente
         * @var string      $_cedula            cédula del asistente
         * @var string      $_correo            correo del asistente
         * @var string      $_telefono          telefono del asistente
         * @var string      $_antiguedad        contraseña del asistente
         * @var integer     $_distribuidor      id del distribuidor del asistente
         * @var integer     $_cargo             id del cargo del asistente
         * @var integer     $_tipo              id del tipo del asistente
         * @var string      $_usuario           cedula del usuario al que pertenece el asistente
         * @var datetime    $_fecha_modificado  fecha en que es modificado el asistente
         * @var string      $_estado            estado del asistente (A=Activo, B=Bloqueado, I=Inactivo, E=Eliminado)
         *
        */
        var $_name_table        ="tbl_asistente";
        var $_id                = 0;
        var $_nombre            = "";
        var $_cedula            = "";
        var $_correo            = "";
        var $_telefono          = "";
        var $_antiguedad        = "";
        var $_distribuidor      = 0;
        var $_cargo             = 0;
        var $_tipo              = 0;
        var $_usuario           = "";
        var $_fecha_modificado  = "";
        var $_estado            = "";
        
        
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
        * get_cedula() retorna el numero de cedula
        * @return string _cedula
        */
        public function get_cedula()
        {
            return $this->_cedula;
        }

        /**
        * set_cedula() setea un valor en el parámetro de _cedula
        * @param string $_cedula 
        * @return void
        */
        public function set_cedula($_cedula)
        {
            $this->_cedula = $_cedula;
        }

        /**
        * get_correo() retorna el correo
        * @return string _correo
        */
        public function get_correo()
        {
            return $this->_correo;
        }

        /**
        * set_correo() setea un valor en el parámetro de _correo
        * @param string $_correo 
        * @return void
        */
        public function set_correo($_correo)
        {
            $this->_correo = $_correo;
        }

        /**
        * get_telefono() retorna el telefono
        * @return string _telefono
        */
        public function get_telefono()
        {
            return $this->_telefono;
        }

        /**
        * set_telefono() setea un valor en el parámetro de _telefono
        * @param string $_telefono 
        * @return void
        */
        public function set_telefono($_telefono)
        {
            $this->_telefono = $_telefono;
        }

        /**
        * get_antiguedad() retorna la antiguedad
        * @return string _antiguedad
        */
        public function get_antiguedad()
        {
            return $this->_antiguedad;
        }

        /**
        * set_antiguedad() setea un valor en el parámetro de _antiguedad
        * @param string $_antiguedad 
        * @return void
        */
        public function set_antiguedad($_antiguedad)
        {
            $this->_antiguedad = $_antiguedad;
        }

        /**
        * get_distribuidor() retorna el id del distribuidor
        * @return integer _distribuidor
        */
        public function get_distribuidor()
        {
            return $this->_distribuidor;
        }

        /**
        * set_distribuidor() setea un valor en el parámetro de _distribuidor
        * @param integer $_distribuidor 
        * @return void
        */
        public function set_distribuidor($_distribuidor)
        {
            $this->_distribuidor = $_distribuidor;
        }
        
        /**
        * get_cargo() retorna el id del cargo
        * @return integer _cargo
        */
        public function get_cargo()
        {
            return $this->_cargo;
        }

        /**
        * set_cargo() setea un valor en el parámetro de _cargo
        * @param integer $_cargo 
        * @return void
        */
        public function set_cargo($_cargo)
        {
            $this->_cargo = $_cargo;
        }
        
        /**
        * get_tipo() retorna el tipo
        * @return integer _tipo
        */
        public function get_tipo()
        {
            return $this->_tipo;
        }

        /**
        * set_tipo() setea un valor en el parámetro de _tipo
        * @param integer $_tipo 
        * @return void
        */
        public function set_tipo($_tipo)
        {
            $this->_tipo = $_tipo;
        }
        
        /**
        * get_usuario() retorna el numero de cédula
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
        * get_fecha_modificado() retorna la fecha en que fue modificado
        * @return datetime _fecha_modificado
        */
        public function get_fecha_modificado()
        {
            return $this->_fecha_modificado;
        }

        /**
        * set_fecha_modificado() setea un valor en el parámetro de _fecha_modificado
        * @param datetime $_fecha_modificado
        * @return void
        */
        public function set_fecha_modificado($_fecha_modificado)
        {
            $this->_fecha_modificado = $_fecha_modificado;
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
         * Initialize get_asistentes()
         * 
         * Esta función retorna un listado de los asistentes o un asistente específico según los parámetros enviados
         * 
         * @access public
         * @param array $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_asistentes($select = array("0" => "*"), $where = array(), $or_where = array(), $join = array())
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
            
            $this->db->order_by("asi_nombre_completo", "asc"); 
            
            $resultado = $this->db->get($this->get_name_table());
            return $resultado;
        }
        
        
        /**
         * Initialize guardar_asistente()
         * 
         * Esta función crea un asistente nuevo en el portal
         * 
         * @access public
         * @return boolean
        */
        public function guardar_asistente()
        {
            $data = array(
               'asi_nombre_completo'        => $this->_nombre,
               'asi_cedula'                 => $this->_cedula ,
               'asi_correo'                 => $this->_correo ,
               'asi_telefono'               => $this->_telefono ,
               'asi_antiguedad'             => $this->_antiguedad ,
               'asi_distribuidor_id'        => $this->_distribuidor,
               'asi_cargo_asistente_id'     => $this->_cargo ,
               'asi_tipo_asistente_id'      => $this->_tipo,
               'asi_usuario_id'             => $this->_usuario ,
               'asi_fecha_modificado'       => $this->_fecha_modificado
            );
            
            $this->db->trans_start();
            $this->db->insert($this->get_name_table(), $data);
            $id_insertado = $this->db->insert_id();
            $this->db->trans_complete();
            
            $parametros = "";
            foreach($data as $dato)
            {
                $parametros = $parametros.$dato.", ";
            }
            
            if ($this->db->trans_status() === FALSE)
            {
                log_message('error', 'Accion: CREAR; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Asistente: null; Info_Asistente: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');
                    
                $this->db->trans_rollback();
            }
            else
            {
                log_message('info', 'Accion: CREAR; Mensaje: EXITO; Id_Asistente: '.$id_insertado.'; Info_Asistente: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');
                    
                $this->db->trans_commit();
            }
                    
            return $this->db->trans_status();
        }
        
        
        /**
         * Initialize update_asistente()
         * 
         * Esta función actualiza la información de un asistente específico según los parámetros enviados
         * 
         * @access public
         * @param array $data 
         * @param array $where 
         * @return boolean
        */
        public function update_asistente($data = array(), $where = array(), $accion = "EDITAR")
        {
            $id_asistente = "";
            if(count($where) > 0)
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                    $id_asistente = $id_asistente.$value.", ";
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
                log_message('error', 'Accion: '.$accion.'; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Asistente: ('.$id_asistente.'); Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');
                    
                $this->db->trans_rollback();
            }
            else
            {
                log_message('info', 'Accion: '.$accion.'; Mensaje: EXITO; Id_Asistente: ('.$id_asistente.'); Info_Lista: ('.$parametros.'); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');
                    
                $this->db->trans_commit();
            }
            
            return $this->db->trans_status();
        }
        
        
        /**
         * Initialize sp_asistente()
         * 
         * Esta función invoca los stored procedures que existen en la base de datos con respecto a esta tabla
         * 
         * @access public
         * @param array $nombre_sp 
         * @param array $data 
         * @return boolean $resultado
        */
        public function sp_asistente($nombre_sp = "", $data = array())
        {
            switch ($nombre_sp) 
            {    
                case 'sp_eliminar_asistente':
                    
                    $query = "call ".$nombre_sp."(".$data['asistente'].",".$data['usuario'].")";
                    $this->db->trans_start();
                    $this->db->query($query); 
                    $this->db->trans_complete();
                    
                    $resultado = $this->db->trans_status();
                    
                    if ($this->db->trans_status() === FALSE)
                    {
                        log_message('error', 'Accion: ELIMINAR; Mensaje: PROBLEMA CON EL SERVIDOR; Id_Asistente: ('.$data['asistente'].'); Info_Lista: (); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');

                        $this->db->trans_rollback();
                    }
                    else
                    {
                        log_message('info', 'Accion: ELIMINAR; Mensaje: EXITO; Id_Asistente: ('.$data['asistente'].'); Info_Lista: (); Realizado por: '.$this->clslogin->getId(), FALSE, 'Asistentes');

                        $this->db->trans_commit();
                    }
                    
                    break;
            }
            
            return $resultado;
        }
    }
?>
