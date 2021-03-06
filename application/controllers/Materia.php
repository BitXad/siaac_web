<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Materia extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Materia_model');
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
     * Listing of materia
     */
    function index()
    {
        if($this->acceso(65)){
            $data['materia'] = $this->Materia_model->get_all_materia();

            $data['_view'] = 'materia/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new materia
     */
    function add()
    {
        if($this->acceso(66)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'area_id' => $this->input->post('area_id'),
                    'nivel_id' => $this->input->post('nivel_id'),
                    'mat_materia_id' => $this->input->post('mat_materia_id'),
                    'estado_id' => 1,
                    'materia_nombre' => $this->input->post('materia_nombre'),
                    'materia_alias' => $this->input->post('materia_alias'),
                    'materia_codigo' => $this->input->post('materia_codigo'),
                    'materia_estapa1' => $this->input->post('materia_estapa1'),
                    'materia_estapa2' => $this->input->post('materia_estapa2'),
                    'materia_estapa3' => $this->input->post('materia_estapa3'),
                    'materia_estapa4' => $this->input->post('materia_estapa4'),
                    'materia_numareas' => $this->input->post('materia_numareas'),
                    'materia_notainstancia' => $this->input->post('materia_notainstancia'),
                    'materia_notaaprobado' => $this->input->post('materia_notaaprobado'),
                    'materia_maxima' => $this->input->post('materia_maxima'),
                    'materia_horas' => $this->input->post('materia_horas'),
                    'materia_calificacion1' => $this->input->post('materia_calificacion1'),
                    'materia_ponderado1' => $this->input->post('materia_ponderado1'),
                    'materia_calificacion2' => $this->input->post('materia_calificacion2'),
                    'materia_ponderado2' => $this->input->post('materia_ponderado2'),
                    'materia_calificacion3' => $this->input->post('materia_calificacion3'),
                    'materia_ponderado3' => $this->input->post('materia_ponderado3'),
                    'materia_calificacion4' => $this->input->post('materia_calificacion4'),
                    'materia_ponderado4' => $this->input->post('materia_ponderado4'),
                    'materia_ponderado5' => $this->input->post('materia_ponderado5'),
                    'materia_calificacion5' => $this->input->post('materia_calificacion5'),
                    'materia_calificacion6' => $this->input->post('materia_calificacion6'),
                    'materia_ponderado6' => $this->input->post('materia_ponderado6'),
                    'materia_calificacion7' => $this->input->post('materia_calificacion7'),
                    'materia_ponderado7' => $this->input->post('materia_ponderado7'),
                );

                $materia_id = $this->Materia_model->add_materia($params);
                redirect('materia/index');
            }
            else
            {
                $this->load->model('Area_materium_model');
                $data['all_area_materia'] = $this->Area_materium_model->get_all_area_materia();

                $this->load->model('Nivel_model');
                $data['all_nivel'] = $this->Nivel_model->get_all_nivel();
                $data['all_materia'] = $this->Materia_model->get_all_materia();

                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'materia/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a materia
     */
    function edit($materia_id)
    {
        if($this->acceso(67)){
            // check if the materia exists before trying to edit it
            $data['materia'] = $this->Materia_model->get_materia($materia_id);

            if(isset($data['materia']['materia_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'area_id' => $this->input->post('area_id'),
                        'nivel_id' => $this->input->post('nivel_id'),
                        'mat_materia_id' => $this->input->post('mat_materia_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'materia_nombre' => $this->input->post('materia_nombre'),
                        'materia_alias' => $this->input->post('materia_alias'),
                        'materia_codigo' => $this->input->post('materia_codigo'),
                        'materia_estapa1' => $this->input->post('materia_estapa1'),
                        'materia_estapa2' => $this->input->post('materia_estapa2'),
                        'materia_estapa3' => $this->input->post('materia_estapa3'),
                        'materia_estapa4' => $this->input->post('materia_estapa4'),
                        'materia_numareas' => $this->input->post('materia_numareas'),
                        'materia_notainstancia' => $this->input->post('materia_notainstancia'),
                        'materia_notaaprobado' => $this->input->post('materia_notaaprobado'),
                        'materia_maxima' => $this->input->post('materia_maxima'),
                        'materia_horas' => $this->input->post('materia_horas'),
                        'materia_calificacion1' => $this->input->post('materia_calificacion1'),
                        'materia_ponderado1' => $this->input->post('materia_ponderado1'),
                        'materia_calificacion2' => $this->input->post('materia_calificacion2'),
                        'materia_ponderado2' => $this->input->post('materia_ponderado2'),
                        'materia_calificacion3' => $this->input->post('materia_calificacion3'),
                        'materia_ponderado3' => $this->input->post('materia_ponderado3'),
                        'materia_calificacion4' => $this->input->post('materia_calificacion4'),
                        'materia_ponderado4' => $this->input->post('materia_ponderado4'),
                        'materia_ponderado5' => $this->input->post('materia_ponderado5'),
                        'materia_calificacion5' => $this->input->post('materia_calificacion5'),
                        'materia_calificacion6' => $this->input->post('materia_calificacion6'),
                        'materia_ponderado6' => $this->input->post('materia_ponderado6'),
                        'materia_calificacion7' => $this->input->post('materia_calificacion7'),
                        'materia_ponderado7' => $this->input->post('materia_ponderado7'),
                    );

                    $this->Materia_model->update_materia($materia_id,$params);            
                    redirect('materia/index');
                }
                else
                {
                    $this->load->model('Area_materium_model');
                    $data['all_area_materia'] = $this->Area_materium_model->get_all_area_materia();

                    $this->load->model('Nivel_model');
                    $data['all_nivel'] = $this->Nivel_model->get_all_nivel();
                    $data['all_materia'] = $this->Materia_model->get_all_materia();

                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $data['_view'] = 'materia/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The materia you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting materia
     */
    function remove($materia_id)
    {
        if($this->acceso(65)){
            $materia = $this->Materia_model->get_materia($materia_id);
            // check if the materia exists before trying to delete it
            if(isset($materia['materia_id']))
            {
                $this->Materia_model->delete_materia($materia_id);
                redirect('materia/index');
            }
            else
                show_error('The materia you are trying to delete does not exist.');
        }
    }
    
}
