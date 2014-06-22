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
            if(!$this->clslogin->check()){
                $data['header'] = '';
            }else{
                $data['header']['auth'] = $this->clslogin->check();
                $data['header']['nombre'] = $this->clslogin->getNombre();
                $data['header']['apellido'] = $this->clslogin->getApellido();
            }
            
            $this->load->view("portal/administrador/vw_pa_inicio", $data);
            
        }
    }
    
?>

