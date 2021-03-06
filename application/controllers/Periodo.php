<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Periodo extends CI_Controller {

    var $session_data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Periodo_model');
        $this->load->library('form_validation');
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
     * Listing of periodo
     */
    function index()
    {
        if($this->acceso(109)){
            $data['periodo'] = $this->Periodo_model->get_all_periodo();
            $data['_view'] = 'periodo/index';
            $this->load->view('layouts/main',$data);
        }
    }
    
    function mostrar_periodos()
    {
            $res = $this->Periodo_model->get_all_periodo();            
            echo json_encode($res);
    }

    
    public function nuevo()
    {
        if($this->acceso(110)){
            $data['_view'] = 'periodo/add';
            $this->load->view('layouts/main',$data);
        }

    }

    /*
     * Adding a new periodo
     */
    function add()
    {
        if($this->acceso(110)){
            $this->form_validation->set_rules('periodo_nombre','Periodo Nombre','required');
            $this->form_validation->set_rules('periodo_horainicio','Periodo Horainicio','required');
            $this->form_validation->set_rules('periodo_horafin','Periodo Horafin','required');
		
            if($this->form_validation->run())     
            {   
                $params = array(
                    'periodo_nombre' => $this->input->post('periodo_nombre'),
                    'periodo_horainicio' => $this->input->post('periodo_horainicio'),
                    'periodo_horafin' => $this->input->post('periodo_horafin'),
                );
                $periodo_id = $this->Periodo_model->add_periodo($params);
                if($periodo_id>0){
                    $this->session->set_flashdata('msg',
                        '<div class="alert alert-success text-center fade in" style="margin-top:18px;">
                         <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>
                         Periodo Registrado con <strong>Exito!</strong>
                     </div>');
                    redirect('periodo/index');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error.  Intente mas tarde!!!</div>');
                    redirect('periodo/index');
                }
            }else {
                $data['_view'] = 'periodo/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }


    public function editar($periodo_id)
    {
        if($this->acceso(111)){
            $data['periodo'] = $this->Periodo_model->get_periodo($periodo_id);
            $data['_view'] = 'periodo/edit';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a periodo
     */
    function set()
    {
        if($this->acceso(111)){
            $periodo_id = $this->input->post('periodo_id');
            $data['periodo'] = $this->Periodo_model->get_periodo($periodo_id);

            if(isset($data['periodo']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('periodo_nombre','Periodo Nombre','required');
                $this->form_validation->set_rules('periodo_horainicio','Periodo Horainicio','required');
                $this->form_validation->set_rules('periodo_horafin','Periodo Horafin','required');

                if($this->form_validation->run())     
                {   
                    $params = array(
                        'periodo_nombre' => $this->input->post('periodo_nombre'),
                        'periodo_horainicio' => $this->input->post('periodo_horainicio'),
                        'periodo_horafin' => $this->input->post('periodo_horafin')
                    );
                    //print "<pre>"; print_r( $params); print "</pre>";
                    $this->Periodo_model->update_periodo($periodo_id,$params);

                    $this->session->set_flashdata('msg',
                        '<div class="alert alert-success text-center fade in" style="margin-top:18px;">
                         <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>
                         Periodo Actualizado con <strong>Exito!</strong>
                     </div>');
                    redirect('periodo/index');
                }
                else
                {
                    $data['_view'] = 'periodo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The periodo you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting periodo
     */
    function remove($periodo_id)
    {
        if($this->acceso(109)){
            $periodo = $this->Periodo_model->get_periodo($periodo_id);
            // check if the periodo exists before trying to delete it
            if(isset($periodo['periodo_id']))
            {
                $this->Periodo_model->delete_periodo($periodo_id);
                redirect('periodo/index');
            }
            else
                show_error('The periodo you are trying to delete does not exist.');
        }
    }
}
