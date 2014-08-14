<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * asistentes
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class asistentes extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_asistente","asistente");
            $this->load->model("mod_lista_asistente","lista_asistente");
            $this->load->model("mod_registro_asistente_lista","registro_asistente_lista");
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
        }
        
        
        function get_listas_predeterminadas($tipo = 0)
        {
            switch ($tipo) 
            {    
                case 0:
                 
                    $select = "*";
                    $where = array("la_estado" => "D", "la_usuario_id" => $this->clslogin->getId());
                    $resultado = $this->lista_asistente->get_listas_asitentes($select, $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row) 
                        {
                            $fila = array();
                            $fila['id'] = $row->la_id;
                            $fila['nombre'] = $row->la_nombre;
                            
                            $select = "*";
                            $where = array("ral_lista_asistente_id" => $row->la_id);
                            $resultado2 = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where);
                            
                            if($resultado2){    $fila['num_asistentes'] = $resultado2->num_rows();  }
                            else{   $fila['num_asistentes'] = 0;    }
                            
                            $select = array("1" => "rac_id");
                            $where = array("rac_lista_asistente_id" => $row->la_id);
                            $resultado3 = $this->registro_asistente_curso->get_registro_asistente_curso($select, $where);
                            
                            if($resultado3)
                            {
                                if($resultado3->num_rows() == 1)
                                {
                                    $row_rac = $resultado3->row();
                                    
                                    $where = array("rac_id" => $row_rac->rac_id);
                                    $join = array("tbl_curso" => "rac_curso_id=cur_id");
                                    $curso = $this->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join);
                                    
                                    if($curso)
                                    {
                                        if($curso->num_rows() == 1)
                                        {
                                            $fila['curso'] = $curso->row()->cur_nombre;
                                        }
                                        else
                                        {
                                            $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';
                                        }
                                    }
                                    else
                                    {
                                        $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';
                                    }
                                }else{
                                    $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';
                                }
                            }
                            else
                            {   
                                $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';
                            }
                            
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
        
        
        function crear_lista_asistente()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $this->lista_asistente->set_nombre($this->input->post("nombre_lista"));
                $this->lista_asistente->set_usuario($this->clslogin->getId());

                $resultado = $this->lista_asistente->guardar_lista_asistente();
                
                if($resultado['status'])
                {
                    $asistentes = $this->input->post("asistente");
                    
                    if($asistentes)
                    {
                        foreach ($asistentes as $row)
                        {
                            $this->registro_asistente_lista->set_lista_asistente($resultado['id_insertado']);
                            $this->registro_asistente_lista->set_asistente($row);
                            $this->registro_asistente_lista->guardar_asistente_lista();
                        }
                        
                        echo json_encode(array('st'=>1, 'msg' => 'Lista Guardada con Exito'));
                        
                    }
                    else
                    {
                        echo json_encode(array('st'=>1, 'msg' => 'Lista Guardada con Exito'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
            
        }
        
        
        function editar_lista_asistente()
        {
            if ($this->form_validation->run('asistentes/crear_lista_asistente') == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $data["la_nombre"] = $this->input->post("nombre_lista");
                $where = array("la_id" => $this->input->post('id'));

                $resultado = $this->lista_asistente->update_listas_asistente($data, $where);

                if($resultado)
                {
                    $asistentes = $this->input->post("asistente");
                    
                    if($asistentes)
                    {
                        foreach ($asistentes as $row) 
                        {
                            $this->registro_asistente_lista->set_lista_asistente($this->input->post('id'));
                            $this->registro_asistente_lista->set_asistente($row);
                            $this->registro_asistente_lista->guardar_asistente_lista();
                        }
                        
                        echo json_encode(array('st'=>1, 'msg' => 'Cambios guardados con Exito'));
                    }
                    else
                    {
                        echo json_encode(array('st'=>1, 'msg' => 'Cambios guardados con Exito'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
        }
        
        
        function crear_asistente()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $this->asistente->set_nombre($this->input->post("nombre_asistente"));
                $this->asistente->set_cedula($this->input->post("cedula"));
                $this->asistente->set_correo($this->input->post("correo"));
                $this->asistente->set_telefono($this->input->post("telefono"));
                $this->asistente->set_antiguedad($this->input->post("antiguedad"));
                $this->asistente->set_distribuidor($this->input->post("distribuidor"));
                $this->asistente->set_cargo($this->input->post("cargo"));
                $this->asistente->set_tipo($this->input->post("tipo_asistente"));
                $this->asistente->set_usuario($this->clslogin->getId());
                $this->asistente->set_fecha_modificado(date('Y-m-d H:i:s'));

                $resultado = $this->asistente->guardar_asistente();
                
                if($resultado)
                {
                    echo json_encode(array('st'=>2, 'msg' => 'Asistente guardado con Exito'));
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
        }
        
        
        function editar_asistente()
        {
            if ($this->form_validation->run('asistentes/crear_asistente') == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $data["asi_nombre_completo"] = $this->input->post("nombre_asistente");
                $data["asi_cedula"] = $this->input->post("cedula");
                $data["asi_correo"] = $this->input->post("correo");
                $data["asi_telefono"] = $this->input->post("telefono");
                $data["asi_antiguedad"] = $this->input->post("antiguedad");
                $data["asi_distribuidor_id"] = $this->input->post("distribuidor");
                $data["asi_cargo_asistente_id"] = $this->input->post("cargo");
                $data["asi_tipo_asistente_id"] = $this->input->post("tipo_asistente");
                $data["asi_fecha_modificado"] = date('Y-m-d H:i:s');
                
                $where = array("asi_cedula" => $this->input->post('id_asistente'), "asi_usuario_id" => $this->clslogin->getId());

                $resultado = $this->asistente->update_asistente($data, $where);

                if($resultado)
                {
                    echo json_encode(array('st'=>2, 'msg' => 'Cambios guardados con Exito'));
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                }
            }
        }


        function registrar_asistencia()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => 'No ha seleccionado ningún asistente'));
            }
            else
            {
                $this->load->model("mod_curso","curso");
                
                $select_curso = "cur_cupos_usados, cur_cupos_total, cur_nombre";
                $where_curso = array("cur_id" => $this->input->post('id'));
                $resultado = $this->curso->get_cursos($select_curso, $where_curso);
                
                $asistentes = $this->input->post("asistente");
                $nombres = $this->input->post("nombre");
                
                if($resultado)
                {
                    if($resultado->num_rows() == 1)
                    {
                        $row = $resultado->row();
                        $curso_nombre = $row->cur_nombre;
                        $cupos_usados = $row->cur_cupos_usados + count($asistentes);
                        $cupos_disponibles = $row->cur_cupos_total - $cupos_usados;

                        if($cupos_disponibles == 0 ||  $cupos_disponibles > 0)
                        {
                            $contador = 0;
                            $reporte_final = "";
                            $i = 0;
                            
                            foreach ($asistentes as $row_asistente)
                            {
                                $cursos = $this->curso->get_cursos($select_curso, $where_curso);
                                
                                if($cursos)
                                {
                                    if($cursos->num_rows() == 1)
                                    {
                                        $row_curso = $cursos->row();
                                        $cupos_usados = $row_curso->cur_cupos_usados + 1;
                                        $cupos_disponibles = $row_curso->cur_cupos_total - $cupos_usados;
                                        
                                        if($cupos_disponibles == 0 ||  $cupos_disponibles > 0)
                                        {
                                            $where = array("asi_estado" => "A", "rac_asistente_id" => $row_asistente, "rac_curso_id" => $this->input->post('id'));
                                            $join = array("tbl_asistente" => "rac_asistente_id=asi_cedula");

                                            $resultado_get = $this->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join);

                                            if($resultado_get)
                                            {
                                                if($resultado_get->num_rows() == 1)
                                                {
                                                    $reporte_final .= "* El asistente ".$nombres[$i]." ha sido registrado anteriormente<br/>";
                                                }
                                                else
                                                {
                                                    $this->registro_asistente_curso->set_curso($this->input->post('id'));
                                                    $this->registro_asistente_curso->set_lista_asistente($this->input->post("lista_asistente"));
                                                    $this->registro_asistente_curso->set_asistente($row_asistente);

                                                    $resultado_save = $this->registro_asistente_curso->guardar_asistente_curso();
                                                    
                                                    if($resultado_save)
                                                    {
                                                        $contador++;

                                                        $data["cur_cupos_usados"] = $cupos_usados;
                                                        $data["cur_fecha_modificado"] = date('Y-m-d H:i:s');

                                                        $where = array("cur_id" => $this->input->post('id'));

                                                        $this->curso->update_cursos($data, $where);
                                                    }
                                                    else
                                                    {
                                                        echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                                                        break;
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                                                break;
                                            }
                                        }
                                        else
                                        {
                                            $reporte_final .= "* El asistente ".$nombres[$i]." no ha sido registrado por falta de cupo<br/>";
                                        }
                                    }
                                    else
                                    {
                                        echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                                        break;
                                    }
                                }
                                else
                                {
                                    echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                                    break;
                                }
                                
                                $i++;
                            }
                            
                            if($contador == 0 && $reporte_final == "")
                            {
                                echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                            }
                            else if($reporte_final != "" && $contador == 0)
                            {
                                echo json_encode(array('st'=>1, 'msg' => 'Hubo los siguientes inconvenientes al intentar registrar los asistentes:<br/>'.$reporte_final));
                            }
                            else if($reporte_final != "" && $contador > 0)
                            {
                                echo json_encode(array('st'=>1, 'msg' => 'Se ha(n) registrado '.$contador.' asistente(s) satisfactoriamente al curso: '.$curso_nombre.'<br/><br/>Pero hubo los siguientes inconvenientes:<br/>'.$reporte_final));
                            }
                            else
                            {
                                echo json_encode(array('st'=>1, 'msg' => 'Se han registrado '.$contador.' asistentes satisfactoriamente al curso: '.$curso_nombre));
                            }
                        }
                        else
                        {
                            echo json_encode(array('st'=>1, 'msg' => 'Su solicitud excede los cupos disponibles para este curso'));
                        }
                    }
                    else
                    {
                        echo json_encode(array('st'=>1, 'msg' => 'No se encontró el curso seleccionado'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>1, 'msg' => 'Hubo un problema al registrar los asistentes, por favor vuelva a intentarlo.'));
                }
            }
        }

        
        public function imprimir_asistencia()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo 'No ha seleccionado ningun asistente';
            }
            else
            {
                $this->load->library('export_pdf');                 
                $pdf = new export_pdf();
                $pdf->registro_asistencia();
            }
        }
            
    }
?>
