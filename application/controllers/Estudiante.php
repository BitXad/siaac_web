<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estudiante extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estudiante_model');
    } 

    /*
     * Listing of estudiante
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('estudiante/index?');
        $config['total_rows'] = $this->Estudiante_model->get_all_estudiante_count();
        $this->pagination->initialize($config);

        $data['estudiante'] = $this->Estudiante_model->get_all_estudiante($params);
        
        $data['_view'] = 'estudiante/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new estudiante
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('estudiante_nombre','Estudiante Nombre','required');
		$this->form_validation->set_rules('estudiante_apellidos','Estudiante Apellidos','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'estado_id' => $this->input->post('estado_id'),
				'genero_id' => $this->input->post('genero_id'),
				'estadocivil_id' => $this->input->post('estadocivil_id'),
				'estudiante_nombre' => $this->input->post('estudiante_nombre'),
				'estudiante_apellidos' => $this->input->post('estudiante_apellidos'),
				'estudiante_fechanac' => $this->input->post('estudiante_fechanac'),
				'estudiante_edad' => $this->input->post('estudiante_edad'),
				'estudiante_ci' => $this->input->post('estudiante_ci'),
				'estudiante_extci' => $this->input->post('estudiante_extci'),
				'estudiante_direccion' => $this->input->post('estudiante_direccion'),
				'estudiante_telefono' => $this->input->post('estudiante_telefono'),
				'estudiante_celular' => $this->input->post('estudiante_celular'),
				'estudiante_foto' => $this->input->post('estudiante_foto'),
				'estudiante_lugarnac' => $this->input->post('estudiante_lugarnac'),
				'estudiante_nacionalidad' => $this->input->post('estudiante_nacionalidad'),
				'estudiante_establecimiento' => $this->input->post('estudiante_establecimiento'),
				'estudiante_distrito' => $this->input->post('estudiante_distrito'),
				'estudiante_apoderado' => $this->input->post('estudiante_apoderado'),
				'apoderado_foto' => $this->input->post('apoderado_foto'),
				'estudiante_apodireccion' => $this->input->post('estudiante_apodireccion'),
				'estudiante_apoparentesco' => $this->input->post('estudiante_apoparentesco'),
				'estudiante_apotelefono' => $this->input->post('estudiante_apotelefono'),
				'estudiante_nit' => $this->input->post('estudiante_nit'),
				'estudiante_razon' => $this->input->post('estudiante_razon'),
            );
            
            $estudiante_id = $this->Estudiante_model->add_estudiante($params);
            redirect('estudiante/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$this->load->model('Genero_model');
			$data['all_genero'] = $this->Genero_model->get_all_genero();

			$this->load->model('Estado_civil_model');
			$data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();
            
            $data['_view'] = 'estudiante/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estudiante
     */
    function edit($estudiante_id)
    {   
        // check if the estudiante exists before trying to edit it
        $data['estudiante'] = $this->Estudiante_model->get_estudiante($estudiante_id);
        
        if(isset($data['estudiante']['estudiante_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('estudiante_nombre','Estudiante Nombre','required');
			$this->form_validation->set_rules('estudiante_apellidos','Estudiante Apellidos','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'genero_id' => $this->input->post('genero_id'),
					'estadocivil_id' => $this->input->post('estadocivil_id'),
					'estudiante_nombre' => $this->input->post('estudiante_nombre'),
					'estudiante_apellidos' => $this->input->post('estudiante_apellidos'),
					'estudiante_fechanac' => $this->input->post('estudiante_fechanac'),
					'estudiante_edad' => $this->input->post('estudiante_edad'),
					'estudiante_ci' => $this->input->post('estudiante_ci'),
					'estudiante_extci' => $this->input->post('estudiante_extci'),
					'estudiante_direccion' => $this->input->post('estudiante_direccion'),
					'estudiante_telefono' => $this->input->post('estudiante_telefono'),
					'estudiante_celular' => $this->input->post('estudiante_celular'),
					'estudiante_foto' => $this->input->post('estudiante_foto'),
					'estudiante_lugarnac' => $this->input->post('estudiante_lugarnac'),
					'estudiante_nacionalidad' => $this->input->post('estudiante_nacionalidad'),
					'estudiante_establecimiento' => $this->input->post('estudiante_establecimiento'),
					'estudiante_distrito' => $this->input->post('estudiante_distrito'),
					'estudiante_apoderado' => $this->input->post('estudiante_apoderado'),
					'apoderado_foto' => $this->input->post('apoderado_foto'),
					'estudiante_apodireccion' => $this->input->post('estudiante_apodireccion'),
					'estudiante_apoparentesco' => $this->input->post('estudiante_apoparentesco'),
					'estudiante_apotelefono' => $this->input->post('estudiante_apotelefono'),
					'estudiante_nit' => $this->input->post('estudiante_nit'),
					'estudiante_razon' => $this->input->post('estudiante_razon'),
                );

                $this->Estudiante_model->update_estudiante($estudiante_id,$params);            
                redirect('estudiante/index');
            }
            else
            {
				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

				$this->load->model('Genero_model');
				$data['all_genero'] = $this->Genero_model->get_all_genero();

				$this->load->model('Estado_civil_model');
				$data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                $data['_view'] = 'estudiante/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The estudiante you are trying to edit does not exist.');
    } 

    /*
     * Deleting estudiante
     */
    function remove($estudiante_id)
    {
        $estudiante = $this->Estudiante_model->get_estudiante($estudiante_id);

        // check if the estudiante exists before trying to delete it
        if(isset($estudiante['estudiante_id']))
        {
            $this->Estudiante_model->delete_estudiante($estudiante_id);
            redirect('estudiante/index');
        }
        else
            show_error('The estudiante you are trying to delete does not exist.');
    }
    
}