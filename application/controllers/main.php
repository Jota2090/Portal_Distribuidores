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
    
        var $data = array(
                            "scripts" => "main/vw_scripts_css",
                            "header" => "main/vw_header",
                            "superior" => "main/contenido/superior/vw_inicio_superior",
                            "inferior" => "main/contenido/inferior/vw_inicio_inferior"
                        );
        
        function __construct(){
            parent::__construct();        
        }
        
        function index(){
            if(!$this->clslogin->check(0)){
                $this->data['header_data']['form_login'] = '';
            }else{
                $this->data['header_data']['auth'] = $this->clslogin->check(0);
                $this->data['header_data']['nombre'] = $this->clslogin->getNombre();
                $this->data['header_data']['apellido'] = $this->clslogin->getApellido();
            }
            
            $this->load->view("vw_plantilla_inicio", $this->data);
        }
    }
    
?>

