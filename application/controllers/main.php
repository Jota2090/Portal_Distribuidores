<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * main
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class main extends CI_Controller
    {
        var $_data = array(
                            "scripts" => "main/vw_scripts_css",
                            "header" => "main/vw_header",
                            "superior" => "main/contenido/superior/vw_inicio_superior",
                            "inferior" => "main/contenido/inferior/vw_inicio_inferior",
                            "inferior_data" => "",
                            "superior_data" => ""
                        );
        
        function __construct()
        {
            parent::__construct();
            
            if($this->uri->segment(2) != "" && $this->uri->segment(2) != "index" 
                && $this->uri->segment(2) != "form_crear_usuario"
                && $this->uri->segment(2) != "form_crear_olvido_contrasena"
                && $this->uri->segment(2) != "buscador_cursos"
                && $this->uri->segment(2) != "ver_informacion_cursos"
                && $this->uri->segment(2) != "form_crear_enviar_detalle_curso")
            {
                if(!$this->clslogin->check(0))
                {
                    echo "<script>"
                            ."alert('Hubo mucho tiempo de inactividad, por favor vuelva a loguearse.');"
                            ."window.location.href='../main';"
                        ."</script>";
                }
            }
            
            $this->load->model("mod_curso","curso");
            $this->load->model("mod_usuario","usuario");
            $this->load->model("mod_asistente","asistente");
            $this->load->model("mod_lista_asistente","lista_asistente");
            $this->load->model("mod_registro_asistente_lista","registro_asistente_lista");
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
            
            $this->_data['interna_data']['controller'] = "main";
            
            if(!$this->clslogin->check(0))
            {
                $this->_data['header_data']['form_login'] = '';
            }
            else
            {
                $this->_data['header_data']['auth'] = $this->clslogin->check(0);
                $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();
            }
        }
        
        
        function index()
        {
            $select = "*";
            $where = array("cur_estado" => "D", "cur_publicado" => "1");
            $order_by = array("cur_fecha_inicio" => "asc");
            $this->_data['inferior_data']['cursos'] = $this->curso->get_cursos($select, $where, array(), array(), $order_by);
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
 

        function form_crear_usuario()
        {
            $this->load->view("vw_crear_usuario");
        }


        function form_crear_olvido_contrasena()
        {
            $this->load->view("vw_olvido_contrasena");
        }

       
        function lista_asistente()
        {
            $this->_data['inferior'] = 'main/contenido/inferior/vw_lista_asistente';
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function tabla_lista_asistente()
        {
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_lista_asistente");
        }
        
        
        function form_crear_lista_asistente()
        {
            $select = array("0" => "*");
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId());
            $resultado = $this->asistente->get_asistentes($select, $where);
            $data['resultado'] = $resultado;
            
            $this->load->view("main/contenido/inferior/vw_crear_lista_asistente", $data);
        }
        
        
        function editar_lista_asistente()
        {
            $select = "*";
            $where = array("la_estado" => "D", "la_usuario_id" => $this->clslogin->getId(), "la_id" => $this->input->post("id"));
            $resultado = $this->lista_asistente->get_listas_asitentes($select, $where);
            $data['lista'] = $resultado;
            
            $select = "*";
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "ral_lista_asistente_id" => $this->input->post("id"));
            $join = array( "tbl_asistente" => "ral_asistente_id=asi_cedula" );
            $order_by = array("asi_nombre_completo" => "asc");
            $resultado = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where, array(), $join, $order_by);
            $data['lista_asistentes']['asistentes'] = $resultado;
            
            $this->load->view("main/contenido/inferior/vw_editar_lista_asistente", $data);
        }
        
        
        function eliminar_lista_asistente()
        {
            $data = array('lista'=>"'".$this->input->post('id')."'", 'usuario'=>"'".$this->clslogin->getId()."'");
            $this->lista_asistente->sp_lista_asistente('sp_eliminar_lista_asistente', $data);
            $this->tabla_lista_asistente();
        }
        
        
        function form_crear_asistente()
        {
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId());
            $order_by = array("asi_nombre_completo" => "asc");
            $resultado = $this->asistente->get_asistentes(array(), $where, array(), array(), $order_by);
            $data['lista_asistentes']['asistentes_disponibles'] = $resultado;
            
            $this->load->view("main/contenido/inferior/vw_asistente", $data);
        }
        
        
        function asistentes_disponibles()
        {
            $select = array("0" => "*");
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId());
            $resultado = $this->asistente->get_asistentes($select, $where);
            $data['asistentes_disponibles'] = $resultado;
            
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_disponibles", $data);
        }

        
        function asistente_nuevo()
        {
            $this->load->model("mod_distribuidor","distribuidor");
            $this->load->model("mod_cargo_asistente","cargo_asistente");
            $this->load->model("mod_tipo_asistente","tipo_asistente");
            
            $select = array("0" => "*");
            $where = array("dis_estado" => "A");
            $resultado = $this->distribuidor->get_distribuidores($select, $where);
            $data['distribuidores'] = array('' => 'Seleccione');
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['distribuidores'][$row->dis_razon_social] = $row->dis_nombre;
                }
            }
            
            $where = array("ca_estado" => "D");
            $resultado = $this->cargo_asistente->get_cargos_asistente($select, $where);
            $data['cargos_asistente'] = array('' => 'Seleccione');
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['cargos_asistente'][$row->ca_id] = $row->ca_nombre;
                }
            }
            
            $where = array("ta_estado" => "D");
            $resultado = $this->tipo_asistente->get_tipos_asistente($select, $where);
            $data['tipos_asistente'] = array();
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['tipos_asistente'][$row->ta_id] = $row->ta_nombre;
                }
            }
            
            $this->load->view("main/contenido/inferior/ajax/vw_crear_asistente", $data);
        }
        
        
        function editar_asistente()
        {
            $this->load->model("mod_distribuidor","distribuidor");
            $this->load->model("mod_cargo_asistente","cargo_asistente");
            $this->load->model("mod_tipo_asistente","tipo_asistente");
            
            $select = array("0" => "*");
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "asi_cedula" => $this->input->post('id_asistente'));
            $resultado = $this->asistente->get_asistentes($select, $where);
            $data['asistente'] = $resultado;
            
            $where = array("dis_estado" => "A");
            $resultado = $this->distribuidor->get_distribuidores($select, $where);
            $data['distribuidores'] = array('' => 'Seleccione');
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['distribuidores'][$row->dis_razon_social] = $row->dis_nombre;
                }
            }
            
            $where = array("ca_estado" => "D");
            $resultado = $this->cargo_asistente->get_cargos_asistente($select, $where);
            $data['cargos_asistente'] = array('' => 'Seleccione');
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['cargos_asistente'][$row->ca_id] = $row->ca_nombre;
                }
            }
            
            $where = array("ta_estado" => "D");
            $resultado = $this->tipo_asistente->get_tipos_asistente($select, $where);
            $data['tipos_asistente'] = array();
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['tipos_asistente'][$row->ta_id] = $row->ta_nombre;
                }
            }
            
            $this->load->view("main/contenido/inferior/ajax/vw_editar_asistente", $data);
        }
        
        
        function eliminar_asistente_listado()
        {
            $data = array('asistente'=>"'".$this->input->post('id_asistente')."'", 'usuario'=>"'".$this->clslogin->getId()."'");
            $this->asistente->sp_asistente('sp_eliminar_asistente', $data);
            $this->asistentes_disponibles();
        }
        
        
        function quitar_asistente_lista()
        {
            $data = array('lista'=>"'".$this->input->post("id_lista")."'", 'asistente'=>"'".$this->input->post("id_asistente")."'");
            $resultado = $this->lista_asistente->sp_lista_asistente('sp_quitar_asistente_lista', $data);
            
            $select = "*";
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "ral_lista_asistente_id" => $this->input->post("id_lista"));
            $join = array( "tbl_asistente" => "ral_asistente_id=asi_cedula" );
            $order_by = array("asi_nombre_completo" => "asc");
            $resultado = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where, array(), $join, $order_by);
            $data['asistentes'] = $resultado;
            
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_agregados_listas", $data);
        }
        
        
        function listado_asistentes_agregados($id_lista)
        {
            $select = "*";
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "ral_lista_asistente_id" => $id_lista);
            $join = array( "tbl_asistente" => "ral_asistente_id=asi_cedula" );
            $order_by = array("asi_nombre_completo" => "asc");
            $resultado = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where, array(), $join, $order_by);
            $data['asistentes'] = $resultado;
            
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_agregados_listas", $data);
        }
        
        
        function listado_asistentes_disponibles($id_lista)
        {
            $select = "*";
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "ral_lista_asistente_id" => $id_lista);
            $join = array( "tbl_asistente" => "ral_asistente_id=asi_cedula" );
            $order_by = array("asi_nombre_completo" => "asc");
            $resultado_agregados = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where, array(), $join, $order_by);
            
            $select = array("0" => "*");
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId());
            $resultado_disponibles = $this->asistente->get_asistentes($select, $where);
            
            if($resultado_agregados && $resultado_disponibles)
            {
                if($resultado_agregados->num_rows() > 0)
                {
                    foreach($resultado_disponibles->result_array() as $row_d)
                    {
                        $no_existe = true;
                        
                        foreach($resultado_agregados->result_array() as $row_a)
                        {
                            if($row_a['asi_cedula'] == $row_d['asi_cedula'])
                            {
                                $no_existe = false;
                            }
                        }
                        
                        if($no_existe)
                        {
                            $data['asistentes'][] = $row_d;
                        }
                    }
                }
                else
                {
                    $data['asistentes'] = $resultado_disponibles->result_array();
                }
            }
            else
            {
                $data['asistentes'] = '';
            }
            
            if(!isset($data['asistentes'])){    $data['asistentes'] = '';   }
              
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_asistentes_disponibles_listas", $data);
        }
        
        
        function cursos_usuarios()
        {
            $this->_data['inferior'] = 'main/contenido/inferior/vw_listado_cursos';
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }


        function tabla_cursos_usuarios()
        {
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_listado_cursos");
        }
        
        
        function ver_curso()
        {
            $select = "*";
            $where = array("cur_id" => $this->input->post('id'), "cur_estado" => "D");
            $join = array( "tbl_tema" => "cur_tema_id=tem_id", "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_provincia" => "cur_provincia_id=pro_id" );

            $resultado = $this->curso->get_cursos($select, $where, array(), $join);
            
            $data['resultado'] = $resultado;
            
            $this->load->view("main/contenido/inferior/ajax/vw_ver_detalles_curso", $data);
        }
        
        
        function form_crear_asistente_curso()
        {
            $this->load->model("mod_curso","curso");
            
            $select = "cur_nombre, cur_cupos_usados, cur_cupos_total";
            $where = array("cur_estado" => "D", "cur_id" => $this->input->post('id'));
            $resultado = $this->curso->get_cursos($select, $where);
            if($resultado)
            {
                if ($resultado->num_rows() == 1)
                {
                    $row = $resultado->row();
                    $data['curso_nombre'] = $row->cur_nombre;

                    $cupos_disponibles = $row->cur_cupos_total - $row->cur_cupos_usados;
                    $data['curso_cupos'] = $cupos_disponibles;
                }
            }
            
            $select = "*";
            $where = array("la_estado" => "D", "la_usuario_id" => $this->clslogin->getId());
            $resultado = $this->lista_asistente->get_listas_asitentes($select, $where);
            
            $data['listas_asistente'] = array('' => 'Seleccione');
            if($resultado)
            {
                foreach ($resultado->result() as $row)
                {
                    $data['listas_asistente'][$row->la_id] = $row->la_nombre;
                }
            }
            
            $data['id_curso'] = $this->input->post('id');
            
            $this->load->view("main/contenido/inferior/vw_registrar_asistencia", $data);
        }


        function asistentes_agregados_cursos($id_curso,$id_lista)
        {
            $data['existe_lista'] = false;
            
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
            
            $post_lista = $this->input->post('lista_asistente');
            
            if(($id_lista == 0 || $id_lista == null || $id_lista == "") && $post_lista)
            {   
                $id_lista = $this->input->post('lista_asistente');
            }
            
            if($id_lista != 0 && $id_lista != null && $id_lista != "")
            {
                $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(),
                            "rac_lista_asistente_id" => $id_lista,
                            "rac_curso_id" => $id_curso );
                $join = array( "tbl_asistente" => "rac_asistente_id=asi_cedula" );
                $order_by = array("asi_nombre_completo" => "asc");
                $resultado = $this->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join, $order_by);

                $asistentes = $resultado;
                $data['existe_lista'] = true;
            }
            
            if($post_lista)
            {
                $data['lista_asistentes']['asistentes'] = $asistentes;
                $data['curso_id'] = $id_curso;
                $data['lista_id'] = $id_lista;
                $data['view'] = 'main/contenido/inferior/ajax/vw_tabla_asistentes_agregados_cursos';

                $this->load->view('main/contenido/inferior/vw_opciones_registrar_asistencia', $data);
            }
            else
            {
                if($data['existe_lista'])
                {
                    $data['asistentes'] = $asistentes;
                    $this->load->view('main/contenido/inferior/ajax/vw_tabla_asistentes_agregados_cursos', $data);
                }
                else
                {
                    $this->load->view('main/contenido/inferior/vw_opciones_registrar_asistencia', $data);
                }
            }
        }
        
        
        function asistentes_disponibles_cursos($id_curso,$id_lista)
        {
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
            
            if($id_lista != 0 && $id_lista != null && $id_lista != "")
            {
                $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(),
                                "rac_lista_asistente_id" => $id_lista,
                                "rac_curso_id" => $id_curso );
                $join = array( "tbl_asistente" => "rac_asistente_id=asi_cedula" );
                $order_by = array("asi_nombre_completo" => "asc");
                $resultado_agregados = $this->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join, $order_by);
                
                $select = "*";
                $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(), "ral_lista_asistente_id" => $id_lista);
                $join = array( "tbl_asistente" => "ral_asistente_id=asi_cedula" );
                $order_by = array("asi_nombre_completo" => "asc");
                $resultado_disponibles = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where, array(), $join, $order_by);

                if($resultado_agregados && $resultado_disponibles)
                {
                    if($resultado_agregados->num_rows() > 0)
                    {
                        foreach($resultado_disponibles->result_array() as $row_d)
                        {
                            $no_existe = true;

                            foreach($resultado_agregados->result_array() as $row_a)
                            {
                                if($row_a['asi_cedula'] == $row_d['asi_cedula'])
                                {
                                    $no_existe = false;
                                }
                            }

                            if($no_existe)
                            {
                                $data['asistentes'][] = $row_d;
                            }
                        }
                    }
                    else
                    {
                        $data['asistentes'] = $resultado_disponibles->result_array();
                    }
                }
                else
                {
                    $data['asistentes'] = '';
                }

                if(!isset($data['asistentes'])){    $data['asistentes'] = '';   }
            }

            $this->load->view('main/contenido/inferior/ajax/vw_tabla_asistentes_disponibles_cursos', $data);
        }
        
        
        function quitar_asistente_lista_curso()
        {
            $id_curso = $this->input->post("id_curso");
            $id_lista = $this->input->post("id_lista");
            $id_asistente = $this->input->post("id_asistente");
            
            $where = array("rac_curso_id" => $id_curso, "rac_asistente_id" => $id_asistente);
            $resultado = $this->registro_asistente_curso->delete_asistente_curso($where);
                
            if($resultado)
            {
                $select = "cur_cupos_usados";
                $where = array("cur_id" => $id_curso);
                $resultado = $this->curso->get_cursos($select, $where);

                if($resultado)
                {
                    if($resultado->num_rows() == 1)
                    {
                        $row = $resultado->row();
                        $cupos_usados = $row->cur_cupos_usados - 1;

                        $data["cur_cupos_usados"] = $cupos_usados;
                        $data["cur_fecha_modificado"] = date('Y-m-d H:i:s');
                            
                        $where = array("cur_id" => $id_curso);

                        $resultado = $this->curso->update_cursos($data, $where);
                    }
                }        
            }
            else
            {
                echo 'Hubo un problema con el servidor, por favor vuelva a intentar';
            }
            
            $this->asistentes_agregados_cursos($id_curso,$id_lista);
        }
        
        
        function buscador_cursos()
        {
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
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function ver_informacion_cursos($id_curso)
        {
            $this->_data['interna'] = 'vw_ver_informacion_curso';
            
            $select = "*";
            $where = array("cur_id" => $id_curso, "cur_estado" => "D");
            $join = array( "tbl_tema" => "cur_tema_id=tem_id", "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_provincia" => "cur_provincia_id=pro_id" );

            $resultado = $this->curso->get_cursos($select, $where, array(), $join);
            
            $this->_data['interna_data']['resultado'] = $resultado;
            $this->_data['interna_data']['controller'] = "main";
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function form_crear_enviar_detalle_curso()
        {
            $data['curso'] = $this->input->post('id');
            
            $this->load->view("vw_enviar_detalle_curso", $data);
        }


        function form_crear_imprimir_asistencia()
        {
            $this->load->model("mod_curso","curso");
            
            $select = "cur_nombre";
            $where = array("cur_estado" => "D", "cur_id" => $this->input->post('id'));
            $resultado = $this->curso->get_cursos($select, $where);
            if($resultado)
            {
                if ($resultado->num_rows() == 1)
                {
                    $row = $resultado->row();
                    $data['curso_nombre'] = $row->cur_nombre;
                }
            }
            
            $where = array("asi_estado" => "A", "asi_usuario_id" => $this->clslogin->getId(),
                            "rac_curso_id" => $this->input->post('id') );
            $join = array( "tbl_asistente" => "rac_asistente_id=asi_cedula", "tbl_lista_asistente" => "rac_lista_asistente_id=la_id");
            $order_by = array("la_nombre" => "asc", "asi_nombre_completo" => "asc");
            $resultado = $this->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join, $order_by);

            $data['resultado'] = $resultado;
            
            $data['id_curso'] = $this->input->post('id');
            
            $this->load->view("main/contenido/inferior/vw_imprimir_asistencia", $data);
        }
        
        
        function editar_usuario()
        {
            $where = array("usu_estado" => "A", "usu_tipo" => "U", "usu_cedula" => $this->input->post('id'));
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

