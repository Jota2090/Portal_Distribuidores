<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * administrador
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class administrador extends CI_Controller
    {
        var $_data = array(
                            "scripts" => "administrador/vw_scripts_css",
                            "header" => "administrador/vw_header",
                            "superior" => "administrador/contenido/superior/vw_inicio_superior",
                            "inferior" => "administrador/contenido/inferior/vw_inicio_inferior",
                            "inferior_data" => "",
                            "superior_data" => ""
                        );
            
        function __construct()
        {
            parent::__construct();
            
            if($this->uri->segment(2) != "" && $this->uri->segment(2) != "index"
                && $this->uri->segment(2) != "buscador_cursos"
                && $this->uri->segment(2) != "ver_informacion_cursos"
                && $this->uri->segment(2) != "form_crear_enviar_detalle_curso")
            {
                if($this->uri->segment(3) == 'pendientes' && $this->uri->segment(2) == 'usuarios')
                {
                    $this->session->set_userdata('url_destino', 'pendientes');
                }

                if(!$this->clslogin->check(1))
                {
                    redirect('administrador');
                }
                else
                {
                    if($this->session->userdata('url_destino') == 'pendientes')
                    {
                        $this->session->unset_userdata('url_destino');
                        $this->session->set_userdata('opcion_pestana', 'pendientes');
                        redirect('administrador/usuarios');
                    }
                }
            }
            
            $this->load->model("mod_curso","curso");
            $this->load->model("mod_usuario","usuario");
        }
        
        
        function index()
        {
            if(!$this->clslogin->check(1))
            {
                $this->_data['header_data'] = '';
            }
            else
            {
                $this->_data['header_data']['auth'] = $this->clslogin->check(1);
                $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();  
            }
            
            $select = "*";
            $where = array("cur_estado" => "D", "cur_publicado" => "1");
            $order_by = array("cur_fecha_inicio" => "desc");
            $this->_data['inferior_data']['cursos'] = $this->curso->get_cursos($select, $where, array(), array(), $order_by);
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function cursos()
        {
            $this->_data['header_data']['auth'] = $this->clslogin->check(1);
            $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
            $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();

            $this->_data['inferior'] = 'administrador/contenido/inferior/vw_listado_curso';
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function form_crear_curso()
        {
            $this->load->model("mod_instructor","instructor");
            $this->load->model("mod_provincia","provincia");
            $this->load->model("mod_tema","tema");
            
            $resultado = $this->instructor->get_instructores('*', array('ins_estado'=>'A'));
            $data['instructores'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['instructores'][$row->ins_cedula] = $row->ins_apellido." ".$row->ins_nombre;
                }
            }
            
            $resultado = $this->provincia->get_provincias('*', array('pro_estado'=>'A'));
            $data['provincias'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['provincias'][$row->pro_id] = $row->pro_nombre;
                }
            }
            
            $resultado = $this->tema->get_temas('*', array('tem_estado'=>'D'));
            $data['temas'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['temas'][$row->tem_id] = $row->tem_nombre;
                }
            }
            
            $data['ciudades'][''] = 'Seleccione';
            
            $this->load->view("administrador/contenido/inferior/vw_crear_curso", $data);
        }
        
        
        function google_maps($latitud, $longitud, $direccion)
        {
            $data['latitud'] = $latitud;
            $data['longitud'] = $longitud;
            $data['direccion'] = str_replace("_", " ", $direccion);
            
            $this->load->view("vw_google_maps", $data);
        }
        
        function tabla_listado_cursos()
        {
            $this->load->view("administrador/contenido/inferior/ajax/vw_tabla_listado_curso");
        }
                
        
        function ver_curso()
        {
            $select = "*";
            $where = array("cur_id" => $this->input->post('id'));
            $join = array( "tbl_tema" => "cur_tema_id=tem_id", "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_provincia" => "cur_provincia_id=pro_id" );

            $resultado = $this->curso->get_cursos($select, $where, array(), $join);
            
            $data['resultado'] = $resultado;
            
            $this->load->view("administrador/contenido/inferior/vw_ver_detalles_curso", $data);
        }
        
        
        function editar_curso()
        {
            $this->load->model("mod_instructor","instructor");
            $this->load->model("mod_provincia","provincia");
            $this->load->model("mod_tema","tema");
            $this->load->model("mod_ciudad","ciudad");
            
            $select = "*";
            $where = array("cur_id" => $this->input->post('id'));
            $resultado = $this->curso->get_cursos($select, $where, array(), array());
            $data['resultado'] = $resultado;
            
            $resultado = $this->instructor->get_instructores('*', array('ins_estado'=>'A'));
            $data['instructores'] = array('' => 'Seleccione');
            if($resultado){
                $data['instructores'][''] = 'Seleccione';
                foreach ($resultado->result() as $row) {
                    $data['instructores'][$row->ins_cedula] = $row->ins_apellido." ".$row->ins_nombre;
                }
            }
            
            $resultado = $this->provincia->get_provincias('*', array('pro_estado'=>'A'));
            $data['provincias'] = array('' => 'Seleccione');
            if($resultado){
                $data['provincias'][''] = 'Seleccione';
                foreach ($resultado->result() as $row) {
                    $data['provincias'][$row->pro_id] = $row->pro_nombre;
                }
            }
            
            $resultado = $this->tema->get_temas('*', array('tem_estado'=>'D'));
            $data['temas'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['temas'][$row->tem_id] = $row->tem_nombre;
                }
            }
            
            $data['estados']['D'] = 'Disponible';
            $data['estados']['C'] = 'Cancelado';
            $data['estados']['T'] = 'Terminado';
            
            $this->load->view("administrador/contenido/inferior/vw_editar_curso", $data);
        }
        
        
        function eliminar_curso()
        {
            $data = array('0'=>"'".$this->input->post("id")."'");
            $resultado = $this->curso->sp_curso('sp_eliminar_curso', $data);
            
            $this->tabla_listado_cursos();
        }
        
        
        function usuarios()
        {
            $this->_data['header_data']['auth'] = $this->clslogin->check(1);
            $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
            $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();

            $this->_data['inferior'] = 'administrador/contenido/inferior/vw_listado_usuario';
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        } 


        function ver_usuarios($tipo)
        {
            switch ($tipo)
            {
                case 'activos':
                    $this->load->view("administrador/contenido/inferior/ajax/vw_usuarios_activos");
                    break;

                case 'inactivos':
                    $this->load->view("administrador/contenido/inferior/ajax/vw_usuarios_inactivos");
                    break;

                case 'pendientes':
                    $this->load->view("administrador/contenido/inferior/ajax/vw_usuarios_pendientes");
                    break;

                case 'rechazados':
                    $this->load->view("administrador/contenido/inferior/ajax/vw_usuarios_rechazados");
                    break;
                
                default:
                    $this->load->view("administrador/contenido/inferior/ajax/vw_usuarios_activos");
                    break;
            }
        }


        function inactivar_usuario()
        {
            $data = array('usu_estado'=>'I', 'usu_fecha_modificado'=>date('Y-m-d H:i:s'));
            $where = array('usu_cedula' => $this->input->post("id"));
            $resultado = $this->usuario->update_usuarios($data, $where);
            
            if($resultado)
            {
                log_message('info', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Inactivar_Usuarios_EXITO');
            }
            else
            {
                log_message('error', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Inactivar_Usuarios_ERROR');
            }

            $this->ver_usuarios($this->input->post("tipo"));   
        }


        function eliminar_usuario()
        {
            $data = array('usu_estado'=>'E', 'usu_fecha_modificado'=>date('Y-m-d H:i:s'));
            $where = array('usu_cedula' => $this->input->post("id"));
            $resultado = $this->usuario->update_usuarios($data, $where);
            
            if($resultado)
            {
                log_message('info', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Eliminar_Usuarios_EXITO');
            }
            else
            {
                log_message('error', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Eliminar_Usuarios_ERROR');
            }

            $this->ver_usuarios($this->input->post("tipo"));   
        }


        function activar_usuario()
        {
            $data = array('usu_estado'=>'A', 'usu_fecha_modificado'=>date('Y-m-d H:i:s'));
            $where = array('usu_cedula' => $this->input->post("id"));
            $resultado = $this->usuario->update_usuarios($data, $where);
            
            if($resultado)
            {
                log_message('info', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Activar_Usuarios_EXITO');
            }
            else
            {
                log_message('error', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Activar_Usuarios_ERROR');
            }

            $this->ver_usuarios($this->input->post("tipo"));   
        }


        function rechazar_usuario()
        {
            $data = array('usu_estado'=>'R', 'usu_fecha_modificado'=>date('Y-m-d H:i:s'));
            $where = array('usu_cedula' => $this->input->post("id"));
            $resultado = $this->usuario->update_usuarios($data, $where);
            
            if($resultado)
            {
                log_message('info', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Rechazar_Usuarios_EXITO');
            }
            else
            {
                log_message('error', 'Usuario: '.$this->input->post("id").', Realizado por: '.$this->clslogin->getId(), FALSE, 'Rechazar_Usuarios_ERROR');
            }

            $this->ver_usuarios($this->input->post("tipo"));   
        }
        
        
        function form_crear_usuario()
        {
            $this->load->view("vw_crear_usuario");
        }
        
        
        function buscador_cursos()
        {
            if(!$this->clslogin->check(1))
            {
                $this->_data['header_data']['form_login'] = '';
            }
            else
            {
                $this->_data['header_data']['auth'] = $this->clslogin->check(1);
                $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();
            }

            $this->_data['interna'] = 'vw_buscador_cursos';
            
            $string = $this->input->post('nombre_curso');
            
            if($string != "" && $string != null)
            {
                $query = "  SELECT `cur_id`, `cur_nombre`, `cur_descripcion`, `cur_url_imagen`, `cur_nombre_imagen`
                            FROM (`tbl_curso`)
                            JOIN `tbl_tema` ON `cur_tema_id`=`tem_id`
                            WHERE `cur_estado`  = 'D'
                            AND (
                                    `cur_nombre`  LIKE '%".$string."%'
                                    OR  `cur_descripcion`  LIKE '%".$string."%'
                                    OR  `tem_nombre`  LIKE '%".$string."%'
                                    OR  `cur_subtema`  LIKE '%".$string."%'
                                )
                            ORDER BY `cur_fecha_inicio` desc
                          ";
            }
            else
            {
                $query = "  SELECT `cur_id`, `cur_nombre`, `cur_descripcion`, `cur_url_imagen`, `cur_nombre_imagen`
                            FROM (`tbl_curso`)
                            JOIN `tbl_tema` ON `cur_tema_id`=`tem_id`
                            WHERE `cur_estado`  = 'D'
                            ORDER BY `cur_fecha_inicio` desc
                         ";
            }
            
            $this->_data['interna_data']['resultado'] = $this->db->query($query);
            $this->_data['interna_data']['string_busqueda'] = $string;
            $this->_data['interna_data']['controller'] = "administrador";
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function ver_informacion_cursos($id_curso)
        {
            if(!$this->clslogin->check(1))
            {
                $this->_data['header_data']['form_login'] = '';
            }
            else
            {
                $this->_data['header_data']['auth'] = $this->clslogin->check(1);
                $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();
            }

            $this->_data['interna'] = 'vw_ver_informacion_curso';
            
            $select = "*";
            $where = array("cur_id" => $id_curso, "cur_estado" => "D");
            $join = array( "tbl_tema" => "cur_tema_id=tem_id", "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_provincia" => "cur_provincia_id=pro_id" );

            $resultado = $this->curso->get_cursos($select, $where, array(), $join);
            
            $this->_data['interna_data']['resultado'] = $resultado;
            $this->_data['interna_data']['controller'] = "administrador";
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function form_crear_enviar_detalle_curso()
        {
            $data['curso'] = $this->input->post('id');
            
            $this->load->view("vw_enviar_detalle_curso", $data);
        }
        
        
        function editar_usuario()
        {
            $where = array("usu_estado" => "A", "usu_tipo" => "A", "usu_cedula" => $this->input->post('id'));
            $data['resultado'] = $this->usuario->get_usuarios(array(), $where);
            
            $this->load->view("vw_editar_usuario", $data);
        }
        
        
        function editar_contrasena()
        {
            $data['ced'] = $this->input->post('id');
            
            $this->load->view("vw_editar_contrasena", $data);
        }
    }
    
?>

