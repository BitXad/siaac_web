<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Nivel extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nivel_model');
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
     * Listing of nivel
     */
    function index()
    {
        if($this->acceso(103)){
            $data['nivel'] = $this->Nivel_model->get_all_nivel();

            $data['_view'] = 'nivel/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new nivel
     */
    function add()
    {
        if($this->acceso(104)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nivel_descripcion','Nivel Descripcion','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {   
                $params = array(
                    'planacad_id' => $this->input->post('planacad_id'),
                    'nivel_descripcion' => $this->input->post('nivel_descripcion'),
                );
                $nivel_id = $this->Nivel_model->add_nivel($params);
                redirect('nivel/index');
            }
            else
            {
                $this->load->model('Plan_academico_model');
                $data['all_plan_academico'] = $this->Plan_academico_model->get_all_plan_academico();

                $data['_view'] = 'nivel/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a nivel
     */
    function edit($nivel_id)
    {
        if($this->acceso(105)){
            // check if the nivel exists before trying to edit it
            $data['nivel'] = $this->Nivel_model->get_nivel($nivel_id);
            if(isset($data['nivel']['nivel_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nivel_descripcion','Nivel Descripcion','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())
                {   
                    $params = array(
                        'planacad_id' => $this->input->post('planacad_id'),
                        'nivel_descripcion' => $this->input->post('nivel_descripcion'),
                    );

                    $this->Nivel_model->update_nivel($nivel_id,$params);            
                    redirect('nivel/index');
                }
                else
                {
                    $this->load->model('Plan_academico_model');
                    $data['all_plan_academico'] = $this->Plan_academico_model->get_all_plan_academico();

                    $data['_view'] = 'nivel/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The nivel you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting nivel
     */
    function remove($nivel_id)
    {
        if($this->acceso(103)){
        $nivel = $this->Nivel_model->get_nivel($nivel_id);
        // check if the nivel exists before trying to delete it
        if(isset($nivel['nivel_id']))
        {
            $this->Nivel_model->delete_nivel($nivel_id);
            redirect('nivel/index');
        }
        else
            show_error('The nivel you are trying to delete does not exist.');
        }
    }
    
}
