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
            $this->load->view("portal/administrador/vw_login");
        }
        
        
        function validar(){
            if($this->clslogin->login($this->input->post("user"), $this->input->post("password")) 
                    && $this->clslogin->check($this->input->post("tipo"))){
                echo "<div id='success'>true</div>";
            }else{
                if($this->input->post("tipo")=="main"){
                    $data['auth'] = $this->clslogin->check(0);
                    echo $this->load->view("main/vw_header", $data);
                }elseif($this->input->post("tipo")=="administrador"){
                    $data['auth'] = $this->clslogin->check(1);
                    echo $this->load->view("administrador/vw_header", $data);
                }else{
                    $data['auth'] = $this->clslogin->check(0);
                    echo $this->load->view("main/vw_header", $data);
                }
            }
        }
        
        
        function logout($portal){
            $this->clslogin->logout();
            
            if($portal != ""  && $portal != null && ($portal == "main" || $portal == "administrador")){
                redirect(site_url($portal));
            }else{
                redirect(site_url("main"));
            }
        }
        
        
        function crear_usuario(){

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view("administrador/vw_crear_usuario");
            }
            else
            {
                $salt = '6&KTTmxa$Tej|y6uH%OhSrK@caXbNNo%I23tQmJ20Sid';
                $this->usuario->set_contrasena(sha1(md5($salt.$this->input->post("contrasena"))));
                
                $this->usuario->set_nombre($this->input->post("nombre"));
                $this->usuario->set_apellido($this->input->post("apellido"));
                $this->usuario->set_cedula($this->input->post("cedula"));
                $this->usuario->set_correo($this->input->post("correo"));
                $this->usuario->set_usuario($this->input->post("usuario"));
                $this->usuario->set_tipo($this->input->post("tipo"));
                $this->usuario->set_fecha_modificado(date('Y-m-d H:i:s'));
                
                $this->usuario->guardar_usuario();
                $resultado = $this->db->_error_message();
 
                if(empty($resultado))
                    $this->load->view("administrador/vw_login");
                else
                    $this->load->view("administrador/vw_crear_usuario");
            }
        }
        
     }
?>
