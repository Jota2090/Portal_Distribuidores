<?php
    if (!defined('BASEPATH'))
        exit('No tiene Permiso para acceder directamente al Script');
    
    class export_pdf
    {
        function registro_asistencia()
        {
            $CI = & get_instance();
            
            $CI->load->library("cezpdf");
            $CI->load->library('ciqrcode');
            $CI->load->helper('pdf');
            $CI->load->model("mod_registro_asistente_curso","registro_asistente_curso");
            
            header_pdf();
            footer_pdf();
            $CI->cezpdf->selectFont('./recursos/fonts/Helvetica.afm');
            
            $asistentes = $CI->input->post('asistente');
            $contador = 0;

            foreach ($asistentes as $row)
            {
                $contador++;

                $where = array(
                                "asi_estado" => "A",
                                "asi_usuario_id" => $CI->clslogin->getCedula(),
                                "rac_id" => $row
                              );
                $join = array( 
                                "tbl_asistente" => "rac_asistente_id=asi_cedula",
                                "tbl_lista_asistente" => "rac_lista_asistente_id=la_id",
                                "tbl_curso" => "rac_curso_id=cur_id",
                                "tbl_distribuidor" => "asi_distribuidor_id=dis_razon_social",
                                "tbl_cargo_asistente" => "asi_cargo_asistente_id=ca_id"
                              );
                $order_by = array("asi_nombre_completo" => "asc");
                $resultado = $CI->registro_asistente_curso->get_registro_asistente_curso(array(), $where, array(), $join, $order_by);

                if($resultado)
                {
                    if($resultado->num_rows() == 1)
                    {
                        $row_rac = $resultado->row();
                        $curso = $row_rac->rac_curso_id;
                        $asistente = $row_rac->rac_asistente_id;
                        $lista_asistente = $row_rac->rac_lista_asistente_id;

                        $params['data'] = "curso=".$curso."&asistente=".$asistente."&lista_asistente=".$lista_asistente;
                        $params['level'] = 'H';
                        $params['size'] = 5;
                        $params['savename'] = FCPATH.'recursos/images/QrCode/qrcode'.$curso.'_'.$asistente.'_'.$lista_asistente.'.png';

                        $CI->ciqrcode->generate($params);
                        
                        $CI->cezpdf->ezSetMargins(105,80,50,50);
                        $CI->cezpdf->ezText("<b>HOJA DE ASISTENCIA</b>",10, array('justification'=>'center'));
                        $CI->cezpdf->ezText("\n\n",10);
                        
                        $col_names = array(
                                                'name' => '',
                                                'description' => '',
                                           );
                        
                        $db_data[] = array('name' => '<b>Curso :</b>', 'description' => utf8_decode($row_rac->cur_nombre));
                        $db_data[] = array('name' => '<b>Nombres y Apellidos :</b>', 'description' => utf8_decode($row_rac->asi_nombre_completo));
                        $db_data[] = array('name' => '<b>Cargo :</b>', 'description' => utf8_decode($row_rac->ca_nombre));
                        $db_data[] = array('name' => '<b>Distribuidor :</b>', 'description' => utf8_decode($row_rac->dis_nombre));
                        $db_data[] = array('name' => utf8_decode('<b>Nº Cédula  :</b>'), 'description' => $row_rac->asi_cedula);
                        $db_data[] = array('name' => '<b>Correo :</b>', 'description' => utf8_decode($row_rac->asi_correo));
                        $db_data[] = array('name' => utf8_decode('<b>Celular / Teléfono :</b>'), 'description' => $row_rac->asi_telefono);
                        
                        $CI->cezpdf->ezTable($db_data, $col_names, '', array(
                                                                                'width'=>490,
                                                                                'showLines'=>'0', 
                                                                                'showHeadings'=>0,
                                                                                'shaded'=>0,
                                                                                'cols'=>array(
                                                                                                'name'=>array(
                                                                                                                'width'=>'140px'
                                                                                                              )
                                                                                              )
                                                                            )
                                            ); 
                        
                        $CI->cezpdf->ezText("\n",8);
                        $CI->cezpdf->ezText("\n",8);
                        
                        $CI->cezpdf->ezImage(base_url().'recursos/images/QrCode/qrcode'.$curso.'_'.$asistente.'_'.$lista_asistente.'.png', 0, 80, 5, 'left');
                        
                        if($contador < count($asistentes))
                        {
                            $CI->cezpdf->ezNewPage();
                        }
                    }
                }
            }

            ob_end_clean();
            $options['descarga'] = 'Asistencia.pdf';
            $CI->cezpdf->ezStream($options);
        }
    }
?>