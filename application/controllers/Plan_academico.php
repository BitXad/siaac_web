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
    } 

    /*
     * Listing of plan_academico
     */
    function index()
    {
        $data['plan_academico'] = $this->Plan_academico_model->get_all_plan_academico();
        
        $data['_view'] = 'plan_academico/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plan_academico
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('plan_academico_nombre','Plan Academico Nombre','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'estado_id' => $this->input->post('estado_id'),
				'carrera_id' => $this->input->post('carrera_id'),
				'plan_academico_nombre' => $this->input->post('plan_academico_nombre'),
				'plan_academico_feccreacion' => $this->input->post('plan_academico_feccreacion'),
				'plan_academico_codigo' => $this->input->post('plan_academico_codigo'),
				'plan_academico_titmodalidad' => $this->input->post('plan_academico_titmodalidad'),
				'plan_academico_cantgestion' => $this->input->post('plan_academico_cantgestion'),
            );
            
            $plan_academico_id = $this->Plan_academico_model->add_plan_academico($params);
            redirect('plan_academico/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$this->load->model('Carrera_model');
			$data['all_carrera'] = $this->Carrera_model->get_all_carrera();
            
            $data['_view'] = 'plan_academico/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plan_academico
     */
    function edit($plan_academico_id)
    {   
        // check if the plan_academico exists before trying to edit it
        $data['plan_academico'] = $this->Plan_academico_model->get_plan_academico($plan_academico_id);
        
        if(isset($data['plan_academico']['plan_academico_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('plan_academico_nombre','Plan Academico Nombre','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'carrera_id' => $this->input->post('carrera_id'),
					'plan_academico_nombre' => $this->input->post('plan_academico_nombre'),
					'plan_academico_feccreacion' => $this->input->post('plan_academico_feccreacion'),
					'plan_academico_codigo' => $this->input->post('plan_academico_codigo'),
					'plan_academico_titmodalidad' => $this->input->post('plan_academico_titmodalidad'),
					'plan_academico_cantgestion' => $this->input->post('plan_academico_cantgestion'),
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

    /*
     * Deleting plan_academico
     */
    function remove($plan_academico_id)
    {
        $plan_academico = $this->Plan_academico_model->get_plan_academico($plan_academico_id);

        // check if the plan_academico exists before trying to delete it
        if(isset($plan_academico['plan_academico_id']))
        {
            $this->Plan_academico_model->delete_plan_academico($plan_academico_id);
            redirect('plan_academico/index');
        }
        else
            show_error('The plan_academico you are trying to delete does not exist.');
    }
    
}