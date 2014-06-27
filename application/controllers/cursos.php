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
                    $where = array("cur_estado" => "D");
                    $or_where = array("cur_estado" => "C", "cur_estado" => "T");
                    $join = array( "tbl_curso" => "cur_ciudad_id=ciu_id", "tbl_instructor" => "cur_instructor_id=ins_cedula", "tbl_parametros" => "cur_estado=par_sigla"  );
                    
                    $resultado = $this->curso->get_cursos($select, $where, $or_where, $join);
                    
                    $items = array();
                    $data = array();
                    
                    if($resultado){
                        foreach ($resultado->result() as $row) {
                            $fila = array();
                            $fila[] = $row->cur_id;
                            $fila[] = $row->cur_nombre;
                            $fila[] = $row->cur_fecha_inicio;
                            $fila[] = $row->cur_hora_inicio;
                            $fila[] = $row->ciu_nombre;
                            $fila[] = $row->ins_nombre." ".$row->ins_apellido;
                            $fila[] = $row->par_nombre;
                            $items[] = $fila;
                        }
                        
                        $data['data'] = $items;
                    }else{
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
    }
    
?>
