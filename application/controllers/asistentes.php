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
    class asistentes extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_asistente","asistente");
            $this->load->model("mod_lista_asistente","lista_asistente");
            $this->load->model("mod_registro_asistente_lista","registro_asistente_lista");
            $this->load->model("mod_registro_asistente_curso","registro_asistente_curso");
        }
        
        
        function get_listas_predeterminadas($tipo = 0){
            
            switch ($tipo) {    
                case 0:
                 
                    $select = "*";
                    $where = array("la_estado" => "D", "la_asistente_id" => $this->clslogin->getId());
                    $resultado = $this->lista_asistente->get_listas_asitentes($select, $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado){
                        foreach ($resultado->result() as $row) {
                            $fila = array();
                            $fila['id'] = $row->la_id;
                            $fila['nombre'] = $row->la_nombre;
                            
                            $where = array("ral_lista_asistente_id" => $row->la_id);
                            $resultado2 = $this->registro_asistente_lista->get_registro_asistente_lista($select, $where);
                            
                            if($resultado2){    $fila['num_asistentes'] = $resultado2->num_rows();  }
                            else{   $fila['num_asistentes'] = 0;    }
                            
                            $select = array("0" => "*" , "1" => "rac_id");
                            $where = array("rac_lista_asistente_id" => $row->la_id);
                            $join = array("tbl_curso" => "rac_curso_id=cur_id");
                            $resultado3 = $this->registro_asistente_curso->get_registro_asistente_curso($select, $where, array(), $join);
                            
                            if($resultado3){
                                if($resultado3->num_rows() > 0 
                                   && $resultado3->row()->cur_nombre != null 
                                   && $resultado3->row()->cur_nombre != ""){
                                    $fila['curso'] = $resultado3->row()->cur_nombre;
                                }else{
                                    $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';
                                }
                            }
                            else{   $fila['curso'] = 'No ha sido registrado en ning&uacute;n curso todav&iacute;a';    }
                            
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
        
        
        function crear_lista_asistente(){
            
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $this->lista_asistente->set_nombre($this->input->post("nombre_lista"));
                $this->lista_asistente->set_asistente($this->clslogin->getId());

                $this->lista_asistente->guardar_lista_asistente();
                $resultado = $this->db->_error_message();

                if(empty($resultado)){
                    echo json_encode(array('st'=>1, 'msg' => 'Lista Guardada con Exito'));
                }else{
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
            
        }
        
    }
    
?>
