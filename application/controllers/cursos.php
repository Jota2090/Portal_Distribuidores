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
    class cursos extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_curso","curso");
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
            
            $configs = array(
                                'protocol'  =>  'sendmail',
                                'smtp_host' =>  'dedrelay.secureserver.net',
                                'mailpath'  =>  '/usr/sbin/sendmail',
                                'mailtype'  =>  'html'
                            );
            $this->load->library('email', $configs);
        }
        
        
        function listar_cursos($tipo = 0, $estado = "D")
        {
            switch ($tipo)
            {    
                case 0:
                    
                    $select = "*";
                    
                    switch ($estado)
                    {    
                        case "D":
                            $where = array("cur_estado" => "D");
                            break;
                        
                        case "T":
                            $where = array("cur_estado" => "T");
                            break;
                        
                        case "C":
                            $where = array("cur_estado" => "C");
                            break;
                        
                        default:
                            $where = array("cur_estado" => "D");
                            break;
                    }
                        
                    $join = array( "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );
                    
                    $resultado = $this->curso->get_cursos($select, $where, array(), $join);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $cupos_disponibles = $row->cur_cupos_total - $row->cur_cupos_usados;
                            
                            $fila = array();
                            $fila['id'] = $row->cur_id;
                            $fila['cupos'] = $cupos_disponibles;
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
                    }
                    else
                    {
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;
                    
                    
               case 1:
                    
                    $select = "*";
                    $or_where = array("D" => "cur_estado");
                    $join = array( "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );
                    
                    $resultado = $this->curso->get_cursos($select, array(), $or_where, $join);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $cupos_disponibles = $row->cur_cupos_total - $row->cur_cupos_usados;

                            $fila = array();
                            $fila['id'] = $row->cur_id;
                            $fila['cupos'] = $cupos_disponibles;
                            $fila['nombre'] = $row->cur_nombre;
                            $fila['fecha_inicio'] = $row->cur_fecha_inicio;
                            $fila['hora_inicio'] = $row->cur_hora_inicio;
                            $fila['ciudad'] = $row->ciu_nombre;
                            
                            $where = array("rac_curso_id" => $row->cur_id, "rac_asistente_id" => $this->clslogin->getId());
                            $rac_resultado = $this->registro_asistente_curso->get_registro_asistente_curso(array(),$where);
                            
                            if($rac_resultado)
                            {
                                if($rac_resultado->num_rows() == 1)
                                {
                                    $fila['estado'] = 'Registrado';
                                }
                                else
                                {
                                    $fila['estado'] = 'No Registrado';
                                }
                            }
                            else
                            {
                                $fila['estado'] = 'No Registrado';
                            }
                            
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }
                    else
                    {
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
        
        
        function crear_curso()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo "<div id='success'>false</div>".validation_errors();
            }
            else
            {
                if (empty($_FILES['imagen']['name']))
                {
                    $this->form_validation->set_rules('imagen', 'Imagen', 'required');
                }
                
                if ($this->form_validation->run() == FALSE)
                {
                    echo "<div id='success'>false</div>".validation_errors();
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
                        echo "<div id='success'>false</div>".$this->upload->display_errors();
                    }
                    else
                    {
                        $imagen_cargada = $this->upload->data();
                        
                        $this->crear_miniaturas($imagen_cargada['file_name']);
                        
                        $this->curso->set_nombre($this->input->post("nombre_curso"));
                        $this->curso->set_descripcion($this->input->post("descripcion"));
                        $this->curso->set_acerca_del_curso($this->input->post("acerca_del_curso"));
                        $this->curso->set_nombre_imagen($imagen_cargada['file_name']);
                        $this->curso->set_url_imagen(base_url().'recursos/images/Cursos/'.$imagen_cargada['file_name']);
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
                        $this->curso->set_costo($this->input->post("costo"));
                        $this->curso->set_comentarios($this->input->post("comentarios"));
                        $this->curso->set_publicado($this->input->post("publicar"));
                        $this->curso->set_provincia($this->input->post("provincia"));
                        $this->curso->set_ciudad($this->input->post("ciudad"));
                        $this->curso->set_tema($this->input->post("tema"));
                        $this->curso->set_subtema($this->input->post("subtema"));
                        $this->curso->set_instructor($this->input->post("instructor"));
                        $this->curso->set_fecha_modificado(date('Y-m-d H:i:s'));

                        $resultado = $this->curso->guardar_curso();

                        if($resultado)
                        {
                            echo "cursos_pestana_Curso guardado con Éxito";
                        }
                        else
                        {
                            echo "<div id='success'>false</div><div>Hubo un problema con el servidor, por favor vuelva a intentarlo</div>";
                        }
                    }  
                }
            }
        }
        
        
        function editar_curso()
        {
            if ($this->form_validation->run('cursos/crear_curso') == FALSE)
            {
                echo "<div id='success'>false</div>".validation_errors();
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
                        echo "<div id='success'>false</div>".$this->upload->display_errors();
                    }
                    else
                    {
                        $imagen_cargada = $this->upload->data();
                        $this->crear_miniaturas($imagen_cargada['file_name']);
                    }
                }
                
                $data["cur_estado"] = $this->input->post("estado");
                $data["cur_nombre"] = $this->input->post("nombre_curso");
                $data["cur_descripcion"] = $this->input->post("descripcion");
                $data["cur_acerca_del_curso"] = $this->input->post("acerca_del_curso");
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
                $data["cur_publicado"] = $this->input->post("publicar");
                $data["cur_provincia_id"] = $this->input->post("provincia");
                $data["cur_ciudad_id"] = $this->input->post("ciudad");
                $data["cur_tema_id"] = $this->input->post("tema");
                $data["cur_subtema"] = $this->input->post("subtema");
                $data["cur_instructor_id"] = $this->input->post("instructor");
                
                if(count($imagen_cargada)>0)
                {
                    
                    /*$archivo_antiguo = './recursos/images/Cursos/'.$this->input->post("nombre_imagen");
                    chown($archivo_antiguo, 0777);
                    unlink($archivo_antiguo);*/
                    
                    $data["cur_nombre_imagen"] = $imagen_cargada['file_name'];
                    $data["cur_url_imagen"] = base_url().'recursos/images/Cursos/'.$imagen_cargada['file_name'];
                }
                
                $data["cur_fecha_modificado"] = date("Y-m-d H:i:s");
                
                $where = array("cur_id" => $this->input->post("id"));

                $resultado = $this->curso->update_cursos($data, $where);
                
                if($resultado)
                {
                    echo "cursos_pestana_Cambios guardados con Éxito";
                }
                else
                {
                    echo "<div id='success'>false</div>Hubo un problema con el servidor, por favor vuelva a intentarlo";
                }
            } 
        }
        
        
        function crear_miniaturas($filename)
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] = './recursos/images/Cursos/'.$filename;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['new_image']='./recursos/images/Cursos/Miniaturas';
            $config['width'] = 150;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        
        
        function enviar_detalle()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $correos = explode(",", $this->input->post('correo'));
                
                $select = "*";
                $where = array("cur_id" => $this->input->post('id'));
                $join = array( "tbl_ciudad" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );

                $resultado = $this->curso->get_cursos($select, $where, array(), $join);
                
                if($resultado)
                {
                    if($resultado->num_rows() == 1)
                    {
                        $row = $resultado->row();

                        $this->email->from('miclaro@iclaro.com.ec', 'Portal De Distribuidores');
                        $this->email->to($correos);
                        $this->email->cc('jfranco@dayscript.com, rhuerta@dayscript.com, jmoran@dayscript.com');
                        $this->email->subject($row->cur_nombre);

                        $contenido  = '';
                        $contenido  .= '
                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                    <title>Cursos de Capacitacion</title>
                                    <meta charset="UTF-8">
                                </head>
                                <body>
                                    <div id="main">
                                        <div id="seccion_interna">
                                            <div id="seccion_interna_contenido" >
                                                <div class="cuerpo_modal" style="margin-top:20px; margin-left: 36px;">
                                                    <div class="form_modal_contenido">
                                                        <div class="filas" style="margin-top: 20px; width: 85%;">
                                                            <font size="5" weight="bold">
                                                                '.$row->cur_nombre.'
                                                            </font>
                                                        </div>
                                                        <div class="filas" style="margin-top: 20px;">
                                                            <img width="60%" align="center" src="'.base_url().'recursos/images/Cursos/'.$row->cur_nombre_imagen.'" />
                                                        </div>
                                                        <div class="filas" style="margin-top: 30px; width: 85%;">
                                                            '.$row->cur_descripcion.'
                                                        </div>
                                                        <div class="filas" style="margin-top: 40px;">
                                                            <font size="5" weight="bold">
                                                                Un vistazo al curso
                                                            </font>
                                                        </div>
                                                        <div class="filas" style="margin-top: 30px; width: 85%;">
                                                            <div>
                                                                <i class="icono-calendario"></i>
                                                                Del '.$row->cur_fecha_inicio.' al '.$row->cur_fecha_fin.'
                                                            </div>
                                                            <div style="margin-top: 5px;">
                                                                <i class="icono-tiempo"></i>
                                                                Desde las '.$row->cur_hora_inicio.' hasta las '.$row->cur_hora_fin.'
                                                            </div>
                                                        </div>
                                                        <div class="filas" style="margin-top: 40px;">
                                                            <font size="5" weight="bold">
                                                                Acerca del Curso
                                                            </font>
                                                        </div>
                                                        <div class="filas" style="margin-top: 30px; width: 85%;">
                                                            '.$row->cur_descripcion.'
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="boton_modal" style="margin: 60px 40px;">
                                                    <span>
                                                        <a style="text-decoration: none;" href="'.base_url().'main/ver_informacion_cursos/'.$row->cur_id.'">
                                                            <span style="background: url('.base_url().'recursos/images/Administrador/Contenido/borde_btn_izq_blanco.png) no-repeat; width: 13px; height: 30px; padding: 8px 5px; top: 1px; position: relative;"></span>
                                                            <span style="background: url('.base_url().'recursos/images/Administrador/Contenido/borde_btn_centro_blanco.png) repeat-x; width: auto; height: 30px; padding: 8px 5px; top: 1px; position: relative; text-align: center; color: #666666;">
                                                                Ir al Portal de Distribuidores
                                                            </span>
                                                            <span style="background: url('.base_url().'recursos/images/Administrador/Contenido/borde_btn_der_blanco.png) no-repeat; width: 12px; height: 30px; padding: 8px 5px; left: -5px; top: 1px; position: relative; height: 30px;" >&nbsp;</span>
                                                        </a>
                                                   </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </body>
                            </html>';
                        
                        $this->email->message($contenido);    

                        if (! $this->email->send())
                        {
                            echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo, por favor vuelva a intentar'));
                        }
                        else
                        {
                            echo json_encode(array('st'=>3, 'msg' => 'Se ha enviado la información solicitada de forma correcta'));
                        }
                    }
                    else
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'No se encontro información acerca del curso'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo problemas al conectar con el servidor por favor vuelve a intentar.'));
                }
            }
        }
    }
    
?>
