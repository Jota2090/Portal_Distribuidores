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
    class main extends CI_Controller {
    
        var $_data = array(
                            "scripts" => "main/vw_scripts_css",
                            "header" => "main/vw_header",
                            "superior" => "main/contenido/superior/vw_inicio_superior",
                            "inferior" => "main/contenido/inferior/vw_inicio_inferior"
                        );
        
        function __construct(){
            parent::__construct();
            
            if($this->uri->segment(2) != "" && $this->uri->segment(2) != "index"){
                if(!$this->clslogin->check(0)){
                    redirect('main');
                }
            }
        }
        
        
        function index(){
            if(!$this->clslogin->check(0)){
                $this->_data['header_data']['form_login'] = '';
            }else{
                $this->_data['header_data']['auth'] = $this->clslogin->check(0);
                $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();
            }
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function listas_predeterminadas(){
            $this->_data['header_data']['auth'] = $this->clslogin->check(0);
            $this->_data['header_data']['nombre'] = $this->clslogin->getNombre();
            $this->_data['header_data']['apellido'] = $this->clslogin->getApellido();

            $this->_data['inferior'] = 'main/contenido/inferior/vw_listas_predeterminadas';
            
            $this->load->view("vw_plantilla_inicio", $this->_data);
        }
        
        
        function tabla_listas_predeterminadas(){
            $this->load->view("main/contenido/inferior/ajax/vw_tabla_listas_predeterminadas");
        }
        
        
        function form_crear_lista_asistente(){
            $this->load->view("main/contenido/inferior/vw_crear_lista_asistente");
        }
        
        
        function editar_lista_asistente(){
            $this->load->model("mod_lista_asistente","lista_asistente");
            
            $select = "*";
            $where = array("la_estado" => "D", "la_asistente_id" => $this->clslogin->getId(), "la_id" => $this->input->post("id"));
            $resultado = $this->lista_asistente->get_listas_asitentes($select, $where);
            $data['resultado'] = $resultado;
            
            $this->load->view("main/contenido/inferior/vw_editar_lista_asistente", $data);
        }
        
        
        function form_crear_asistente(){
            $this->load->model("mod_distribuidor","distribuidor");
            $this->load->model("mod_cargo_asistente","cargo_asistente");
            $this->load->model("mod_tipo_asistente","tipo_asistente");
            
            $select = array("0" => "*");
            $where = array("dis_estado" => "A");
            $resultado = $this->distribuidor->get_distribuidores($select, $where);
            $data['distribuidores'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['distribuidores'][$row->dis_razon_social] = $row->dis_nombre;
                }
            }
            
            $where = array("ca_estado" => "D");
            $resultado = $this->cargo_asistente->get_cargos_asistente($select, $where);
            $data['cargos_asistente'] = array('' => 'Seleccione');
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['cargos_asistente'][$row->ca_id] = $row->ca_nombre;
                }
            }
            
            $where = array("ta_estado" => "D");
            $resultado = $this->tipo_asistente->get_tipos_asistente($select, $where);
            $data['tipos_asistente'] = array();
            if($resultado){
                foreach ($resultado->result() as $row) {
                    $data['tipos_asistente'][$row->ta_id] = $row->ta_nombre;
                }
            }
            
            $this->load->view("main/contenido/inferior/vw_crear_asistente", $data);
        }
    }
    
?>

