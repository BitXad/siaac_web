<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gestion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gestion_model');
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
     * Listing of gestion
     */
    function index()
    {
        if($this->acceso(21)){
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('gestion/index?');
            $config['total_rows'] = $this->Gestion_model->get_all_gestion_count();
            $this->pagination->initialize($config);

            $data['gestion'] = $this->Gestion_model->get_all_gestion($params);

            $data['_view'] = 'gestion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new gestion
     */
    function add()
    {
        if($this->acceso(21)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'estado_id' => 1,
                    'gestion_semestre' => $this->input->post('gestion_semestre'),
                    'gestion_inicio' => $this->input->post('gestion_inicio'),
                    'gestion_fin' => $this->input->post('gestion_fin'),
                    'gestion_descripcion' => $this->input->post('gestion_descripcion'),
                );

                $gestion_id = $this->Gestion_model->add_gestion($params);
                redirect('gestion/index');
            }
            else
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();
                
                $data['_view'] = 'gestion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a gestion
     */
    function edit($gestion_id)
    {
        if($this->acceso(21)){
            // check if the gestion exists before trying to edit it
            $data['gestion'] = $this->Gestion_model->get_gestion($gestion_id);

            if(isset($data['gestion']['gestion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'estado_id' => $this->input->post('estado_id'),
                        'gestion_semestre' => $this->input->post('gestion_semestre'),
                        'gestion_inicio' => $this->input->post('gestion_inicio'),
                        'gestion_fin' => $this->input->post('gestion_fin'),					
                        'gestion_descripcion' => $this->input->post('gestion_descripcion'),
                    );

                    $this->Gestion_model->update_gestion($gestion_id,$params);            
                    redirect('gestion/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $data['_view'] = 'gestion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The gestion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting gestion
     */
    function remove($gestion_id)
    {
        if($this->acceso(21)){
            $gestion = $this->Gestion_model->get_gestion($gestion_id);

            // check if the gestion exists before trying to delete it
            if(isset($gestion['gestion_id']))
            {
                $this->Gestion_model->delete_gestion($gestion_id);
                redirect('gestion/index');
            }
            else
                show_error('The gestion you are trying to delete does not exist.');
        }
    }
    
}
