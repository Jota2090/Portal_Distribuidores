<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');

    /**
     * mod_curso
     *
     * @package      models
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    
    class mod_curso extends CI_Model {
        
        /**
         * @var string      $_name_table            nombre de la tabla en nuestra base de datos
         * @var integer     $_id                    id del curso
         * @var string      $_nombre                nombre del curso
         * @var string      $_descripcion           descripcion del curso
         * @var string      $_url_imagen            url de la imagen del curso
         * @var string      $_fecha_inicio          fecha de incio del curso
         * @var string      $_fecha_fin             fecha en que finaliza el curso
         * @var string      $_hora_inicio           hora de inicio del curso
         * @var string      $_hora_fin              hora en que termina el curso
         * @var string      $_jornada               número de jornadas del curso
         * @var string      $_direccion             dirección del curso
         * @var string      $_latitud               latitud del curso (Usado por el API de Google Maps)
         * @var string      $_longitud              longitutd del curso (Usado por el API de Google Maps)
         * @var string      $_duracion              duración del curso (Número de horas)
         * @var string      $_cupos_total           cupos totales del curso
         * @var string      $_cupos_disponibles     cupos disponibles del curso
         * @var string      $_costo                 costo del curso (Valor monetario)
         * @var string      $_comentarios           comentarios u observaciones del curso
         * @var integer     $_provincia             id de la provincia en que se dictará curso
         * @var integer     $_ciudad                id de laciudad en que se dictará curso
         * @var integer     $_tema                  id del tema sobre lo que tratará el curso
         * @var string      $_subtema               subtema del curso
         * @var integer     $_instructor            id del instructor que dictará el curso
         * @var datetime    $_fecha_modificado      fecha en que es modificado el curso
         * @var string      $_estado                estado del curso (D=Disponible, C=Cancelado, T=Terminado, E=Eliminado)
        */
        
        var $_name_table            = "tbl_curso";
        var $_id                    = 0;
        var $_nombre                = "";
        var $_descripcion           = "";
        var $_url_imagen            = "";
        var $_fecha_inicio          = "";
        var $_fecha_fin             = "";
        var $_hora_inicio           = "";
        var $_hora_fin              = "";
        var $_jornada               = "";
        var $_direccion             = "";
        var $_latitud               = "";
        var $_longitud              = "";
        var $_duracion              = "";
        var $_cupos_total           = "";
        var $_cupos_disponibles     = "";
        var $_costo                 = "";
        var $_comentarios           = "";
        var $_provincia             = 0;
        var $_ciudad                = 0;
        var $_tema                  = 0;
        var $_subtema               = "";
        var $_instructor            = 0;
        var $_fecha_modificado      = "";
        var $_estado                = "";
        
        
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
        * get_descripcion() retorna la descripcion
        * @return string _descripcion
        */
        public function get_descripcion() {
            return $this->_descripcion;
        }

        /**
        * set_descripcion() setea un valor en el parámetro de _descripcion
        * @param string $_descripcion 
        * @return void
        */
        public function set_descripcion($_descripcion) {
            $this->_descripcion = $_descripcion;
        }
        
        /**
        * get_url_imagen() retorna la url de la imagen
        * @return string _url_imagen
        */
        public function get_url_imagen() {
            return $this->_url_imagen;
        }

        /**
        * set_url_imagen() setea un valor en el parámetro de _url_imagen
        * @param string $_url_imagen 
        * @return void
        */
        public function set_url_imagen($_url_imagen) {
            $this->_url_imagen = $_url_imagen;
        }
        
        /**
        * get_fecha_inicio() retorna la fecha de inicio
        * @return date _fecha_inicio
        */
        public function get_fecha_inicio() {
            return $this->_fecha_inicio;
        }

        /**
        * set_fecha_inicio() setea un valor en el parámetro de _fecha_inicio
        * @param date $_fecha_inicio 
        * @return void
        */
        public function set_fecha_inicio($_fecha_inicio) {
            $this->_fecha_inicio = $_fecha_inicio;
        }
        
        /**
        * get_fecha_fin() retorna la fecha de finalización
        * @return date _fecha_fin
        */
        public function get_fecha_fin() {
            return $this->_fecha_fin;
        }

        /**
        * set_fecha_fin() setea un valor en el parámetro de _fecha_fin
        * @param date $_fecha_fin 
        * @return void
        */
        public function set_fecha_fin($_fecha_fin) {
            $this->_fecha_fin = $_fecha_fin;
        }

        /**
        * get_hora_inicio() retorna la hora de inicio
        * @return string _hora_inicio
        */
        public function get_hora_inicio() {
            return $this->_hora_inicio;
        }

        /**
        * set_hora_inicio() setea un valor en el parámetro de _hora_inicio
        * @param string $_hora_inicio 
        * @return void
        */
        public function set_hora_inicio($_hora_inicio) {
            $this->_hora_inicio = $_hora_inicio;
        }

        /**
        * get_hora_fin() retorna la hora de finalización
        * @return string _hora_fin
        */
        public function get_hora_fin() {
            return $this->_hora_fin;
        }

        /**
        * set_hora_fin() setea un valor en el parámetro de _hora_fin
        * @param string $_hora_fin 
        * @return void
        */
        public function set_hora_fin($_hora_fin) {
            $this->_hora_fin = $_hora_fin;
        }

        /**
        * get_jornada() retorna la jornada
        * @return string _jornada
        */
        public function get_jornada() {
            return $this->_jornada;
        }

        /**
        * set_jornada() setea un valor en el parámetro de _jornada
        * @param string $_jornada 
        * @return void
        */
        public function set_jornada($_jornada) {
            $this->_jornada = $_jornada;
        }

        /**
        * get_direccion() retorna la direccion
        * @return string _direccion
        */
        public function get_direccion() {
            return $this->_direccion;
        }

        /**
        * set_direccion() setea un valor en el parámetro de _direccion
        * @param string $_direccion 
        * @return void
        */
        public function set_direccion($_direccion) {
            $this->_direccion = $_direccion;
        }

        /**
        * get_latitud() retorna la latitud
        * @return string _latitud
        */
        public function get_latitud() {
            return $this->_latitud;
        }

        /**
        * set_latitud() setea un valor en el parámetro de _latitud
        * @param string $_latitud 
        * @return void
        */
        public function set_latitud($_latitud) {
            $this->_latitud = $_latitud;
        }

        /**
        * get_longitud() retorna la longitud
        * @return string _longitud
        */
        public function get_longitud() {
            return $this->_longitud;
        }

        /**
        * set_longitud() setea un valor en el parámetro de _longitud
        * @param string $_longitud 
        * @return void
        */
        public function set_longitud($_longitud) {
            $this->_longitud = $_longitud;
        }

        /**
        * get_duracion() retorna la duracion
        * @return string _duracion
        */
        public function get_duracion() {
            return $this->_duracion;
        }

        /**
        * set_duracion() setea un valor en el parámetro de _duracion
        * @param string $_duracion 
        * @return void
        */
        public function set_duracion($_duracion) {
            $this->_duracion = $_duracion;
        }

        /**
        * get_cupos_total() retorna los cupos totales
        * @return string _cupos_total
        */
        public function get_cupos_total() {
            return $this->_cupos_total;
        }

        /**
        * set_cupos_total() setea un valor en el parámetro de _cupos_total
        * @param string $_cupos_total 
        * @return void
        */
        public function set_cupos_total($_cupos_total) {
            $this->_cupos_total = $_cupos_total;
        }

        /**
        * get_cupos_disponibles() retorna los cupos disponibles
        * @return string _cupos_disponibles
        */
        public function get_cupos_disponibles() {
            return $this->_cupos_disponibles;
        }

        /**
        * set_cupos_disponibles() setea un valor en el parámetro de _cupos_disponibles
        * @param string $_cupos_disponibles 
        * @return void
        */
        public function set_cupos_disponibles($_cupos_disponibles) {
            $this->_cupos_disponibles = $_cupos_disponibles;
        }

        /**
        * get_costo() retorna el costo
        * @return string _costo
        */
        public function get_costo() {
            return $this->_costo;
        }

        /**
        * set_costo() setea un valor en el parámetro de _costo
        * @param string $_costo 
        * @return void
        */
        public function set_costo($_costo) {
            $this->_costo = $_costo;
        }

        /**
        * get_comentarios() retorna los comentarios u observaciones
        * @return string _comentarios
        */
        public function get_comentarios() {
            return $this->_comentarios;
        }

        /**
        * set_comentarios() setea un valor en el parámetro de _comentarios
        * @param string $_comentarios 
        * @return void
        */
        public function set_comentarios($_comentarios) {
            $this->_comentarios = $_comentarios;
        }

        /**
        * get_provincia() retorna la provincia
        * @return integer _provincia
        */
        public function get_provincia() {
            return $this->_provincia;
        }

        /**
        * set_provincia() setea un valor en el parámetro de _provincia
        * @param integer $_provincia 
        * @return void
        */
        public function set_provincia($_provincia) {
            $this->_provincia = $_provincia;
        }

        /**
        * get_ciudad() retorna la ciudad
        * @return integer _ciudad
        */
        public function get_ciudad() {
            return $this->_ciudad;
        }

        /**
        * set_ciudad() setea un valor en el parámetro de _ciudad
        * @param integer $_ciudad 
        * @return void
        */
        public function set_ciudad($_ciudad) {
            $this->_ciudad = $_ciudad;
        }

        /**
        * get_tema() retorna el tema
        * @return integer _tema
        */
        public function get_tema() {
            return $this->_tema;
        }

        /**
        * set_tema() setea un valor en el parámetro de _tema
        * @param integer $_tema 
        * @return void
        */
        public function set_tema($_tema) {
            $this->_tema = $_tema;
        }

        /**
        * get_subtema() retorna el subtema
        * @return string _subtema
        */
        public function get_subtema() {
            return $this->_subtema;
        }

        /**
        * set_subtema() setea un valor en el parámetro de _subtema
        * @param string $_subtema 
        * @return void
        */
        public function set_subtema($_subtema) {
            $this->_subtema = $_subtema;
        }

        /**
        * get_instructor() retorna la hora de inicio
        * @return integer _instructor
        */
        public function get_instructor() {
            return $this->_instructor;
        }

        /**
        * set_instructor() setea un valor en el parámetro de _instructor
        * @param integer $_instructor 
        * @return void
        */
        public function set_instructor($_instructor) {
            $this->_instructor = $_instructor;
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
         * Initialize get_cursos()
         * 
         * Esta función retorna el listado de cursos o un curso específico según los parámetros enviados
         * 
         * @access public
         * @param string $select 
         * @param array $where 
         * @param array $or_where 
         * @param array $join 
         * @return array $resultado
        */
        public function get_cursos($select = "*", $where = array(), $or_where = array(), $join = array()){
            
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
            
            
            $this->db->order_by("cur_fecha_inicio", "desc"); 
            
            $resultado = $this->db->get($this->get_name_table());
            
            return $resultado;
        }
        
        
        /**
         * Initialize guardar_curso()
         * 
         * Esta función crea un curso nuevo en el portal
         * 
         * @access public
         * @return void
        */
        public function guardar_curso(){
            
            $data = array(
               'cur_nombre'             => $this->_nombre,
               'cur_descripcion'        => $this->_descripcion ,
               'cur_url_imagen'         => $this->_url_imagen ,
               'cur_fecha_inicio'       => $this->_fecha_inicio ,
               'cur_fecha_fin'          => $this->_fecha_fin ,
               'cur_hora_inicio'        => $this->_hora_inicio,
               'cur_hora_fin'           => $this->_hora_fin ,
               'cur_jornada'            => $this->_jornada,
               'cur_direccion'          => $this->_direccion ,
               'cur_latitud'            => $this->_latitud ,
               'cur_longitud'           => $this->_longitud ,
               'cur_duracion'           => $this->_duracion ,
               'cur_cupos_total'        => $this->_cupos_total,
               'cur_cupos_disponibles'  => $this->_cupos_disponibles ,
               'cur_costo'              => $this->_costo ,
               'cur_comentarios'        => $this->_comentarios ,
               'cur_provincia_id'       => $this->_provincia ,
               'cur_ciudad_id'          => $this->_ciudad ,
               'cur_tema_id'            => $this->_tema ,
               'cur_subtema'            => $this->_subtema ,
               'cur_instructor_id'      => $this->_instructor ,
               'cur_fecha_modificado'   => $this->_fecha_modificado
            );

            $resultado = $this->db->insert($this->get_name_table(), $data);
            
            return $resultado;
        }
        
        
        /**
         * Initialize update_cursos()
         * 
         * Esta función actualiza la información de un curso específico según los parámetros enviados
         * 
         * @access public
         * @param array $data 
         * @param array $where 
         * @return array $resultado
        */
        public function update_cursos($data = array(), $where = array()){
            
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
