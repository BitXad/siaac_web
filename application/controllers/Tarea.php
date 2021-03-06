<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tarea extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tarea_model');
        $this->load->model('Respuesta_model');
        $this->load->model('Material_model');
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
    * Listar todas las tareas
    */
    function index($materia_id){
        $docente_id = $this->session_data['usuario_id'];
        $data['tareas'] = $this->Tarea_model->get_all_tareas($docente_id, $materia_id);
        $data['materia'] = $materia_id;
        $data['_view'] = 'tarea/index';
        $this->load->view('layouts/main',$data);
    }

    /*
    * Añadir tarea
    */
    function add($materia_id){
        // if($this->acceso(66)){
            $docente_id = $this->session_data['usuario_id'];
            if(isset($_POST) && count($_POST) > 0){   
                $params = array(
                    'tarea_titulo' => $this->input->post('tarea_titulo'),
                    'tarea_descripcion' => $this->input->post('tarea_descripcion'),
                    'tarea_enlace' => $this->input->post('tarea_enlace'),
                    'tarea_fecha_realizacion' => date('Y-m-d H:i:s'),
                    'tarea_fecha_entrega' => $this->input->post('tarea_fecha_entrega'),
                    'materia_id' => $materia_id,
                    'docente_id' => $docente_id,
                    'grupo_id' => $this->input->post('grupo_id'),
                    'gestion_id' => $this->input->post('gestion_id'),
                    'estado_id' => $this->input->post('estado_id'),
                );

                $tarea_id = $this->Tarea_model->add_tarea($params);
                redirect('tarea/index/'.$materia_id);
            }else{
                $data['estados'] = $this->Material_model->get_estado();
                $data['materia'] = $materia_id;
                $data['_view'] = 'tarea/add';
                $this->load->view('layouts/main',$data);
            }
        // }
    }

    function edit($tarea_id){
        // if($this->acceso(67)){
            // check if the tarea exists before trying to edit it
            $data['tarea'] = $this->Tarea_model->get_tarea($tarea_id);

            if(isset($data['tarea']['tarea_id'])){
                if(isset($_POST) && count($_POST) > 0){   
                    $params = array(
                        'tarea_titulo' => $this->input->post('tarea_titulo'),
                        'tarea_descripcion' => $this->input->post('tarea_descripcion'),
                        'tarea_enlace' => $this->input->post('tarea_enlace'),
                        // 'tarea_fecha_realizacion' => date('Y-m-d H:i:s'),
                        'tarea_fecha_entrega' => $this->input->post('tarea_fecha_entrega'),
                        // 'materia_id' => $materia_id,
                        // 'docente_id' => $docente_id,
                        'grupo_id' => $this->input->post('grupo_id'),
                        'gestion_id' => $this->input->post('gestion_id'),
                        'estado_id' => $this->input->post('estado_id'),
                    );

                    $this->Tarea_model->update_tarea($tarea_id,$params);            
                    redirect('tarea/index/'.$data['tarea']['materia_id']);
                }else{
                    $data['estados'] = $this->Material_model->get_estado();
                    $data['_view'] = 'tarea/edit';
                    $this->load->view('layouts/main',$data);
                }
            }else
                show_error('The tarea you are trying to edit does not exist.');
        // }
    }

    function tarea_entregadas($tarea_id){
        $docente_id = $this->session_data['usuario_id'];
        $data['tareas'] = $this->Respuesta_model->get_respuestas($tarea_id);
        $data['_view'] = 'tarea/tarea_entregadas';
        $this->load->view('layouts/main',$data);
    }
}