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
    class usuarios extends CI_Controller
    {
        var $_salt = "6&KTTmxa%Tej|y6uH%OhSrK@caXbNNo%I23tQmJ20Sid";
        
        function __construct()
        {
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("mod_usuario","usuario");
            $this->load->helper('string');
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


        function listar_usuarios($tipo = 0)
        {
            switch ($tipo) 
            {    
                case 0:
                    
                    $where = array("usu_estado" => "A", "usu_tipo" => "U");

                    $resultado = $this->usuario->get_usuarios(array(), $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $fila = array();
                            $fila['cedula'] = $row->usu_cedula;
                            $fila['nombre'] = $row->usu_nombre;
                            $fila['apellido'] = $row->usu_apellido;
                            $fila['correo'] = $row->usu_correo;
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }
                    else
                    {
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;
                    
                    
               case 1:
                    
                    $where = array("usu_estado" => "I", "usu_tipo" => "U");

                    $resultado = $this->usuario->get_usuarios(array(), $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $fila = array();
                            $fila['cedula'] = $row->usu_cedula;
                            $fila['nombre'] = $row->usu_nombre;
                            $fila['apellido'] = $row->usu_apellido;
                            $fila['correo'] = $row->usu_correo;
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }
                    else
                    {
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;


                case 2:
                    
                    $where = array("usu_estado" => "P", "usu_tipo" => "U");

                    $resultado = $this->usuario->get_usuarios(array(), $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $fila = array();
                            $fila['cedula'] = $row->usu_cedula;
                            $fila['nombre'] = $row->usu_nombre;
                            $fila['apellido'] = $row->usu_apellido;
                            $fila['correo'] = $row->usu_correo;
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }
                    else
                    {
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;


                case 3:
                    
                    $where = array("usu_estado" => "R", "usu_tipo" => "U");

                    $resultado = $this->usuario->get_usuarios(array(), $where);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $fila = array();
                            $fila['cedula'] = $row->usu_cedula;
                            $fila['nombre'] = $row->usu_nombre;
                            $fila['apellido'] = $row->usu_apellido;
                            $fila['correo'] = $row->usu_correo;
                            $items[] = $fila;
                        }
                        
                        $data['draw'] = 1;
                        $data['recordsTotal'] = count($items);
                        $data['recordsFiltered'] = count($items);
                        $data['data'] = $items;
                    }
                    else
                    {
                        $data['draw'] = 1;
                        $data['recordsTotal'] = 0;
                        $data['recordsFiltered'] = 0;
                        $data['data'] = $items;
                    }
                    
                    $data = json_encode($data);
                    
                    break;
            }
            
            echo $data;
        }


        function crear_usuario()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $where_1 = array("usu_correo" => $this->input->post("correo_usuario"));
                $correo = $this->usuario->get_usuarios(array(), $where_1);
                
                if($correo)
                {
                    if($correo->num_rows() == 1)
                    {    
                        echo json_encode(array('st'=>0, 'msg' => 'El correo ya fue registrado')); 
                        exit();
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                    exit();
                }
                
                
                $where_2 = array("usu_cedula" => $this->input->post("cedula_usuario"));
                $cedula = $this->usuario->get_usuarios(array(), $where_2);
                
                if($cedula)
                {
                    if($cedula->num_rows() == 1)
                    {    
                        echo json_encode(array('st'=>0, 'msg' => 'La cedula ya fue registrada'));
                        exit();
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                    exit();
                }

                
                $where_3 = array("usu_usuario" => $this->input->post("usuario"));
                $usuario = $this->usuario->get_usuarios(array(), $where_3);

                if($usuario)
                {
                    if($usuario->num_rows() == 1)
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'El usuario ya existe'));
                        exit();
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                    exit();
                }
                
                $this->email->from('miclaro@iclaro.com.ec', 'Portal de Distribuidores');
                $this->email->to($this->input->post("correo_usuario"));
                $this->email->cc('jfranco@dayscript.com, rhuerta@dayscript.com, jmoran@dayscript.com');
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
                                            Para activar al usuario registrado dar clic en el siguiente enlace: <a href='".base_url()."administrador/usuarios/pendientes' target='_blank'>Activar</a>
                                         </div>";           
                $contenido	.=      "</div>";
                $contenido	.=      "<div style='width:100%;height:92px;' align='center'>
                                        <img src = '".base_url()."recursos/images/footer_correo.png'>
                                    </div>";
                $contenido	.= "</div>";

                $this->email->message($contenido);

                if ( ! $this->email->send() )
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo de activacion de la cuenta, por favor vuelva a intentar'));
                }
                else
                {
                    $salt = random_string('unique');
                    $contrasena = sha1(md5($salt.$this->input->post("contrasena")));
                    $contrasena .= ":".$salt;
                    
                    $this->usuario->set_contrasena($contrasena);
                    $this->usuario->set_nombre($this->input->post("nombre_usuario"));
                    $this->usuario->set_apellido($this->input->post("apellido_usuario"));
                    $this->usuario->set_cedula($this->input->post("cedula_usuario"));
                    $this->usuario->set_correo($this->input->post("correo_usuario"));
                    $this->usuario->set_usuario($this->input->post("usuario"));
                    $this->usuario->set_tipo($this->input->post("tipo"));
                    $this->usuario->set_fecha_modificado(date('Y-m-d H:i:s'));

                    $resultado = $this->usuario->guardar_usuario();

                    if($resultado)
                    {
                        echo json_encode(array('st'=>4, 'msg' => 'Usuario Registrado con Exito'));
                    }
                    else
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                    }
                }  
            }
        }
        
        
        function editar_usuario()
        {
            if ($this->form_validation->run("usuarios/crear_usuario") == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $where_1 = array("usu_id" => $this->clslogin->getId(), 
                                 "usu_cedula" => $this->clslogin->getCedula());
                
                $contrasena = $this->usuario->get_usuarios(array(), $where_1);
                
                if($contrasena)
                {
                    if($contrasena->num_rows() == 1)
                    {
                        $verificar_contrasena = $this->passwordJoinSalt($contrasena->row()->usu_contrasena, $this->input->post("contrasena"));
                        
                        if($verificar_contrasena)
                        {
                            $where_1 = array("usu_correo" => $this->input->post("correo_usuario"));
                            $correo = $this->usuario->get_usuarios(array(), $where_1);

                            if($correo)
                            {
                                if($correo->num_rows() == 1)
                                {    
                                    $row = $correo->row();

                                    if($row->usu_id != $this->clslogin->getId())
                                    {
                                        echo json_encode(array('st'=>0, 'msg' => 'El correo ya fue registrado')); 
                                        exit();
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                                exit();
                            }


                            $where_2 = array("usu_cedula" => $this->input->post("cedula_usuario"));
                            $cedula = $this->usuario->get_usuarios(array(), $where_2);

                            if($cedula)
                            {
                                if($cedula->num_rows() == 1)
                                {    
                                    $row = $cedula->row();

                                    if($row->usu_id != $this->clslogin->getId())
                                    {
                                        echo json_encode(array('st'=>0, 'msg' => 'La cedula ya fue registrada')); 
                                        exit();
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                                exit();
                            }


                            $where_3 = array("usu_usuario" => $this->input->post("usuario"));
                            $usuario = $this->usuario->get_usuarios(array(), $where_3);

                            if($usuario)
                            {
                                if($usuario->num_rows() == 1)
                                {
                                    $row = $usuario->row();

                                    if($row->usu_id != $this->clslogin->getId())
                                    {
                                        echo json_encode(array('st'=>0, 'msg' => 'El usuario ya existe'));  
                                        exit();
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                                exit();
                            }

                            $data = array();
                            $data["usu_nombre"] = $this->input->post("nombre_usuario");
                            $data["usu_apellido"] = $this->input->post("apellido_usuario");
                            $data["usu_cedula"] =  $this->input->post("cedula_usuario");
                            $data["usu_correo"] = $this->input->post("correo_usuario");
                            $data["usu_usuario"] = $this->input->post("usuario");
                            $data["usu_fecha_modificado"] = date('Y-m-d H:i:s');

                            $where = array("usu_id" => $this->clslogin->getId());

                            $resultado = $this->usuario->update_usuarios($data, $where);

                            if($resultado)
                            {
                                $this->email->from('miclaro@iclaro.com.ec', 'Portal de Distribuidores');
                                $this->email->to($this->input->post("correo_usuario"));
                                $this->email->cc('jfranco@dayscript.com, rhuerta@dayscript.com, jmoran@dayscript.com');
                                $this->email->subject('Actualización de Datos Personales');

                                $contenido	= "";
                                $contenido	.= "<div style = 'width:798px;min-height:200px;height:auto;' align='left'>";
                                $contenido	.=      "<div style = 'width:100%;height:100px;'>
                                                        <img src = '".base_url()."recursos/images/cabecera_correo.png'>
                                                    </div>";
                                $contenido	.=      "<div style='border:black thin solid; width:798px;' align='left'>";
                                $contenido	.=          "<div style='width: 600px; margin: 15px;'>
                                                            Estimado(a) Usuario sus Datos Personales han sido actualizados:
                                                         </div>
                                                         <div style='width: 600px; margin: 15px; text-align: left; clear:both;'>
                                                            <b>Datos Personales</b>
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
                                                            Para activar al usuario registrado dar clic en el siguiente enlace: <a href='".base_url()."administrador/usuarios/pendientes' target='_blank'>Activar</a>
                                                         </div>";           
                                $contenido	.=      "</div>";
                                $contenido	.=      "<div style='width:100%;height:92px;' align='center'>
                                                        <img src = '".base_url()."recursos/images/footer_correo.png'>
                                                    </div>";
                                $contenido	.= "</div>";

                                $this->email->message($contenido);

                                if ( ! $this->email->send() )
                                {
                                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo de notificación de la actualización de sus datos personales, por favor vuelva a intentar'));
                                }
                                else
                                {
                                    if($this->input->post("usuario") != $this->clslogin->getId())
                                    {
                                        if($this->clslogin->getTipoUsuario() == "U")
                                        {
                                            $url = base_url('main');
                                        }
                                        else if($this->clslogin->getTipoUsuario() == "A")
                                        {
                                            $url = base_url('administrador');
                                        }
                                        
                                        $this->clslogin->logout();
                                        echo json_encode(array('st'=>5, 'msg' => 'Cambios guardados con Éxito. Por favor vuelva a iniciar sesión.','url' => $url));
                                    }
                                    else
                                    {
                                        echo json_encode(array('st'=>3, 'msg' => 'Cambios guardados con Éxito'));
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al actualizar sus datos personales, por favor vuelva a intentar'));
                            }
                        }
                        else
                        {
                            echo json_encode(array('st'=>0, 'msg' => 'La contraseña ingresada no coincide con la registrada'));
                        }
                    }
                    else
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'La contraseña ingresada no coincide con la registrada'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                }
            }
        }
        

        function olvido_contrasena()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                $where = array( 'usu_usuario' => $this->input->post("usuario_correo") );
                $or_where = array( $this->input->post("usuario_correo") => 'usu_correo' );
                $usuario = $this->usuario->get_usuarios(array(), $where, $or_where);
                
                if($usuario)
                {
                    if($usuario->num_rows() == 1)
                    {
                        $row = $usuario->row();

                        $contrasena = random_string('alnum', 16);
                        
                        $this->email->from('miclaro@iclaro.com.ec', 'Portal de Distribuidores');
                        $this->email->to($row->usu_correo);
                        $this->email->cc('jfranco@dayscript.com, rhuerta@dayscript.com, jmoran@dayscript.com');
                        $this->email->subject('Portal de Distribuidores :: Contraseña Nueva');

                        $contenido  = "";
                        $contenido  .= "<div style = 'width:798px;min-height:200px;height:auto;' align='left'>";
                        $contenido  .=      "<div style = 'width:100%;height:100px;'>
                                                <img src = '".base_url()."recursos/images/cabecera_correo.png'>
                                            </div>";
                        $contenido  .=      "<div style='border:black thin solid; width:798px; height: auto; overflow: hidden;' align='left'>";
                        $contenido  .=          "<div style='width: 600px; margin: 15px;'>
                                                    Estimado(a) ".$row->usu_nombre." ".$row->usu_apellido." su contrase&ntilde;a nueva es:
                                                 </div>
                                                 <div style='width: 600px; padding: 30px;'>
                                                    <div style='float:left; width: 150px;'>
                                                        <b>Contrase&ntilde;a Nueva:</b>
                                                    </div>
                                                    <div style='float:left; width: 400px;'>
                                                        ".$contrasena."
                                                    </div>
                                                 </div>";           
                        $contenido  .=      "</div>";
                        $contenido  .=      "<div style='width:100%;height:92px;' align='center'>
                                                <img src = '".base_url()."recursos/images/footer_correo.png'>
                                            </div>";
                        $contenido  .= "</div>";
                        
                        $this->email->message($contenido);    

                        if ( ! $this->email->send() )
                        {
                            echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar el correo con su contraseña nueva, por favor vuelva a intentar'));
                        }
                        else
                        {
                            $salt = random_string('unique');
                            $nueva_contrasena = sha1(md5($salt.$contrasena));
                            $nueva_contrasena .= ":".$salt;
                    
                            $data["usu_contrasena"] = $nueva_contrasena;
                            $data["usu_fecha_modificado"] = date('Y-m-d H:i:s');
                            $where = array("usu_cedula" => $row->usu_cedula);
                            
                            $resultado = $this->usuario->update_usuarios($data, $where, "OLVIDO_CONTRASENA");

                            if($resultado)
                            {
                                echo json_encode(array('st'=>2, 'msg' => 'Se ha enviado una nueva contraseña a su correo registrado'));
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al actualizar su contraseña por favor vuelva a intentarlo'));
                            }
                        }
                    }
                    else
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'No se encontro usuario'));
                    }
                }
                else
                {
                    echo json_encode(array('st'=>0, 'msg' => 'No se encontro usuario'));
                }
            }
        }
        
        
        function cambiar_contrasena()
        {
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('st'=>0, 'msg' => validation_errors()));
            }
            else
            {
                if($this->input->post("contrasena_nueva") != $this->input->post("contrasena_nueva_2"))
                {
                    echo json_encode(array('st'=>0, 'msg' => 'No coinciden los campos de nueva contraseña y repetir nueva contraseña'));
                }
                else
                {
                    $where = array('usu_cedula' => $this->clslogin->getCedula(), 'usu_id' => $this->clslogin->getId());
                    $usuario = $this->usuario->get_usuarios(array(), $where);

                    if($usuario)
                    {
                        if($usuario->num_rows() == 1)
                        {
                            $row = $usuario->row();
                            
                            $verificar_contrasena = $this->passwordJoinSalt($usuario->row()->usu_contrasena, $this->input->post("contrasena_actual"));
                        
                            if($verificar_contrasena)
                            {
                                $contrasena = $this->input->post("contrasena_nueva");

                                $this->email->from('miclaro@iclaro.com.ec', 'Portal de Distribuidores');
                                $this->email->to($row->usu_correo);
                                $this->email->cc('jfranco@dayscript.com, rhuerta@dayscript.com, jmoran@dayscript.com');
                                $this->email->subject('Portal de Distribuidores :: Cambio de Contraseña');

                                $contenido  = "";
                                $contenido  .= "<div style = 'width:798px;min-height:200px;height:auto;' align='left'>";
                                $contenido  .=      "<div style = 'width:100%;height:100px;'>
                                                        <img src = '".base_url()."recursos/images/cabecera_correo.png'>
                                                    </div>";
                                $contenido  .=      "<div style='border:black thin solid; width:798px; height: auto; overflow: hidden;' align='left'>";
                                $contenido  .=          "<div style='width: 600px; margin: 15px;'>
                                                            Estimado(a) ".$row->usu_nombre." ".$row->usu_apellido." usted ha realizado un cambio de contrase&ntilde;a dentro del Portal de Distribuidores.
                                                         </div>
                                                         <div style='width: 600px; padding: 30px;'>
                                                            <div style='float:left; width: 150px;'>
                                                                <b>Contrase&ntilde;a Nueva:</b>
                                                            </div>
                                                            <div style='float:left; width: 400px;'>
                                                                ".$contrasena."
                                                            </div>
                                                         </div>";           
                                $contenido  .=      "</div>";
                                $contenido  .=      "<div style='width:100%;height:92px;' align='center'>
                                                        <img src = '".base_url()."recursos/images/footer_correo.png'>
                                                    </div>";
                                $contenido  .= "</div>";

                                $this->email->message($contenido);    

                                if ( ! $this->email->send() )
                                {
                                    echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al enviar la notificación del cambio de contraseña, por favor vuelva a intentar'));
                                }
                                else
                                {
                                    $salt = random_string('unique');
                                    $new_password = sha1(md5($salt.$contrasena));
                                    $new_password .= ":".$salt;
                    
                                    $data = array();
                                    $data["usu_contrasena"] = $new_password;
                                    $data["usu_fecha_modificado"] = date('Y-m-d H:i:s');

                                    $where = array('usu_cedula' => $this->clslogin->getCedula(), 'usu_id' => $this->clslogin->getId());

                                    $resultado = $this->usuario->update_usuarios($data, $where, "CAMBIO_CONTRASENA");

                                    if($resultado)
                                    {
                                        if($this->clslogin->getTipoUsuario() == "U")
                                        {
                                            $url = base_url('main');
                                        }
                                        else if($this->clslogin->getTipoUsuario() == "A")
                                        {
                                            $url = base_url('administrador');
                                        }
                                        
                                        $this->clslogin->logout();
                                        echo json_encode(array('st'=>5, 'msg' => 'Su contraseña ha sido actualizada con Éxito. Por favor vuelva a iniciar sesión.','url' => $url));
                                    }
                                    else
                                    {
                                        echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema al guardar su nueva contraseña, por favor vuelva a intentar.'));
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array('st'=>0, 'msg' => 'No coincide el campo de contraseña actual con la contraseña registrada'));
                            }
                        }
                        else
                        {
                            echo json_encode(array('st'=>0, 'msg' => 'No coincide el campo de contraseña actual con la contraseña registrada'));
                        }
                    }
                    else
                    {
                        echo json_encode(array('st'=>0, 'msg' => 'Hubo un problema con el servidor, por favor vuelva a intentar'));
                    }
                }
            }
        }
        
        
        function encrypt($string, $key)
        {
            $result = "";
            
            for($i=0; $i<strlen($string); $i++)
            {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)+ord($keychar));
                $result.=$char;
            }
            
            return base64_encode($result);
        }
        
        
        function decrypt($string, $key)
        {
            $result = "";
            $string = base64_decode($string);
            
            for($i=0; $i<strlen($string); $i++)
            {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key))-1, 1);
                $char = chr(ord($char)-ord($keychar));
                $result.=$char;
            }
            
            return $result;
        }
        
        
        function passwordJoinSalt( $passwordBase, $passwordWritesByUser )
        {
            $salt = explode(":", $passwordBase);
            $enc_pass = sha1(md5($salt[1].$passwordWritesByUser));
            $finalPassword = $enc_pass.":".$salt[1];
            
            if($passwordBase === $finalPassword)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>
