<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Genero extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Genero_model');
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
     * Listing of genero
     */
    function index()
    {
        if($this->acceso(100)){
            $data['genero'] = $this->Genero_model->get_all_genero();
            $data['_view'] = 'genero/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new genero
     */
    function add()
    {
        if($this->acceso(101)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('genero_nombre','Genero Nombre','required');
            if($this->form_validation->run())
            {   
                $params = array(
                    'genero_nombre' => $this->input->post('genero_nombre'),
                );
                $genero_id = $this->Genero_model->add_genero($params);
                redirect('genero/index');
            }
            else
            {            
                $data['_view'] = 'genero/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a genero
     */
    function edit($genero_id)
    {
        if($this->acceso(102)){
            // check if the genero exists before trying to edit it
            $data['genero'] = $this->Genero_model->get_genero($genero_id);
            if(isset($data['genero']['genero_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('genero_nombre','Genero Nombre','required');
                if($this->form_validation->run())
                {   
                    $params = array(
                        'genero_nombre' => $this->input->post('genero_nombre'),
                    );
                    $this->Genero_model->update_genero($genero_id,$params);            
                    redirect('genero/index');
                }
                else
                {
                    $data['_view'] = 'genero/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The genero you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting genero
     */
    function remove($genero_id)
    {
        if($this->acceso(100)){
            $genero = $this->Genero_model->get_genero($genero_id);
            // check if the genero exists before trying to delete it
            if(isset($genero['genero_id']))
            {
                $this->Genero_model->delete_genero($genero_id);
                redirect('genero/index');
            }
            else
                show_error('The genero you are trying to delete does not exist.');
        }
    }
    
}
