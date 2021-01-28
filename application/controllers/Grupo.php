<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grupo extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grupo_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of grupo
     */
    function index()
    {
        if($this->acceso(41)){
            $this->load->model('Carrera_model');
            $data['all_carrera'] = $this->Carrera_model->get_all_carreras();

            $this->load->model('Paralelo_model');
            $data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

            $this->load->model('Docente_model');
            $data['all_docente'] = $this->Docente_model->get_all_docente_activo();

            $this->load->model('Aula_model');
            $data['all_aula'] = $this->Aula_model->get_all_aula();

            $this->load->model('Periodo_model');
            $data['all_periodo'] = $this->Periodo_model->get_all_periodo();

            $this->load->model('Dia_model');
            $data['all_dia'] = $this->Dia_model->get_all_dias_activos();

            //$data['grupo'] = $this->Grupo_model->get_all_grupo();

            $data['_view'] = 'grupo/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new grupo
     */
    function add()
    {
        if($this->acceso(41)){
            $this->load->model('Carrera_model');
            $data['all_carrera'] = $this->Carrera_model->get_all_carreras();

            $data['_view'] = 'grupo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a grupo
     */
    function edit($grupo_id)
    {
        if($this->acceso(42)){
            // check if the grupo exists before trying to edit it
            $data['grupo'] = $this->Grupo_model->get_all_thisgrupo($grupo_id);

            if(isset($data['grupo']['grupo_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('materia_id','Materia','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('grupo_nombre','Grupo Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('dia_id','Dia','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('periodo_id','Periodo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('aula_id','Aula','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->load->model('Horario_model');
                $mensaje = "";
                if($this->form_validation->run())
                {
                    $yaregistrado    = false;
                    $yaregistradodoc = false;
                    $hayregistrado = $this->Horario_model->existe_horario($this->input->post('aula_id'), $this->input->post('periodo_id'), $this->input->post('dia_id'));
                    if($hayregistrado['res'] >0){
                        $yaregistrado = true;
                        $mensaje = 1;
                    }
                    $haydoc_dia_per = $this->Grupo_model->existe_docentedia_periodo($this->input->post('docente_id'), $this->input->post('dia_id'), $this->input->post('periodo_id'));
                    if($haydoc_dia_per['res'] >0){
                        $yaregistradodoc = true;
                        $mensaje = 2;
                    }
                    if($yaregistrado == false && $yaregistradodoc == false){
                        $params = array(
                            'periodo_id' => $this->input->post('periodo_id'),
                            'dia_id'     => $this->input->post('dia_id'),
                            'aula_id'    => $this->input->post('aula_id'),
                        );
                        $this->Horario_model->update_horario($data['grupo']['horario_id'],$params);
                        $paramsg = array(
                            'aula_id' => $this->input->post('aula_id'),
                            'materia_id' => $this->input->post('materia_id'),
                            'grupo_nombre' => $this->input->post('grupo_nombre'),
                        );
                        $this->Grupo_model->update_grupo($grupo_id,$paramsg);

                        redirect('grupo/index');
                    }else{
                        $data['mensaje'] = $mensaje;
                        $data['all_todo'] = $this->Grupo_model->get_carr_plan_nivel($data['grupo']['materia_id']);

                        $this->load->model('Docente_model');
                        $data['docente'] = $this->Docente_model->get_docente($data['grupo']['docente_id']);

                        $this->load->model('Materia_model');
                        $data['all_materia'] = $this->Materia_model->get_all_materia_nivel($data['all_todo']['nivel_id']);

                        $this->load->model('Dia_model');
                        $data['all_dia'] = $this->Dia_model->get_all_dias_activos();
                        $this->load->model('Periodo_model');
                        $data['all_periodo'] = $this->Periodo_model->get_all_periodo();
                        $this->load->model('Aula_model');
                        $data['all_aula'] = $this->Aula_model->get_all_aula();
                        $data['_view'] = 'grupo/edit';
                        $this->load->view('layouts/main',$data);
                    }
                }
                else
                {
                    $data['mensaje'] = $mensaje;
                    $data['all_todo'] = $this->Grupo_model->get_carr_plan_nivel($data['grupo']['materia_id']);

                    $this->load->model('Docente_model');
                    $data['docente'] = $this->Docente_model->get_docente($data['grupo']['docente_id']);

                    $this->load->model('Materia_model');
                    $data['all_materia'] = $this->Materia_model->get_all_materia_nivel($data['all_todo']['nivel_id']);

                    $this->load->model('Dia_model');
                    $data['all_dia'] = $this->Dia_model->get_all_dias_activos();
                    $this->load->model('Periodo_model');
                    $data['all_periodo'] = $this->Periodo_model->get_all_periodo();
                    $this->load->model('Aula_model');
                    $data['all_aula'] = $this->Aula_model->get_all_aula();
                    $data['_view'] = 'grupo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The grupo you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting grupo y horario
     */
    function remove()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Horario_model');
            $grupo_id = $this->input->post('grupo_id');
            if ($grupo_id!=""){
                $data['grupo'] = $this->Grupo_model->get_all_thisgrupo($grupo_id);
                $horario_id = $data['grupo']['horario_id'];
                
                $this->Horario_model->delete_horario($horario_id);
                $this->Grupo_model->delete_grupo($grupo_id);
                
                echo json_encode("ok");
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    
    /****obtener planes academicos de una carrera****/
    function get_planes_academicos()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Plan_academico_model');
            $carrera_id = $this->input->post('carrera_id');
            if ($carrera_id!=""){
                $datos = $this->Plan_academico_model->get_plan_acad_carr($carrera_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    
    /****obtener planes academicos de una carrera****/
    function get_docente()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Docente_model');
            $docente_id = $this->input->post('docente_id');
            if ($docente_id!=""){
                $datos = $this->Docente_model->get_docente($docente_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    /****obtener Niveles de un plan academico****/
    function get_niveles()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Nivel_model');
            $planacad_id = $this->input->post('planacad_id');
            if ($planacad_id != ""){
                $datos = $this->Nivel_model->get_all_nivel_forplan($planacad_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    /****obtener Materias de un Nivel ****/
    function get_materias()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Materia_model');
            $nivel_id = $this->input->post('nivel_id');
            if ($nivel_id != ""){
                $datos = $this->Materia_model->get_all_materia_nivel($nivel_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    /****obtener grupos de DOCENTE ****/
    function get_grupodocente()
    {
        if ($this->input->is_ajax_request())
        {
            $docente_id = $this->input->post('docente_id');
            if ($docente_id != ""){
                $datos = $this->Grupo_model->get_allgrupo_docente($docente_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    
    /**** Registrar nuevo grupo docente ****/
    function registrar_newgrupodocente()
    {
        if ($this->input->is_ajax_request())
        {
            $carrera_id   = $this->input->post('carrera_id');
            $planacad_id  = $this->input->post('planacad_id');
            $nivel_id     = $this->input->post('nivel_id');
            //$docente_id   = $this->input->post('docente_id');
            $materia_id   = $this->input->post('materia_id');
            $grupo_nombre = $this->input->post('grupo_nombre');
            /*$dia1 = $this->input->post('dia1');
            $dia2 = $this->input->post('dia2');
            $dia3 = $this->input->post('dia3');
            $dia4 = $this->input->post('dia4');
            $dia5 = $this->input->post('dia5');
            $dia6 = $this->input->post('dia6');
            $dia7 = $this->input->post('dia7');
            $periodo1 = $this->input->post('periodo1');
            $periodo2 = $this->input->post('periodo2');
            $periodo3 = $this->input->post('periodo3');
            $periodo4 = $this->input->post('periodo4');
            $periodo5 = $this->input->post('periodo5');
            $periodo6 = $this->input->post('periodo6');
            $periodo7 = $this->input->post('periodo7');
            $aula1 = $this->input->post('aula1');
            $aula2 = $this->input->post('aula2');
            $aula3 = $this->input->post('aula3');
            $aula4 = $this->input->post('aula4');
            $aula5 = $this->input->post('aula5');
            $aula6 = $this->input->post('aula6');
            $aula7 = $this->input->post('aula7');*/
            $this->load->model('Horario_model');
            
            $gestion_id = $this->session_data['gestion_id'];
            $usuario_id = $this->session_data['usuario_id'];
            
            $estado_id = 1;
            $yaregistrado = false;
            $yaregistradodoc = false;
            
            
            //registrar grupo
            
            $sql = "insert into grupo (gestion_id, materia_id, grupo_nombre,usuario_id)"
                    . " value(".$gestion_id.",".$materia_id.",'".$grupo_nombre."',".$usuario_id.")";
            $grupo_id = $this->Grupo_model->ejecutar($sql);
            
            //registrar horario
            
            for ($index = 1; $index <= 7; $index++) {
                
                if ($dia_seleccionado){

                    $aula_id    = $this->input->post('aula'.$index);
                    $periodo_id = $this->input->post('periodo'.$index);
                    $dia_id     = $this->input->post('dia'.$index);

                    $sql = "insert into horario(estado_id,periodo_id,dia_id,aula_id,docente_id,grupo_id)"
                            . " value(1, ".$periodo_id.",".$dia_id.",".$aula_id.",".$docente_id.",".$grupo_id.")";
                    echo $sql;
                    $horario = $this->Grupo_model->ejecutar($sql);
                    
                }
                
                

//                if(!empty($aula) && !empty($periodo) && !empty($dia)){
//                    $hayregistrado = $this->Horario_model->existe_horario($aula, $periodo, $dia);
//                    if($hayregistrado['res'] >0){
//                        $yaregistrado = true;
//                    }
//                    $haydoc_dia_per = $this->Grupo_model->existe_docentedia_periodo($docente_id, $dia, $periodo);
//                    if($haydoc_dia_per['res'] >0){
//                        $yaregistrado = true;
//                        $yaregistradodoc = true;
//                    }
//                }
                
            }            
            
            
            //primero registrar al nuevo grupo
//            $paramsg = array(
//                
//                'horario_id' => $horario_id,
//                'docente_id' => $docente_id,
//                'gestion_id' => $gestion_id,
//                'usuario_id' => $usuario_id,
//                'aula_id' => $this->input->post('aula'.$i),
//                'materia_id' => $materia_id,
//                'grupo_nombre' => $grupo_nombre,
//            );
//            $grupo_id = $this->Grupo_model->add_grupo($paramsg);
//            
//            
            
            /*for ($index = 1; $index < 8; $index++) {
                
                $aula    = $this->input->post('aula'.$index);
                $periodo = $this->input->post('periodo'.$index);
                $dia     = $this->input->post('dia'.$index);
                
                if(!empty($aula) && !empty($periodo) && !empty($dia)){
                    $hayregistrado = $this->Horario_model->existe_horario($aula, $periodo, $dia);
                    if($hayregistrado['res'] >0){
                        $yaregistrado = true;
                    }
                    $haydoc_dia_per = $this->Grupo_model->existe_docentedia_periodo($docente_id, $dia, $periodo);
                    if($haydoc_dia_per['res'] >0){
                        $yaregistrado = true;
                        $yaregistradodoc = true;
                    }
                }
                
            }
            
            if($yaregistrado == false){
                for ($i = 1; $i < 8; $i++) {
                    if($this->input->post('dia'.$i) != ""){
                        $params = array(
                            'estado_id'  => $estado_id,
                            'periodo_id' => $this->input->post('periodo'.$i),
                            'dia_id'     => $this->input->post('dia'.$i),
                            'aula_id'    => $this->input->post('aula'.$i),
                        );
                        $horario_id = $this->Horario_model->add_horario($params);
                        
                        $paramsg = array(
                            'horario_id' => $horario_id,
                            'docente_id' => $docente_id,
                            'gestion_id' => $gestion_id,
                            'usuario_id' => $usuario_id,
                            'aula_id' => $this->input->post('aula'.$i),
                            'materia_id' => $materia_id,
                            'grupo_nombre' => $grupo_nombre,
                        );
                        $grupo_id = $this->Grupo_model->add_grupo($paramsg);
                    }
                } */
            /*if($dia1 != ""){ //////////////
                $params = array(
                    'estado_id'  => $estado_id,
                    'periodo_id' => $periodo1,
                    'dia_id'     => $dia1,
                    'aula_id'    => $aula1,
                );
                $horario_id = $this->Horario_model->add_horario($params);
                $paramsg = array(
                    'horario_id' => $horario_id,
                    'docente_id' => $docente_id,
                    'gestion_id' => $gestion_id,
                    'usuario_id' => $usuario_id,
                    'aula_id' => $aula1,
                    'materia_id' => $materia_id,
                    'grupo_nombre' => $grupo_nombre,
                );
                $grupo_id = $this->Grupo_model->add_grupo($paramsg);
            }*//////////////
                
         /*       echo json_encode("ok");
            }else{
                if($yaregistradodoc == true){
                    echo json_encode("sidoc");
                }else{
                    echo json_encode("siaula");
                }
            }*/
            
        }
        else
        {
            show_404();
        }
        
    }
    
    /****obtener grupos de Materia ****/
    function get_grupomateria()
    {
        if ($this->input->is_ajax_request())
        {
            $materia_id = $this->input->post('materia_id');
            if ($materia_id != ""){
                $datos = $this->Grupo_model->get_allgrupo_materia($materia_id);
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    /**** Registrar nuevo grupo materia ****/
    function registrar_newgrupomateria()
    {
        if ($this->input->is_ajax_request())
        {
            $carrera_id   = $this->input->post('carrera_id');
            $planacad_id  = $this->input->post('planacad_id');
            $nivel_id     = $this->input->post('nivel_id');
            $materia_id   = $this->input->post('materia_id');
            $grupo_nombre = $this->input->post('grupo_nombre');
            
            $gestion_id = $this->session_data['gestion_id'];
            $usuario_id = $this->session_data['usuario_id'];
            
            $yaregistrado = false;
            $haygrupo = $this->Grupo_model->existe_grupomateria($materia_id, $gestion_id, $grupo_nombre);
            if($haygrupo['res'] >0){
                $yaregistrado = true;
            }
            
            if($yaregistrado == false){
                $params = array(
                    'gestion_id'  => $gestion_id,
                    'usuario_id'  => $usuario_id,
                    'materia_id'  => $materia_id,
                    'grupo_nombre'  => $grupo_nombre,
                );
                $grupo_id = $this->Grupo_model->add_grupo($params);
                
                echo json_encode("ok");
            }else{
                echo json_encode("no");
            }
            
        }
        else
        {
            show_404();
        }
        
    }
    /* eliminar grupo  */
    function eliminar_grupo()
    {
        if ($this->input->is_ajax_request())
        {
            $grupo_id = $this->input->post('grupo_id');
            if ($grupo_id!=""){
                $this->Grupo_model->delete_grupo($grupo_id);
                echo json_encode("ok");
            }
            else echo json_encode(null);
        }
        else
        {
            show_404();
        }
        
    }
    /* Editar un grupo */
    function editar($grupo_id)
    {
        if($this->acceso(41)){
            $this->load->model('Carrera_model');
            $data['all_carrera'] = $this->Carrera_model->get_all_carreras();

            $data['get_informacion'] = $this->Grupo_model->get_informaciongrupo($grupo_id);

            $data['_view'] = 'grupo/editar';
            $this->load->view('layouts/main',$data);
        }
    }
    /**** Modifcar grupo materia ****/
    function modificar_grupomateria()
    {
        if ($this->input->is_ajax_request())
        {
            $materia_id   = $this->input->post('materia_id');
            $grupo_nombre = $this->input->post('grupo_nombre');
            $grupo_id = $this->input->post('grupo_id');
            
            $gestion_id = $this->session_data['gestion_id'];
            $usuario_id = $this->session_data['usuario_id'];
            
            $yaregistrado = false;
            $haygrupo = $this->Grupo_model->existe_grupomateria($materia_id, $gestion_id, $grupo_nombre);
            if($haygrupo['res'] >0){
                $yaregistrado = true;
            }
            
            if($yaregistrado == false){
                $params = array(
                    'gestion_id'  => $gestion_id,
                    'usuario_id'  => $usuario_id,
                    'materia_id'  => $materia_id,
                    'grupo_nombre'  => $grupo_nombre,
                );
                $this->Grupo_model->update_grupo($grupo_id, $params);
                
                echo json_encode("ok");
            }else{
                echo json_encode("no");
            }
            
        }
        else
        {
            show_404();
        }
        
    }
}
