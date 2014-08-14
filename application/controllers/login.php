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
    class login extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_usuario","usuario");
        }
        
        
        function validar()
        {
            if($this->clslogin->login($this->input->post("user"), $this->input->post("password")) 
                    && $this->clslogin->check($this->input->post("tipo")))
            {
                echo "<div id='success'>true</div>";
            }
            else
            {
                if($this->input->post("tipo")=="main")
                {
                    $data['auth'] = $this->clslogin->check(0);
                    echo $this->load->view("main/vw_header", $data);
                }
                elseif($this->input->post("tipo")=="administrador")
                {
                    $data['auth'] = $this->clslogin->check(1);
                    echo $this->load->view("administrador/vw_header", $data);
                }
                else
                {
                    $data['auth'] = $this->clslogin->check(0);
                    echo $this->load->view("main/vw_header", $data);
                }
            }
        }
        
        
        function logout($portal)
        {
            $this->clslogin->logout();
            
            if($portal != ""  && $portal != null && ($portal == "main" || $portal == "administrador"))
            {
                redirect(site_url($portal));
            }
            else
            {
                redirect(site_url("main"));
            }
        }
        
     }
?>
