<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Materia_asignada extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Materia_asignada_model');
    } 

    /*
     * Listing of materia_asignada
     */
    function index()
    {
        $data['materia_asignada'] = $this->Materia_asignada_model->get_all_materia_asignada();
        
        $data['_view'] = 'materia_asignada/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new materia_asignada
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'estado_id' => $this->input->post('estado_id'),
				'kardexacad_id' => $this->input->post('kardexacad_id'),
				'materiaasig_nombre' => $this->input->post('materiaasig_nombre'),
				'materiaasig_codigo' => $this->input->post('materiaasig_codigo'),
            );
            
            $materia_asignada_id = $this->Materia_asignada_model->add_materia_asignada($params);
            redirect('materia_asignada/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();
            
            $data['_view'] = 'materia_asignada/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a materia_asignada
     */
    function edit($materiaasig_id)
    {   
        // check if the materia_asignada exists before trying to edit it
        $data['materia_asignada'] = $this->Materia_asignada_model->get_materia_asignada($materiaasig_id);
        
        if(isset($data['materia_asignada']['materiaasig_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'kardexacad_id' => $this->input->post('kardexacad_id'),
					'materiaasig_nombre' => $this->input->post('materiaasig_nombre'),
					'materiaasig_codigo' => $this->input->post('materiaasig_codigo'),
                );

                $this->Materia_asignada_model->update_materia_asignada($materiaasig_id,$params);            
                redirect('materia_asignada/index');
            }
            else
            {
				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'materia_asignada/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The materia_asignada you are trying to edit does not exist.');
    } 

    /*
     * Deleting materia_asignada
     */
    function remove($materiaasig_id)
    {
        $materia_asignada = $this->Materia_asignada_model->get_materia_asignada($materiaasig_id);

        // check if the materia_asignada exists before trying to delete it
        if(isset($materia_asignada['materiaasig_id']))
        {
            $this->Materia_asignada_model->delete_materia_asignada($materiaasig_id);
            redirect('materia_asignada/index');
        }
        else
            show_error('The materia_asignada you are trying to delete does not exist.');
    }
    
}
