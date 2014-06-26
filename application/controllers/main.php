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
    
        function __construct(){
            parent::__construct();        
        }
        
        function index(){
            if(!$this->clslogin->check(0)){
                $data['header'] = 'main/vw_header';
                $data['header_data']['form_login'] = '';
                $data['superior'] = 'main/contenido/superior/vw_inicio_superior';
                $data['inferior'] = 'main/contenido/inferior/vw_inicio_inferior';
            }else{
                $data['header'] = 'main/vw_header';
                $data['header_data']['auth'] = $this->clslogin->check(0);
                $data['header_data']['nombre'] = $this->clslogin->getNombre();
                $data['header_data']['apellido'] = $this->clslogin->getApellido();
                
                $data['superior'] = 'main/contenido/superior/vw_inicio_superior';
                $data['inferior'] = 'main/contenido/inferior/vw_inicio_inferior';
            }
            
            $this->load->view("vw_plantilla_inicio", $data);
        }
    }
    
?>

