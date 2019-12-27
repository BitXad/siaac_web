<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rol_usuario extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rol_usuario_model');
        $this->load->model('Rol_model');
        $this->load->model('Tipo_usuario_model');
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
     * Listing of rol_usuario
     */
    function index()
    {
        if($this->acceso(69)){
            $this->load->model('Rol_model');
            $rol['all_rol'] = $this->Rol_model->get_all_rol();    
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipousuario_id', 'Tipo', 'required|callback_check_user');// call callback function
            $this->form_validation->set_rules('rol_id', 'Rol', 'required');
            $this->form_validation->set_message('check_user', 'Este usuario no existe o ya tiene el rol.');

            if($this->form_validation->run())    
            {   
                $tipousuario_id = $this->input->post('tipousuario_id');// get tipo de usuario
                $rol_id = $this->input->post('rol_id');// get rol
                $params = array(
                    'tipousuario_id' => $this->input->post('tipousuario_id'),
                    'rol_id' => $this->input->post('rol_id'),
                );


               $sql = "INSERT INTO rol_usuario (tipousuario_id, rol_id) (SELECT ".$tipousuario_id.", rol_id FROM rol WHERE NOT  rol_id IN (SELECT rol_id FROM rol_usuario WHERE tipousuario_id=".$tipousuario_id." AND rol_id=".$rol_id.")AND rol_idfk=".$rol_id.")";
                $this->db->query($sql);


                $rol_usuario_id = $this->Rol_usuario_model->add_rol_usuario($params);
                redirect('rol_usuario/index');

            }
            else
            {   

                $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();
                $this->load->model('Rol_model');
                $data['all_rol'] = $this->Rol_model->get_all_rol();     
                $data['rol_usuario'] = $this->Rol_usuario_model->get_all_rol_usuario(); 
                $data['page_title'] = "Rol Usuario";   
                $data['_view'] = 'rol_usuario/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  
    

    /*
     * Adding a new rol_usuario
     */
    function add()
    {
        if($this->acceso(69)){
            $this->load->model('Rol_model');
            $rol['all_rol'] = $this->Rol_model->get_all_rol();    
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipousuario_id', 'Tipo', 'required|callback_check_user');// call callback function
            $this->form_validation->set_rules('rol_id', 'Rol', 'required');
            $this->form_validation->set_message('check_user', 'Este usuario no existe o ya tiene el rol.');

            if($this->form_validation->run())    
            {   
                $tipousuario_id = $this->input->post('tipousuario_id');// get tipo de usuario
                $rol_id = $this->input->post('rol_id');// get rol
                $params = array(
                    'tipousuario_id' => $this->input->post('tipousuario_id'),
                    'rol_id' => $this->input->post('rol_id'),
                );


               $sql = "INSERT INTO rol_usuario (tipousuario_id, rol_id) (SELECT ".$tipousuario_id.", rol_id FROM rol WHERE NOT  rol_id IN (SELECT rol_id FROM rol_usuario WHERE tipousuario_id=".$tipousuario_id." AND rol_id=".$rol_id.")AND rol_idfk=".$rol_id.")";
                $this->db->query($sql);


                $rol_usuario_id = $this->Rol_usuario_model->add_rol_usuario($params);
                redirect('rol_usuario/index');

            }
            else
            {   

                $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();
                $this->load->model('Rol_model');
                $data['all_rol'] = $this->Rol_model->get_all_rol();     
                $data['rol_usuario'] = $this->Rol_usuario_model->get_all_rol_usuario();
                $data['page_title'] = "Rol Usuario";    
                $data['_view'] = 'rol_usuario/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    function check_user() {
        $tipousuario_id = $this->input->post('tipousuario_id');// get tipo de usuario
        $rol_id = $this->input->post('rol_id');// get rol
        $this->db->select('id_rol_usuario');
        $this->db->from('rol_usuario');
        $this->db->where('tipousuario_id', $tipousuario_id);
        $this->db->where('rol_id', $rol_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * Editing a rol_usuario
     */
    function edit($id_rol_usuario)
    {
        if($this->acceso(69)){
            // check if the rol_usuario exists before trying to edit it
            $data['rol_usuario'] = $this->Rol_usuario_model->get_rol_usuario($id_rol_usuario);

            if(isset($data['rol_usuario']['id_rol_usuario']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'tipousuario_id' => $this->input->post('tipousuario_id'),
                        'rol_id' => $this->input->post('rol_id'),
                    );

                    $this->Rol_usuario_model->update_rol_usuario($id_rol_usuario,$params);            
                    redirect('rol_usuario/index');
                }
                else
                {
                     $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();
                $this->load->model('Rol_model');
                $data['all_rol'] = $this->Rol_model->get_all_rol();
                $data['page_title'] = "Rol Usuario";
                    $data['_view'] = 'rol_usuario/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The rol_usuario you are trying to edit does not exist.');
        }
    }
    
}
