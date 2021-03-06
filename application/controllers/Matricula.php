<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Matricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Matricula_model');
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
     * Listing of matricula
     */
    function index()
    {
        // es el rol de Inscripcion.......
        if($this->acceso(1)){
            $data['matricula'] = $this->Matricula_model->get_all_matricula();

            $data['_view'] = 'matricula/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new matricula
     */
    function add()
    {
        if($this->acceso(1)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'inscripcion_id' => $this->input->post('inscripcion_id'),
                    'matricula_fechapago' => $this->input->post('matricula_fechapago'),
                    'matricula_horapago' => $this->input->post('matricula_horapago'),
                    'matricula_fechalimite' => $this->input->post('matricula_fechalimite'),
                    'matricula_monto' => $this->input->post('matricula_monto'),
                    'matricula_descuento' => $this->input->post('matricula_descuento'),
                    'matricula_total' => $this->input->post('matricula_total'),
                );

                $matricula_id = $this->Matricula_model->add_matricula($params);
                redirect('matricula/index');
            }
            else
            {
                $this->load->model('Inscripcion_model');
                $data['all_inscripcion'] = $this->Inscripcion_model->get_all_inscripcion();

                $data['_view'] = 'matricula/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a matricula
     */
    function edit($matricula_id)
    {
        if($this->acceso(1)){
            // check if the matricula exists before trying to edit it
            $data['matricula'] = $this->Matricula_model->get_matricula($matricula_id);

            if(isset($data['matricula']['matricula_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'inscripcion_id' => $this->input->post('inscripcion_id'),
                        'matricula_fechapago' => $this->input->post('matricula_fechapago'),
                        'matricula_horapago' => $this->input->post('matricula_horapago'),
                        'matricula_fechalimite' => $this->input->post('matricula_fechalimite'),
                        'matricula_monto' => $this->input->post('matricula_monto'),
                        'matricula_descuento' => $this->input->post('matricula_descuento'),
                        'matricula_total' => $this->input->post('matricula_total'),
                    );

                    $this->Matricula_model->update_matricula($matricula_id,$params);            
                    redirect('matricula/index');
                }
                else
                {
                    $this->load->model('Inscripcion_model');
                    $data['all_inscripcion'] = $this->Inscripcion_model->get_all_inscripcion();

                    $data['_view'] = 'matricula/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The matricula you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting matricula
     */
    function remove($matricula_id)
    {
        if($this->acceso(1)){
            $matricula = $this->Matricula_model->get_matricula($matricula_id);
            // check if the matricula exists before trying to delete it
            if(isset($matricula['matricula_id']))
            {
                $this->Matricula_model->delete_matricula($matricula_id);
                redirect('matricula/index');
            }
            else
                show_error('The matricula you are trying to delete does not exist.');
        }
    }
    
}
