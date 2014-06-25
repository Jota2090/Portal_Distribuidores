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
        }
        
        
        function index(){
            if(!$this->clslogin->check(1)){
                $data['header'] = $this->load->view("main/vw_header");
                $data['main'] = $this->load->view("main/contenido/superior/vw_inicio_superior").
                                $this->load->view("main/contenido/inferior/vw_inicio_inferior");
            }else{
                $data_header['auth'] = $this->clslogin->check(0);
                $data_header['nombre'] = $this->clslogin->getNombre();
                $data_header['apellido'] = $this->clslogin->getApellido();
                
                $data['header'] = $this->load->view("main/vw_header", $data_header);
                $data['main'] = $this->load->view("main/contenido/superior/vw_inicio_superior").
                                $this->load->view("main/contenido/inferior/vw_inicio_inferior");
            }
            
            $this->load->view("main/vw_plantilla", $data);
            
        }
        
        function form_crear_curso(){
            $this->load->view("portal/administrador/vw_crear_curso");
        }
        
    }
    
?>

