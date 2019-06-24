<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grupo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grupo_model');
    } 

    /*
     * Listing of grupo
     */
    function index()
    {
        $this->load->model('Carrera_model');
        $data['all_carrera'] = $this->Carrera_model->get_all_carreras();
        
        $this->load->model('Paralelo_model');
        $data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();
        
        $this->load->model('Docente_model');
        $data['all_docente'] = $this->Docente_model->get_all_docente_activo();
        
        $data['grupo'] = $this->Grupo_model->get_all_grupo();
        
        $data['_view'] = 'grupo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new grupo
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'horario_id' => $this->input->post('horario_id'),
				'docente_id' => $this->input->post('docente_id'),
				'gestion_id' => $this->input->post('gestion_id'),
				'usuario_id' => $this->input->post('usuario_id'),
				'aula_id' => $this->input->post('aula_id'),
				'materia_id' => $this->input->post('materia_id'),
				'grupo_nombre' => $this->input->post('grupo_nombre'),
				'grupo_descripcion' => $this->input->post('grupo_descripcion'),
				'grupo_horanicio' => $this->input->post('grupo_horanicio'),
				'grupo_horafin' => $this->input->post('grupo_horafin'),
            );
            
            $grupo_id = $this->Grupo_model->add_grupo($params);
            redirect('grupo/index');
        }
        else
        {
			$this->load->model('Horario_model');
			$data['all_horario'] = $this->Horario_model->get_all_horario();

			$this->load->model('Docente_model');
			$data['all_docente'] = $this->Docente_model->get_all_docente();

			$this->load->model('Gestion_model');
			$data['all_gestion'] = $this->Gestion_model->get_all_gestion();

			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Aula_model');
			$data['all_aula'] = $this->Aula_model->get_all_aula();

			$this->load->model('Materia_model');
			$data['all_materia'] = $this->Materia_model->get_all_materia();
            
            $data['_view'] = 'grupo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a grupo
     */
    function edit($grupo_id)
    {   
        // check if the grupo exists before trying to edit it
        $data['grupo'] = $this->Grupo_model->get_grupo($grupo_id);
        
        if(isset($data['grupo']['grupo_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'horario_id' => $this->input->post('horario_id'),
					'docente_id' => $this->input->post('docente_id'),
					'gestion_id' => $this->input->post('gestion_id'),
					'usuario_id' => $this->input->post('usuario_id'),
					'aula_id' => $this->input->post('aula_id'),
					'materia_id' => $this->input->post('materia_id'),
					'grupo_nombre' => $this->input->post('grupo_nombre'),
					'grupo_descripcion' => $this->input->post('grupo_descripcion'),
					'grupo_horanicio' => $this->input->post('grupo_horanicio'),
					'grupo_horafin' => $this->input->post('grupo_horafin'),
                );

                $this->Grupo_model->update_grupo($grupo_id,$params);            
                redirect('grupo/index');
            }
            else
            {
				$this->load->model('Horario_model');
				$data['all_horario'] = $this->Horario_model->get_all_horario();

				$this->load->model('Docente_model');
				$data['all_docente'] = $this->Docente_model->get_all_docente();

				$this->load->model('Gestion_model');
				$data['all_gestion'] = $this->Gestion_model->get_all_gestion();

				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Aula_model');
				$data['all_aula'] = $this->Aula_model->get_all_aula();

				$this->load->model('Materia_model');
				$data['all_materia'] = $this->Materia_model->get_all_materia();

                $data['_view'] = 'grupo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The grupo you are trying to edit does not exist.');
    } 

    /*
     * Deleting grupo
     */
    function remove($grupo_id)
    {
        $grupo = $this->Grupo_model->get_grupo($grupo_id);

        // check if the grupo exists before trying to delete it
        if(isset($grupo['grupo_id']))
        {
            $this->Grupo_model->delete_grupo($grupo_id);
            redirect('grupo/index');
        }
        else
            show_error('The grupo you are trying to delete does not exist.');
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
    
}
