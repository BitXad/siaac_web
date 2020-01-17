<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Plan_academico extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plan_academico_model');
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
     * Listing of plan_academico
     */
    function index()
    {
        if($this->acceso(55)){
            $data['plan_academico'] = $this->Plan_academico_model->get_all_plan_academico();

            $data['_view'] = 'plan_academico/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new plan_academico
     */
    function add()
    {
        if($this->acceso(55)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('planacad_nombre','Plan Academico Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {   
                $estado_id = 1;
                $params = array(
                    'estado_id' => $estado_id,
                    'carrera_id' => $this->input->post('carrera_id'),
                    'planacad_nombre' => $this->input->post('planacad_nombre'),
                    //'planacad_feccreacion' => $this->input->post('plan_academico_feccreacion'),
                    'planacad_codigo' => $this->input->post('planacad_codigo'),
                    'planacad_titmodalidad' => $this->input->post('planacad_titmodalidad'),
                   // 'planacad_cantgestion' => $this->input->post('planacad_cantgestion'),
                );

                $plan_academico_id = $this->Plan_academico_model->add_plan_academico($params);
                redirect('plan_academico/index');
            }
            else
            {
                $this->load->model('Carrera_model');
                $data['all_carrera'] = $this->Carrera_model->get_all_carrera();

                $data['_view'] = 'plan_academico/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a plan_academico
     */
    function edit($plan_academico_id)
    {
        if($this->acceso(55)){
            // check if the plan_academico exists before trying to edit it
            $data['planacad'] = $this->Plan_academico_model->get_plan_academico($plan_academico_id);
            if(isset($data['planacad']['planacad_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('planacad_nombre','Plan Academico Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'estado_id' => $this->input->post('estado_id'),
                        'carrera_id' => $this->input->post('carrera_id'),
                        'planacad_nombre' => $this->input->post('planacad_nombre'),
                        //'planacad_feccreacion' => $this->input->post('plan_academico_feccreacion'),
                        'planacad_codigo' => $this->input->post('planacad_codigo'),
                        'planacad_titmodalidad' => $this->input->post('planacad_titmodalidad'),
                        //'planacad_cantgestion' => $this->input->post('planacad_cantgestion'),
                    );

                    $this->Plan_academico_model->update_plan_academico($plan_academico_id,$params);            
                    redirect('plan_academico/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $this->load->model('Carrera_model');
                    $data['all_carrera'] = $this->Carrera_model->get_all_carrera();

                    $data['_view'] = 'plan_academico/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The plan_academico you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting plan_academico
     */
    function remove($plan_academico_id)
    {
        if($this->acceso(55)){
        $plan_academico = $this->Plan_academico_model->get_plan_academico($plan_academico_id);
        // check if the plan_academico exists before trying to delete it
        if(isset($plan_academico['planacad_id']))
        {
            $this->Plan_academico_model->delete_plan_academico($plan_academico_id);
            redirect('plan_academico/index');
        }
        else
            show_error('The plan_academico you are trying to delete does not exist.');
        }
    }
    /*
     * Creacion de Plan Academico
     */
    function planacad()
    {
        if($this->acceso(55)){
            $this->load->model('Institucion_model');
            $data['all_institucion'] = $this->Institucion_model->get_all_institucion();

            $this->load->model('Area_carrera_model');
            $data['all_areacarrera'] = $this->Area_carrera_model->get_all_area_carrera();

            $this->load->model('Area_materium_model');
            $data['all_areas'] = $this->Area_materium_model->get_all_area_mat();

            $data['_view'] = 'plan_academico/planacad';
            $this->load->view('layouts/main',$data);
        }
    }
    /****obtener plan academico de una carrera****/
    function get_plan_acadcarrera()
    {
        if ($this->input->is_ajax_request()){
            
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
    /****REGISTRAR NUEVO plan academico de una carrera****/
    function new_plan_acadcarrera()
    {
        if ($this->input->is_ajax_request()){
            
            /*$carrera_id = $this->input->post('carrera_id');
            $planacad_nombre = $this->input->post('planacad_nombre');
            $planacad_codigo = $this->input->post('planacad_codigo');
            $planacad_titmodalidad = $this->input->post('planacad_titmodalidad');
            */
            $this->load->library('form_validation');
            $this->form_validation->set_rules('planacad_nombre','Plan Academico Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                $estado_id = 1;
                $carrera_id = $this->input->post('carrera_id');
                $params = array(
                    'estado_id' => $estado_id,
                    'carrera_id' => $carrera_id,
                    'planacad_nombre' => $this->input->post('planacad_nombre'),
                    //'planacad_feccreacion' => $this->input->post('plan_academico_feccreacion'),
                    'planacad_codigo' => $this->input->post('planacad_codigo'),
                    'planacad_titmodalidad' => $this->input->post('planacad_titmodalidad'),
                   // 'planacad_cantgestion' => $this->input->post('planacad_cantgestion'),
                );
            
                $plan_academico_id = $this->Plan_academico_model->add_plan_academico($params);
                $datos = $this->Plan_academico_model->get_plan_acad_carr($carrera_id);
                echo json_encode($datos);
            }else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
        
    }
    /****REGISTRAR NUEVO NIVEL****/
    function new_nivel()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nivel_descripcion','Nivel Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                $nivel_descripcion = $this->input->post('nivel_descripcion');
                $nivel_color = $this->input->post('nivel_color');
                $planacad_id = $this->input->post('planacad_id');
                $this->load->model('Nivel_model');
                $nomduplicado = $this->Nivel_model->verifivar_nombre_nivel($planacad_id, $nivel_descripcion);
                if($nomduplicado>0){
                    echo json_encode("dp");
                }else{
                    $params = array(
                        'planacad_id' => $planacad_id,
                        'nivel_descripcion' => $nivel_descripcion,
                        'nivel_color' => $nivel_color,
                    );
                    $nivel_id = $this->Nivel_model->add_nivel($params);

                    echo json_encode("ok");
                }
            }else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
        
    }
    /***OBTIENE TODOS LOS  plan academico de una carrera****/
    function get_nivel_planacad()
    {
        if ($this->input->is_ajax_request()){
            $planacad_id = $this->input->post('planacad_id');

            $this->load->model('Nivel_model');
            $datos = $this->Nivel_model->get_all_nivel_forplan($planacad_id);
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
    }
    /***OBTIENE MATERIAS  de un nivel****/
    function get_materiasnivel()
    {
        if ($this->input->is_ajax_request()){
            $nivel_id = $this->input->post('nivel_id');

            $this->load->model('Materia_model');
            $datos = $this->Materia_model->get_all_materia_nivel($nivel_id);
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
    }
    /*** CREA NUEVAS MATERIAS ****/
    function new_materia()
    {
        if ($this->input->is_ajax_request()){
            $this->load->library('form_validation');
            $prerequisito = $this->input->post('prerequisito');
            if($prerequisito == 0){
                $this->form_validation->set_rules('mat_materia_id','Materia','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            }
            $this->form_validation->set_rules('materia_nombre','Materia Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_alias','Materia Alias','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_codigo','Materia Codigo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('area_id','Area','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_horas','Materia Horas','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                
                $materia_nombre = $this->input->post('materia_nombre');
                $materia_alias = $this->input->post('materia_alias');
                $mat_materia_id = $this->input->post('mat_materia_id');
                $area_id = $this->input->post('area_id');
                $materia_codigo = $this->input->post('materia_codigo');
                $materia_horas = $this->input->post('materia_horas');
                $nivel_id = $this->input->post('nivel_id');
                if($prerequisito == 1){
                    $params = array(
                        'estado_id' => 1,
                        'area_id' => $area_id,
                        'nivel_id' => $nivel_id,
                        'materia_nombre' => $materia_nombre,
                        'materia_alias' => $materia_alias,
                        'materia_codigo' => $materia_codigo,
                        'materia_horas' => $materia_horas,
                    );
                }else{
                    $params = array(
                        'estado_id' => 1,
                        'area_id' => $area_id,
                        'nivel_id' => $nivel_id,
                        'mat_materia_id' => $mat_materia_id,
                        'materia_nombre' => $materia_nombre,
                        'materia_alias' => $materia_alias,
                        'materia_codigo' => $materia_codigo,
                        'materia_horas' => $materia_horas,
                    );
                }
                $this->load->model('Materia_model');
                $materia_id = $this->Materia_model->add_materia($params);
                //$datos = $this->Materia_model->get_all_materias_activo($nivel_id);
                echo json_encode("ok");
            }else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
    }
    /*** Modificar Materia desde plan academico ****/
    function modificar_materia()
    {
        if ($this->input->is_ajax_request()){
            $this->load->library('form_validation');
            $prerequisito = $this->input->post('prerequisito');
            if($prerequisito == 0){
                $this->form_validation->set_rules('mat_materia_id','Materia','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            }
            $this->form_validation->set_rules('materia_nombre','Materia Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_alias','Materia Alias','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_codigo','Materia Codigo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('area_id','Area','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('materia_horas','Materia Horas','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                
                $materia_id = $this->input->post('materia_id');
                $materia_nombre = $this->input->post('materia_nombre');
                $materia_alias = $this->input->post('materia_alias');
                $mat_materia_id = $this->input->post('mat_materia_id');
                $area_id = $this->input->post('area_id');
                $materia_codigo = $this->input->post('materia_codigo');
                $materia_horas = $this->input->post('materia_horas');
                $nivel_id = $this->input->post('nivel_id');
                if($prerequisito == 1){
                    $params = array(
                        'area_id' => $area_id,
                        'nivel_id' => $nivel_id,
                        'mat_materia_id' => 0,
                        'materia_nombre' => $materia_nombre,
                        'materia_alias' => $materia_alias,
                        'materia_codigo' => $materia_codigo,
                        'materia_horas' => $materia_horas,
                    );
                }else{
                    $params = array(
                        'area_id' => $area_id,
                        'nivel_id' => $nivel_id,
                        'mat_materia_id' => $mat_materia_id,
                        'materia_nombre' => $materia_nombre,
                        'materia_alias' => $materia_alias,
                        'materia_codigo' => $materia_codigo,
                        'materia_horas' => $materia_horas,
                    );
                }
                $this->load->model('Materia_model');
                $this->Materia_model->update_materia($materia_id, $params);
                //$datos = $this->Materia_model->get_all_materias_activo($nivel_id);
                echo json_encode("ok");
            }else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
    }
    
    /***OBTIENE MATERIAS activas  de un nivel****/
    function get_materias_activas_plan()
    {
        if ($this->input->is_ajax_request()){
            $planacad_id = $this->input->post('planacad_id');

            $this->load->model('Materia_model');
            $datos = $this->Materia_model->get_all_materias_activo_plan($planacad_id);
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
    }
    /***OBTIENE MATERIAS activas  de un nivel****/
    function get_carreras()
    {
        if ($this->input->is_ajax_request()){
            //$planacad_id = $this->input->post('planacad_id');

            $this->load->model('Carrera_model');
            $datos = $this->Carrera_model->get_all_carrerasok();
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
    }
    /***Crea nueva CARRERA ****/
    function new_carrera()
    {
        if ($this->input->is_ajax_request()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('carrera_nombre','Carrera Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('carrera_codigo','Carrera Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('areacarrera_id','Area Carrera','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                //por ser Nueva Carrera
                $estado_id = 1;
                $params = array(
                        'estado_id' => $estado_id,
                        'areacarrera_id' => $this->input->post('areacarrera_id'),
                        'carrera_nombre' => $this->input->post('carrera_nombre'),
                        'carrera_nombreinterno' => $this->input->post('carrera_nombre'),
                        'carrera_codigo' => $this->input->post('carrera_codigo'),
                        'carrera_nivel' => $this->input->post('carrera_nivel'),
                        'carrera_modalidad' => $this->input->post('carrera_modalidad'),
                        'carrera_plan' => $this->input->post('carrera_plan'),
                        'carrera_fechacreacion' => $this->input->post('carrera_fechacreacion'),
                        'carrera_matricula' => $this->input->post('carrera_matricula'),
                        'carrera_mensualidad' => $this->input->post('carrera_mensualidad'),
                        'carrera_tiempoestudio' => $this->input->post('carrera_tiempoestudio'),
                        'carrera_cargahoraria' => $this->input->post('carrera_cargahoraria'),
                        'carrera_nummeses' => $this->input->post('carrera_nummeses'),
                );

                $this->load->model('Carrera_model');
                $carrera_id = $this->Carrera_model->add_carrera($params);
                //$datos = $this->Materia_model->get_all_materias_activo($nivel_id);
                echo json_encode("ok");
            }else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
    }
    /* Imprimir plan_academico */
    function print_planacademico($planacad_id)
    {
        if($this->acceso(55)){
            $this->load->model('Institucion_model');
            $data['all_institucion'] = $this->Institucion_model->get_all_institucion();

            $data['plan_academico'] = $this->Plan_academico_model->get_plan_academico($planacad_id);

            $this->load->model('Carrera_model');
            $data['carrera'] = $this->Carrera_model->get_carrera($data['plan_academico']['carrera_id']);

            $this->load->model('Area_carrera_model');
            $data['area'] = $this->Area_carrera_model->get_area_carrera($data['carrera']['areacarrera_id']);

            $this->load->model('Nivel_model');
            $data['all_nivel'] = $this->Nivel_model->get_all_nivel_forplan($planacad_id);

            $data['_view'] = 'plan_academico/print_planacademico';
            $this->load->view('layouts/main',$data);
        }
    }
    /***OBTIENE Prerequisitos de MATERIAS****/
    function get_prerequisito()
    {
        if ($this->input->is_ajax_request()){
            $mat_materia_id = $this->input->post('mat_materia_id');
            if($mat_materia_id != null){
                $this->load->model('Materia_model');
                $datos = $this->Materia_model->get_codigo_pre_requisito($mat_materia_id);
                echo json_encode($datos);
            }else{
                echo json_encode(null);
            }
            
        }
        else
        {                 
            show_404();
        }
    }

    function inactivar($planacad_id)
    {
        
                $this->Plan_academico_model->inactivar_plan($planacad_id);
                redirect('plan_academico');
            
    }
    function activar($planacad_id)
    {
         $this->Plan_academico_model->activar_plan($planacad_id);
                redirect('plan_academico');
           
    }
}

