<?php
    if (!defined('BASEPATH'))
        exit('No tiene Permiso para acceder directamente al Script');
    /**
    * @author Miguel Quiroz Martinez
    * @author mquirozm1984@hotmail.com
    * @author Edson Jonathan Franco Borja
    * @author jonathan_200032@hotmail.com
    * @copyright WEB2MQ 2009
    * @version 1.1.0
    * @package libraries
    * @access public
    * |---------------------------------------------------------------
    * | clsLogin
    * |---------------------------------------------------------------
    * |
    * | Maneja el login del Portal de Distribuidores
    * |
    */

    /*
        CREATE TABLE IF NOT EXISTS `ci_sessions` (
        session_id varchar(40) DEFAULT '0' NOT NULL,
        ip_address varchar(16) DEFAULT '0' NOT NULL,
        user_agent varchar(50) NOT NULL,
        last_activity int(10) unsigned DEFAULT 0 NOT NULL,
        user_data text DEFAULT '' NOT NULL,
        PRIMARY KEY (session_id)
        );
    */
    
    class clsLogin
    {
        /**
        * Antes que nada empezaremos declarando nuestra variables en la clase. Cómo podeis
        * ver empiezan todas con un “_” de manera que serán variables del tipo “privado” de
        * manera, que solo podremos acceder a ellas y modificarlas dentro de la misma clase.
        * También aprovecharemos para darles un valor por defecto.
        * @var integer $_id cedula del usuario logoneado
        * @var string $_nombre nombre del usuario
        * @var string $_apellido apellido del usuario
        * @var string $_tipo_user tipo de usuario (S=SuperAdministrador, A=Administradores, U=Usuarios(Asistente))
        * @var string $_estado estado del usuario
        * @var boolean $_auth indica si esta logoneado el usuario o no
        *
        */
            var $_id            = 0;
            var $_nombre        = "";
            var $_apellido      = "";
            var $_tipo_usuario  = "";
            var $_estado        = "";
            var $_auth          = false;

            
        /**
        * Admin_login($auto = TRUE) constructor de la clase
        * Podemos ver que el constructor es el mismo nombre de la clase (acordaros de la mayúscula!).
        * También podemos llamarlo “__construct”, pero nuestra manera no habrá problemas con
        * versiones antiguas de PHP.
        * También pasaremos un parámetro que por defecto valdrá “TRUE”, de manera que siempre que
        * llamemos a nuestra clase se efectuara la comprobación.
        * En la linea 5 vemos como llamamos a una instancia de CodeIgniter, ya que ahora nos
        * movemos en ámbito de clase propia y no estamos ‘heredando’ ninguna función de CodeIgniter.
        * De manera que en vez de llamar a las funciones $this->libreria->funcion como lo hacíamos
        * en los controladores, lo llamaremos con $CI->libreria->funcion, ya que en estos momentos
        * $this se refiere a nuestra clase.
        * Con esto $CI->session->userdata(’nombre’) lo que hacemos es coger los valores de las
        * variables sessión, es parecido a $_SESSION['nombre'] pero cómo CodeIgniter tiene su propio
        * sistema de variables session lo haremos de esta manera.
        * De manera que pasaremos el valor de usuario y la contraseña a nuestra función de login
        * (que veremos mas adelante), y en caso de que sea correcto,copiaremos el valor de las
        * variables session en nuestra clase, para que podamos usarlo luego.
        * @param boolean $auto verdadero pra que busque en la bd si el usuario existe
        */
            function clsLogin($auto = true)
            {
                if ($auto) {

                    $CI = &get_instance();

                    if ( $this->login( $CI->session->userdata('usuario'), $CI->session->userdata('contrasena') ) )
                    {
                        $this->_id              = $CI->session->userdata('id');
                        $this->_nombre           = $CI->session->userdata('nombre');
                        $this->_apellido         = $CI->session->userdata('apellido');
                        $this->_tipo_usuario    = $CI->session->userdata('tipo');
                        $this->_estado          = $CI->session->userdata('estado');
                        $this->_auth            = true;
                    }
                }
            }


        /**
        * getId() retorna el id del usuario
        * @return integer _id
        */
            function getId()
            {
                return $this->_id;
            }

        /**
        * getNombre() retorna el nombre del usuario
        * @return string _nombre
        */
            function getNombre()
            {
                return $this->_nombre;
            }

        /**
        * getApellido() retorna el apellido del usuario
        * @return string _apellido
        */
            function getApellido()
            {
                return $this->_apellido;
            }

        /**
        * getTipoUsuario() retorna el tipo del usuario
        * @return string _tipo_usuario
        */
            function getTipoUsuario()
            {
                return $this->_tipo_usuario;
            }

        /**
        * getEstado() retorna el estado del usuario
        * @return string _estado
        */
            function getEstado()
            {
                return $this->_estado;
            }
        
        /**
        * getAuth() retorna si el usuario está autenticado
        * @return boolean _auth
        */
            function getAuth()
            {
                return $this->_auth;
            }
        /**
        * login($user = "", $clave = "")
        * La función de login recibirá dos parámetros: usuario y contraseña que normalmente serán
        * los que el usuario nos introduzca mediante un formulario. Pero también se usará para
        * validarse automáticamente mediante las variables SESSION que tendremos almacenadas,
        * asi siempre comprobaremos que las credenciales de los usuarios son siempre validas.
        * Entonces procederemos a comprobar que el usuario y la contraseña coinciden con la base
        * de datos, si todo esta correcto crearemos las variables sesión (o las actualizaremos).
        * Primero hay que tener claro que todas las variables tipo $this->_nombre son variables
        * privadas de la clase por lo que solo podremos acceder a ellas desde dentro (por eso
        * creamos en el articulo anterior funciones para retomar esos valores). La consulta en la
        * base de datos es muy sencilla, simplemente comprobamos que exista un registro que contenga
        * el usuario y el password (que ira encriptado con la función sha1).
        * Si todo es correcto crearemos las variables SESSION mediante la clase de CodeIgniter
        * session Class) y le daremos valor a nuestra variables privadas. Para acabar devolveremos
        * TRUE para que nuestro sistema sepa que todo ha ido correctamente.
        * Si algo falla llamaremos a la función logout para que elimine todos los restos y
        * devolveremos FALSE.
        * @param string $user usuario a consultar
        * @param string $clave usuario a consultar
        *
        */
            function login($user = "", $clave = "")
            {
                if (empty($user) || empty($clave))
                    return false;

                $CI = &get_instance();

                $sql = "SELECT usu_cedula, usu_nombre, usu_apellido, usu_tipo, usu_estado
                        FROM tbl_usuario
                        WHERE usu_usuario=? AND usu_contrasena=? AND usu_estado=?";
                
                $salt = '6&KTTmxa%Tej|y6uH%OhSrK@caXbNNo%I23tQmJ20Sid';
                $enc_pass = sha1(md5($salt.$clave));

                $query = $CI->db->query($sql, array($user, $enc_pass, 'A'));

                if ($query->num_rows() == 1) 
                {
                    $row                    = $query->row();
                    $this->_id              = $row->usu_cedula;
                    $this->_nombre          = $row->usu_nombre;
                    $this->_apellido        = $row->usu_apellido;
                    $this->_tipo_usuario    = $row->usu_tipo;
                    $this->_estado          = $row->usu_estado;
                    $this->_auth            = true;

                    $info_session = array(
                                            'id'            => $this->_id, 
                                            'nombre'        => $this->_nombre,
                                            'apellido'      => $this->_apellido,
                                            'tipo'          => $this->_tipo_usuario,
                                            'estado'        => $this->_estado,
                                            'usuario'       => $user,
                                            'contrasena'    => $clave
                                         );

                    $CI->session->set_userdata($info_session);

                    return true;
                }
                else
                {
                    $this->_auth = false;
                    $this->logout();

                    return false;
                }

                $query->free_result();
                $query->close();

                $CI->db->close();
            }

        /**
        * logout()
        * Esta función simple y llanamente destruirá las variables session.
        */
            function logout()
            {
                $CI = &get_instance();
                $CI->session->sess_destroy();

                $this->_auth            = false;
                $this->_id              = 0;
                $this->_nombre          = "";
                $this->_apellido        = "";
                $this->_tipo_usuario    = "";
                $this->_estado          = "";
               
                $CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
                $CI->output->set_header("Pragma: no-cache");
            }

        /**
        * Check()
        * La función check (comprobar) mirara simplemente si cumplimos el nivel indicado.
        * El segundo parámetro especificaremos si queremos que se compruebe estrictamente es decir,
        * suponiendo que [Nivel1:Usuario, Nivel2:Moderador, Nivel3:Administrador], si comprobamos
        * estrictamente el nivel 2 solo lo pasarían los Moderadores, en cambio si comprobamos lo
        * mismo sin ser estrictos, tanto los Moderadores como Administradores deberían tener acceso.
        * Aquí simplemente hacemos comparaciones con el nivel que queremos comprobar y el que tiene
        * el usuario, en caso de que sea estricto
        * miraremos que coincida exactamente (==), sino lo es, miraremos que sea mayor o igual (>=).
        */
            function check($tipo)
            {
                if($tipo == "main"){ $tipo = 0; }
                elseif($tipo == "administrador") { $tipo = 1; }
                
                switch ($tipo) 
                {
                    case 0:
                        if ($this->_auth && ($this->_tipo_usuario == 'U' || $this->_tipo_usuario == 'S')){
                            return true;
                        }else{
                            return false;
                        }
                        break;
                        
                    case 1:
                        if ($this->_auth && ($this->_tipo_usuario == 'A' || $this->_tipo_usuario == 'S')){
                            return true;
                        }else{
                            return false;
                        }
                        break;
                    
                    default :
                        if ($this->_auth && ($this->_tipo_usuario == 'U' || $this->_tipo_usuario == 'S')){
                            return true;
                        }else{
                            return false;
                        }
                        break;
                }
            }

    }
    
    ////////////////////INDICO QUE NO ALMACENE EN CACHE LA INFORMACION
    // Date in the past
    //$CI->output->set_header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT");
    // always modified
    //$CI->output->set_header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT");
    // HTTP/1.1
    //$CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
    //$CI->output->set_header("Cache-Control: post-check=0, pre-check=0", FALSE);
    //$CI->output->set_header("Pragma: no-cache");
    ////////////////////////////////////FIN DE CACHE
?>