<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * login
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class login extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_usuario","usuario");
        }
        
        
        function index(){
            $this->load->view("administrador/vw_login");
        }
        
        
        function crear_usuario(){

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view("administrador/vw_crear_usuario");
            }
            else
            {
                $this->usuario->guardar_usuario();
                $resultado = $this->db->_error_message();
 
                if(empty($resultado))
                    $this->load->view("administrador/vw_login");
                else
                    $this->load->view("administrador/vw_crear_usuario");
            }
        }
        
        
        function validar(){
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view("administrador/vw_login");
            }
            else
            {
                if($this->clslogin->login($this->input->post("usuario"), $this->input->post("contrasena")))
                    $this->load->view("administrador/vw_crear_usuario");
                else{
                    $this->load->view("administrador/vw_login");
                }
            }
        }
        
        
        function logout(){
            $this->clslogin->logout();
            redirect(site_url("main/menu"));
        }
        
     }
?>
