<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * cursos
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class cursos extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_curso","curso");
        }
        
        
        function listar_cursos($tipo = 0){
            
            switch ($tipo) {    
                case 0:
                    
                    $select = "*";
                    $or_where = array("D" => "cur_estado", "C" => "cur_estado", "T" => "cur_estado");
                    $join = array( "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );
                    
                    $resultado = $this->curso->get_cursos($select, array(), $or_where, $join);
                    
                    $items = array();
                    $data = array();
                    //var_dump($resultado);
                    if($resultado){
                        foreach ($resultado->result() as $row) {
                            $fila = array();
                            $fila['id'] = $row->cur_id;
                            $fila['nombre'] = $row->cur_nombre;
                            $fila['fecha_inicio'] = $row->cur_fecha_inicio;
                            $fila['hora_inicio'] = $row->cur_hora_inicio;
                            $fila['ciudad'] = $row->ciu_nombre;
                            $fila['instructor'] = $row->ins_nombre." ".$row->ins_apellido;
                            $fila['estado'] = $row->par_nombre;
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }else{
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;
            }
            
            echo $data;
        }
        
        
        function crear_curso(){
            
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                if (empty($_FILES['imagen']['name']))
                {
                    $this->form_validation->set_rules('imagen', 'Imagen', 'required');
                }
                
                if ($this->form_validation->run() == FALSE)
                {
                    echo json_encode(array('st'=>0, 'msg' => validation_errors()));
                }
                else
                {
                    /* Configuración para la carga de imagenes*/
                    $config['upload_path']   = './recursos/images/Cursos';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '1000';
                    $config['max_width']     = '1024';
                    $config['max_height']    = '768';

                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('imagen'))
                    {
                        echo json_encode(array('st'=>0, 'msg' => $this->upload->display_errors()));
                    }
                    else
                    {
                        $imagen_cargada = $this->upload->data();
                        
                        $this->curso->set_nombre($this->input->post("nombre_curso"));
                        $this->curso->set_descripcion($this->input->post("descripcion"));
                        $this->curso->set_url_imagen($imagen_cargada['full_path']);
                        $this->curso->set_fecha_inicio($this->input->post("fecha_inicio"));
                        $this->curso->set_fecha_fin($this->input->post("fecha_fin"));
                        $this->curso->set_hora_inicio($this->input->post("hora_inicio"));
                        $this->curso->set_hora_fin($this->input->post("hora_fin"));
                        $this->curso->set_jornada($this->input->post("jornada"));
                        $this->curso->set_direccion($this->input->post("direccion_curso"));
                        $this->curso->set_latitud($this->input->post("latitud"));
                        $this->curso->set_longitud($this->input->post("longitud"));
                        $this->curso->set_duracion($this->input->post("duracion"));
                        $this->curso->set_cupos_total($this->input->post("cupos"));
                        $this->curso->set_cupos_disponibles($this->input->post("cupos"));
                        $this->curso->set_costo($this->input->post("costo"));
                        $this->curso->set_comentarios($this->input->post("comentarios"));
                        $this->curso->set_provincia($this->input->post("provincia"));
                        $this->curso->set_ciudad($this->input->post("ciudad"));
                        $this->curso->set_tema($this->input->post("tema"));
                        $this->curso->set_subtema($this->input->post("subtema"));
                        $this->curso->set_instructor($this->input->post("instructor"));
                        $this->curso->set_fecha_modificado(date('Y-m-d H:i:s'));

                        $this->curso->guardar_curso();
                        $resultado = $this->db->_error_message();

                        if(empty($resultado)){
                            echo json_encode(array('st'=>1, 'msg' => 'Curso Guardado con Exito'));
                        }else{
                            echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                        }
                    }
                    
                }
            }
            
        }
        
        
        function editar_curso(){
            
            if ($this->form_validation->run('cursos/crear_curso') == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $imagen_cargada = array();
                
                if (!empty($_FILES['imagen']['name']))
                {
                    /* Configuración para la carga de imagenes*/
                    $config['upload_path']   = './recursos/images/Cursos';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '1000';
                    $config['max_width']     = '1024';
                    $config['max_height']    = '768';

                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('imagen'))
                    {
                        echo json_encode(array('st'=>0, 'msg' => $this->upload->display_errors()));
                    }
                    else
                    {
                        $imagen_cargada = $this->upload->data();
                    }
                }
                
                $data["cur_estado"] = $this->input->post("estado");
                $data["cur_nombre"] = $this->input->post("nombre_curso");
                $data["cur_descripcion"] = $this->input->post("descripcion");
                $data["cur_fecha_inicio"] = $this->input->post("fecha_inicio");
                $data["cur_fecha_fin"] = $this->input->post("fecha_fin");
                $data["cur_hora_inicio"] = $this->input->post("hora_inicio");
                $data["cur_hora_fin"] = $this->input->post("hora_fin");
                $data["cur_jornada"] = $this->input->post("jornada");
                $data["cur_direccion"] = $this->input->post("direccion_curso");
                $data["cur_latitud"] = $this->input->post("latitud");
                $data["cur_longitud"] = $this->input->post("longitud");
                $data["cur_duracion"] = $this->input->post("duracion");
                $data["cur_cupos_total"] = $this->input->post("cupos");
                $data["cur_costo"] = $this->input->post("costo");
                $data["cur_comentarios"] = $this->input->post("comentarios");
                $data["cur_provincia_id"] = $this->input->post("provincia");
                $data["cur_ciudad_id"] = $this->input->post("ciudad");
                $data["cur_tema_id"] = $this->input->post("tema");
                $data["cur_subtema"] = $this->input->post("subtema");
                $data["cur_instructor_id"] = $this->input->post("instructor");
                if(count($imagen_cargada)>0){
                    $data["cur_url_imagen"] = $imagen_cargada['full_path'];
                }
                $data["cur_fecha_modificado"] = date('Y-m-d H:i:s');
                
                $where = array("cur_id" => $this->input->post('id'));

                $resultado = $this->curso->update_cursos($data, $where);
                
                $resultado = $this->db->_error_message();

                if(empty($resultado)){
                    echo json_encode(array('st'=>1, 'msg' => 'Cambios guardados con Exito'));
                }else{
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
            
        }
    }
    
?>
