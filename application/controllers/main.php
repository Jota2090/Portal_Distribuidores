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
            $this->load->view("main/vw_inicio");
        }
    }
    
?>

