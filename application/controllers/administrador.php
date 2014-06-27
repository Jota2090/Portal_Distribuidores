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
    class administrador extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            
            if($this->uri->segment(2) != "" && $this->uri->segment(2) != "index"){
                if(!$this->clslogin->check(1)){
                    redirect('administrador');
                }
            }
        }
        
        
        
        function index(){
            if(!$this->clslogin->check(1)){
                $data['header'] = 'administrador/vw_header';
                $data['header_data'] = '';
                $data['superior'] = 'administrador/contenido/superior/vw_inicio_superior';
                $data['inferior'] = 'administrador/contenido/inferior/vw_inicio_inferior';
            }else{
                $data['header'] = 'administrador/vw_header';
                $data['header_data']['auth'] = $this->clslogin->check(1);
                $data['header_data']['nombre'] = $this->clslogin->getNombre();
                $data['header_data']['apellido'] = $this->clslogin->getApellido();
                
                $data['superior'] = 'main/contenido/superior/vw_inicio_superior';
                $data['inferior'] = 'main/contenido/inferior/vw_inicio_inferior';
            }
            
            $this->load->view("vw_plantilla_inicio", $data);
        }
        
        
        function google_maps($latitud, $longitud, $direccion){
            $data['latitud'] = $latitud;
            $data['longitud'] = $longitud;
            $data['direccion'] = str_replace("_", " ", $direccion);
            
            $this->load->view("vw_google_maps", $data);
        }
        
        
        function cursos(){
            $data['header'] = 'administrador/vw_header';
            $data['header_data']['auth'] = $this->clslogin->check(1);
            $data['header_data']['nombre'] = $this->clslogin->getNombre();
            $data['header_data']['apellido'] = $this->clslogin->getApellido();

            $data['superior'] = 'administrador/contenido/superior/vw_inicio_superior';
            $data['inferior'] = 'administrador/contenido/inferior/vw_listado_cursos';
            
            $this->load->view("vw_plantilla_inicio", $data);
        }
        
        
        function form_crear_curso(){
            $this->load->model("mod_instructor","instructor");
            $this->load->model("mod_provincia","provincia");
            $this->load->model("mod_tema","tema");
            
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
            
            $data['ciudades'][''] = 'Seleccione';
            
            $this->load->view("administrador/contenido/inferior/vw_crear_curso", $data);
        }
        
    }
    
?>

