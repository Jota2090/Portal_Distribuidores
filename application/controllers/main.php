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
            $this->load->view("administrador/contenido/inferior/ajax/vw_tabla_listas_predeterminadas");
        }
        
        
        function form_crear_lista_asistente(){
            $this->load->view("main/contenido/inferior/vw_crear_lista_asistente");
        }
    }
    
?>

