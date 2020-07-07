<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Horario extends CI_Controller{

    var $session_data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Horario_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->session_data = $this->session->userdata('logged_in');
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
     * Listing of horario
     */
    function index()
    {
        if($this->acceso(41)){
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('horario/index?');
            $config['total_rows'] = $this->Horario_model->get_all_horario_count();
            $this->pagination->initialize($config);

            $data['horario'] = $this->Horario_model->get_all_horarios($params);

            $data['_view'] = 'horario/index';
            $this->load->view('layouts/main',$data);
        }
    }


    public function nuevo()
    {
        if($this->acceso(41)){
        $this->load->model('Estado_model');
        $data['all_estado'] = $this->Estado_model->get_all_estado();

        $this->load->model('Periodo_model');
        $data['all_periodo'] = $this->Periodo_model->get_all_periodo();

        $data['_view'] = 'horario/add';
        $this->load->view('layouts/main',$data);
        }
    }


    /*
     * Adding a new horario
     */
    function add()
    {
        if($this->acceso(41)){
            $params = array(
                'estado_id' => $this->input->post('estado_id'),
                'periodo_id' => $this->input->post('periodo_id'),
                'horario_desde' => $this->input->post('horario_desde'),
                'horario_hasta' => $this->input->post('horario_hasta'),
            );

            $horario_id = $this->Horario_model->add_horario($params);

            if($horario_id>0){
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center fade in" style="margin-top:18px;">
                         <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>
                         Horario Registrado con <strong>Exito!</strong>
                     </div>');
                redirect('horario');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error.  Intente mas tarde!!!</div>');
                redirect('horario');
            }
        }
    }

    public function editar($horario_id)
    {
        if($this->acceso(41)){
            $data['horario'] = $this->Horario_model->get_horario2($horario_id);
            if(isset($data['horario']))
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Periodo_model');
                $data['all_periodo'] = $this->Periodo_model->get_all_periodo();

                $data['_view'] = 'horario/edit';
                $this->load->view('layouts/main',$data);
            } else
                { show_error('El horario no existe.'); }
        }
    }

    /*
     * Editing a horario
     */
    function set()
    {
        if($this->acceso(41)){
            $horario_id = $this->input->post('horario_id');
            $params = array(
                'estado_id' => $this->input->post('estado_id'),
                'periodo_id' => $this->input->post('periodo_id'),
                'horario_desde' => $this->input->post('horario_desde'),
                'horario_hasta' => $this->input->post('horario_hasta'),
            );
            $this->Horario_model->update_horario($horario_id,$params);
            $this->session->set_flashdata('msg',
                '<div class="alert alert-success text-center fade in" style="margin-top:18px;">
                         <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>
                         Horario Actualizado con <strong>Exito!</strong>
                     </div>');
            redirect('horario');
        }
    } 

    /*
     * Deleting horario
     */
    function remove($horario_id)
    {
        if($this->acceso(41)){
            $horario = $this->Horario_model->get_horario($horario_id);
            // check if the horario exists before trying to delete it
            if(isset($horario['horario_id']))
            {
                $this->Horario_model->delete_horario($horario_id);
                redirect('horario/index');
            }
            else
                show_error('The horario you are trying to delete does not exist.');
        }
    }
}
