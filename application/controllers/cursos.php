<?php
    if (! defined('BASEPATH'))
        exit ('No se puede ejecutar directamente este SCRIPT');
    
    /**
     * cursos
     *
     * @package      controllers
     * @author       Edson Jonathan Franco Borja
     * @version      1.0
    */
    class cursos extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->model("mod_curso","curso");
        }
        
        
        function listar_cursos($tipo = 0){
            
            switch ($tipo) {    
                case 0:
                    
                    $select = "cur_id, cur_estado, cur_nombre, cur_fecha_inicio, cur_hora_inicio, ins_nombre, ins_apellido, ciu_nombre";
                    $or_where = array("cur_estado" => "D", "cur_estado" => "C", "cur_estado" => "T");
                    $join = array( "tbl_curso" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );
                    
                    $resultado = $this->curso->get_cursos($select, array(), $or_where, $join);
                    
                    if($resultado['filas'] > 0){
                        foreach ($resultado->result() as $row) {
                            $data['data'][] = $row->cur_id;
                            $data['data'][] = $row->cur_nombre;
                            $data['data'][] = $row->cur_fecha_inicio;
                            $data['data'][] = $row->cur_hora_inicio;
                            $data['data'][] = $row->ciu_nombre;
                            $data['data'][] = $row->ins_nombre." ".$row->ins_apellido;
                            $data['data'][] = $row->par_nombre;
                        }
                    }
                    else{
                        
                    }
                        
                        
                    break;
            }
            
        }
    }
    
?>
