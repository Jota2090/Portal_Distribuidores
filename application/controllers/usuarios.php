<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * usuarios
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class usuarios extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_usuario","usuario");
            /* $configs = array(
                                'protocol'  =>  'smtp',
                                'smtp_host' =>  'ssl://smtp.gmail.com',
                                'smtp_user' =>  'ecuador@dayscript.com',
                                'smtp_pass' =>  'gov9691sal',
                                'smtp_port' =>  '465'
                            );*/
            $configs = array(
                                'protocol'  =>  'sendmail',
                                'smtp_host' =>  'dedrelay.secureserver.net',
                                'mailpath'  =>  '/usr/sbin/sendmail',
                                'mailtype'  =>  'html'
                            );
            $this->load->library('email', $configs);
        }


        function crear_usuario(){

            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {

                $where_1 = array("usu_cedula" => $this->input->post("cedula_usuario"));
                $cedula = $this->usuario->get_usuarios(array(), $where_1);

                $where_2 = array("usu_correo" => $this->input->post("correo_usuario"));
                $correo = $this->usuario->get_usuarios(array(), $where_2);

                $where_3 = array("usu_usuario" => $this->input->post("usuario"));
                $usuario = $this->usuario->get_usuarios(array(), $where_3);

                if($correo){
                    if($correo->num_rows() == 1){    echo json_encode(array('st'=>0, 'msg' => 'El correo ya fue registrado')); exit(); }
                }

                if($cedula){
                    if($cedula->num_rows() == 1){    echo json_encode(array('st'=>0, 'msg' => 'La cedula ya fue registrada')); exit(); }
                }

                if($usuario){
                    if($usuario->num_rows() == 1){    echo json_encode(array('st'=>0, 'msg' => 'El usuario ya existe')); exit(); }
                }

                $salt = '6&KTTmxa$Tej|y6uH%OhSrK@caXbNNo%I23tQmJ20Sid';
                $this->usuario->set_contrasena(sha1(md5($salt.$this->input->post("contrasena"))));
                
                $this->usuario->set_nombre($this->input->post("nombre_usuario"));
                $this->usuario->set_apellido($this->input->post("apellido_usuario"));
                $this->usuario->set_cedula($this->input->post("cedula_usuario"));
                $this->usuario->set_correo($this->input->post("correo_usuario"));
                $this->usuario->set_usuario($this->input->post("usuario"));
                $this->usuario->set_tipo($this->input->post("tipo"));
                $this->usuario->set_fecha_modificado(date('Y-m-d H:i:s'));
                
                $this->usuario->guardar_usuario();
                $resultado = $this->db->_error_message();
 
                if(empty($resultado)){
                    
                    $parametro = $this->encrypt($this->input->post("cedula_usuario"), 'YtRsZq@PlMnsuTydF--90HyetrRdf');
                    
                    $this->email->from('miclaro@iclaro.com.ec', 'Mi Claro');
                    $this->email->to('jfranco@dayscript.com');
                    $this->email->cc('jfranco@dayscript.com');
                    $this->email->subject('Registro Usuario Nuevo');
                    
                    $contenido	= "";
                    $contenido	.= "<div style = 'width:798px;min-height:200px;height:auto;' align='left'>";
                    $contenido	.=      "<div style = 'width:100%;height:100px;'>
                                            <img src = '".base_url()."recursos/images/cabecera_correo.png'>
                                        </div>";
                    $contenido	.=      "<div style='border:black thin solid; width:798px;' align='left'>";
                    $contenido	.=          "<div style='width: 600px; margin: 15px;'>
                                                Estimado(a) Administrador el siguiente usuario se ha registrado en el Portal de Capacitaci&oacute;n:
                                             </div>
                                             <div style='width: 600px; margin: 15px; text-align: left; clear:both;'>
                                                <b>Datos del Usuario</b>
                                             </div>
                                             <div style='width: 600px; margin: 10px 15px 0px 15px; clear:both;'>
                                                <div style='float:left; width: 150px;'>
                                                    <b>Nombres y Apellidos:</b>
                                                </div>
                                                <div style='float:left; width: 400px;'>
                                                    ".$this->input->post("nombre_usuario")." ".$this->input->post("apellido_usuario")."
                                                </div>
                                             </div>
                                             <div style='width: 600px; margin: 10px 15px 0px 15px; clear:both;'>
                                                <div style='float:left; width: 150px;'>
                                                    <b>Correo:</b>
                                                </div>
                                                <div style='float:left; width: 400px;'>
                                                    ".$this->input->post("correo_usuario")."
                                                </div>
                                             </div>
                                             <div style='width: 600px; margin: 10px 15px 0px 15px; clear:both;'>
                                                <div style='float:left; width: 150px;'>
                                                    <b>C&eacute;dula:</b>
                                                </div>
                                                <div style='float:left; width: 400px;'>
                                                    ".$this->input->post("cedula_usuario")."
                                                </div>
                                             </div>
                                             <div style='width: 600px; margin: 10px 15px 15px 15px; clear:both;'>
                                                <div style='float:left; width: 150px;'>
                                                    <b>Usuario:</b>
                                                </div>
                                                <div style='float:left; width: 400px;'>
                                                    ".$this->input->post("usuario")."
                                                </div>
                                             </div>
                                             <div style='width: 600px; padding: 15px; clear:both;'>
                                                Para activar al usuario registrado dar clic en el siguiente enlace: <a href='".base_url()."usuarios/activar/".$parametro."' target='_blank'>Activar</a>
                                             </div>";           
                    $contenido	.=      "</div>";
                    $contenido	.=      "<div style='width:100%;height:92px;' align='center'>
                                            <img src = '".base_url()."recursos/images/footer_correo.png'>
                                        </div>";
                    $contenido	.= "</div>";
                    
                    $this->email->message($contenido);

                    if ( ! $this->email->send() ){
                        echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo de activacion de la cuenta, por favor vuelva a intentar'));
                    }
                    else{
                        echo json_encode(array('st'=>3, 'msg' => 'Usuario Registrado con Exito'));
                    }
                }
                else{
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'.$resultado));
                }
            }
        }


        function olvido_contrasena(){

            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {

                $or_where = array($this->input->post("usuario_correo") => 'usu_usuario', $this->input->post("usuario_correo") => 'usu_correo');
                $usuario = $this->usuario->get_usuarios(array(), array(), $or_where);

                if($usuario){
                    if($usuario->num_rows() == 1){    
                        /*$this->email->from('your@example.com', 'Your Name');
                        $this->email->to('someone@example.com');
                        $this->email->cc('another@another-example.com');
                        $this->email->bcc('them@their-example.com');

                        $this->email->subject('Email Test');
                        $this->email->message('Testing the email class.');

                        $this->email->send();

                        if ( ! $this->email->send() ){
                            echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo de activacion de la cuenta, por favor vuelva a intentar'));
                        }
                        else{
                            echo json_encode(array('st'=>3, 'msg' => 'Se ha enviado una nueva contrasena a su correo registrado'));
                        }*/
                    }else{
                        echo json_encode(array('st'=>0, 'msg' => 'No se encontro usuario'));
                    }
                }else{
                    echo json_encode(array('st'=>0, 'msg' => 'No se encontro usuario'));
                }
            }
        }
        
        
        function activar($id){
            
            $cedula = $this->decrypt($id, 'YtRsZq@PlMnsuTydF--90HyetrRdf');
            $where = array("usu_cedula" => $cedula);
            $usuario = $this->usuario->get_usuarios(array(), $where);
            
            if($usuario){
                if($usuario->num_rows() == 1){
                    $data["usu_estado"] = "A";
                    $data["usu_fecha_modificado"] = date('Y-m-d H:i:s');
                    $where = array("usu_cedula" => $cedula);
                    
                    $resultado = $this->usuario->update_usuarios($data, $where);
                    $resultado = $this->db->_error_message();

                    if(empty($resultado)){
                        echo "Se activo usuario con éxito";
                    }else{
                        echo "no existe usuario".$cedula;
                    }
                }
            }
            else{
                echo "no existe usuario".$cedula;
            }
        }
        
        
        function encrypt($string, $key) {
            $result = "";
            
            for($i=0; $i<strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)+ord($keychar));
                $result.=$char;
            }
            
            return base64_encode($result);
        }
        
        
        function decrypt($string, $key) {
            $result = "";
            $string = base64_decode($string);
            
            for($i=0; $i<strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)-ord($keychar));
                $result.=$char;
            }
            
            return $result;
        }
    }
?>
