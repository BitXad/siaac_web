<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Inscripcion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Inscripcion_model');
    } 

    /*
     * Listing of inscripcion
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('inscripcion/index?');
        $config['total_rows'] = $this->Inscripcion_model->get_all_inscripcion_count();
        $this->pagination->initialize($config);

        $data['inscripcion'] = $this->Inscripcion_model->get_all_inscripcion($params);
        
        $data['_view'] = 'inscripcion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new inscripcion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'usuario_id' => $this->input->post('usuario_id'),
				'gestion_id' => $this->input->post('gestion_id'),
				'estudiante_id' => $this->input->post('estudiante_id'),
				'paralelo_id' => $this->input->post('paralelo_id'),
				'nivel_id' => $this->input->post('nivel_id'),
				'turno_id' => $this->input->post('turno_id'),
				'inscripcion_fecha' => $this->input->post('inscripcion_fecha'),
				'inscripcion_hora' => $this->input->post('inscripcion_hora'),
				'inscripcion_fechainicio' => $this->input->post('inscripcion_fechainicio'),
            );
            
            $inscripcion_id = $this->Inscripcion_model->add_inscripcion($params);
            redirect('inscripcion/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Gestion_model');
			$data['all_gestion'] = $this->Gestion_model->get_all_gestion();

			$this->load->model('Estudiante_model');
			$data['all_estudiante'] = $this->Estudiante_model->get_all_estudiante();

			$this->load->model('Paralelo_model');
			$data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

			$this->load->model('Nivel_model');
			$data['all_nivel'] = $this->Nivel_model->get_all_nivel();

			$this->load->model('Turno_model');
			$data['all_turno'] = $this->Turno_model->get_all_turno();
            
            $data['_view'] = 'inscripcion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a inscripcion
     */
    function edit($inscripcion_id)
    {   
        // check if the inscripcion exists before trying to edit it
        $data['inscripcion'] = $this->Inscripcion_model->get_inscripcion($inscripcion_id);
        
        if(isset($data['inscripcion']['inscripcion_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'usuario_id' => $this->input->post('usuario_id'),
					'gestion_id' => $this->input->post('gestion_id'),
					'estudiante_id' => $this->input->post('estudiante_id'),
					'paralelo_id' => $this->input->post('paralelo_id'),
					'nivel_id' => $this->input->post('nivel_id'),
					'turno_id' => $this->input->post('turno_id'),
					'inscripcion_fecha' => $this->input->post('inscripcion_fecha'),
					'inscripcion_hora' => $this->input->post('inscripcion_hora'),
					'inscripcion_fechainicio' => $this->input->post('inscripcion_fechainicio'),
                );

                $this->Inscripcion_model->update_inscripcion($inscripcion_id,$params);            
                redirect('inscripcion/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Gestion_model');
				$data['all_gestion'] = $this->Gestion_model->get_all_gestion();

				$this->load->model('Estudiante_model');
				$data['all_estudiante'] = $this->Estudiante_model->get_all_estudiante();

				$this->load->model('Paralelo_model');
				$data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

				$this->load->model('Nivel_model');
				$data['all_nivel'] = $this->Nivel_model->get_all_nivel();

				$this->load->model('Turno_model');
				$data['all_turno'] = $this->Turno_model->get_all_turno();

                $data['_view'] = 'inscripcion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The inscripcion you are trying to edit does not exist.');
    } 

    /*
     * Deleting inscripcion
     */
    function remove($inscripcion_id)
    {
        $inscripcion = $this->Inscripcion_model->get_inscripcion($inscripcion_id);

        // check if the inscripcion exists before trying to delete it
        if(isset($inscripcion['inscripcion_id']))
        {
            $this->Inscripcion_model->delete_inscripcion($inscripcion_id);
            redirect('inscripcion/index');
        }
        else
            show_error('The inscripcion you are trying to delete does not exist.');
    }
    
}
