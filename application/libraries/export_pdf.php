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

                $where = array("asi_estado" => "A", "asi_usuario_id" => $CI->clslogin->getId(),
                                "rac_id" => $row );
                $join = array( "tbl_asistente" => "rac_asistente_id=asi_cedula", "tbl_lista_asistente" => "rac_lista_asistente_id=la_id", "tbl_curso" => "rac_curso_id=cur_id");
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
                        $CI->cezpdf->ezText("HOJA DE ASISTENCIA",10, array('justification'=>'center'));
                        $CI->cezpdf->ezText("\n\n\n",10);
                        $CI->cezpdf->ezText(utf8_decode("<b>Nombres y Apellidos :</b>    ".$row_rac->asi_nombre_completo),9);
                        $CI->cezpdf->ezText("\n",8);
                        $CI->cezpdf->ezText(utf8_decode("<b>Nº Cédula  :</b>                      ".$row_rac->asi_cedula),9);
                        $CI->cezpdf->ezText("\n",8);
                        $CI->cezpdf->ezText(utf8_decode("<b>Curso :</b>                              ".$row_rac->cur_nombre),9);
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