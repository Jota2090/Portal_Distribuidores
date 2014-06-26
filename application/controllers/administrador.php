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
            $this->load->view("administrador/contenido/inferior/vw_crear_curso");
        }
        
    }
    
?>

