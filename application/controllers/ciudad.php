<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * ciudad
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class ciudad extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model("mod_ciudad","ciudad");
        }
        
        
        function listar_ciudades($tipo = 0)
        {
            switch ($tipo)
            {    
                case 0:
                    
                    $select = "*";
                    $where = array("ciu_estado" => "A", "ciu_pro_id" => $this->input->post('provincia'));
                    
                    $resultado = $this->ciudad->get_ciudades($select, $where);
                    
                    $data['ciudades'] = array('' => 'Seleccione');
                    
                    if($resultado)
                    {
                        foreach ($resultado->result() as $row)
                        {
                            $data['ciudades'][$row->ciu_id] = $row->ciu_nombre;
                        }
                    }
                    
                    $js = "id='ciudad'";
                    $data = form_dropdown('ciudad', $data['ciudades'], '', $js);

                    break;
            }
            
            echo $data;
        }
    }
    
?>

