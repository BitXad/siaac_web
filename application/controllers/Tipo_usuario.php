<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_usuario extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
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
     * Listing of tipo_usuario
     */
    function index()
    {
        //if($this->acceso(21)){
            $data['tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();

            $data['_view'] = 'tipo_usuario/index';
            $this->load->view('layouts/main',$data);
        //}
    }

    /*
     * Adding a new tipo_usuario
     */
    function add()
    {
        //if($this->acceso(21)){
            if(isset($_POST) && count($_POST) > 0)     
            {
                $this->load->model('Rol_usuario_model');
                $cont_rol = $this->input->post('cont_rol');
                $params = array(
                        'tipousuario_descripcion' => $this->input->post('tipousuario_descripcion'),
                );
                $tipo_usuario_id = $this->Tipo_usuario_model->add_tipo_usuario($params);
                for ($i = 0; $i < $cont_rol; $i++) {
                    $estoscheck = $this->input->post('rol'.$i);
                    $rol_id = $this->input->post('rolid'.$i);
                    if($estoscheck == 1){
                        $rolusuario_asignado = 1;
                    }else{
                        $rolusuario_asignado = 0;
                    }
                    $param = array(
                            'tipousuario_id' => $tipo_usuario_id,
                            'rol_id' => $rol_id,
                            'rolusuario_asignado' => $rolusuario_asignado,
                    );
                    $rol_usuario_id = $this->Rol_usuario_model->add_rol_usuario($param);
                }
                redirect('tipo_usuario');
            }
            else
            {
                $this->load->model('Rol_model');
                $data['all_rolpadre'] = $this->Rol_model->get_allrol_padre();
                $data['all_rolhijo'] = $this->Rol_model->get_allrol_hijo();

                $data['_view'] = 'tipo_usuario/add';
                $this->load->view('layouts/main',$data);
            }
        //}
    }  

    /*
     * Editing a tipo_usuario
     */
    function edit($tipousuario_id)
    {
        //if($this->acceso(21)){
            // check if the tipo_usuario exists before trying to edit it
            $data['tipo_usuario'] = $this->Tipo_usuario_model->get_tipo_usuario($tipousuario_id);

            if(isset($data['tipo_usuario']['tipousuario_id']))
            {
                $this->load->model('Rol_usuario_model');
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $params = array(
                        'tipousuario_descripcion' => $this->input->post('tipousuario_descripcion'),
                    );
                    $this->Tipo_usuario_model->update_tipo_usuario($tipousuario_id,$params);

                    $all_rolasignado = $this->Rol_usuario_model->get_allrol_tipousuario($tipousuario_id);
                    $i = 0;
                    foreach ($all_rolasignado as $rol) {
                        $estoscheck = $this->input->post('rol'.$i);
                        $id_rol_usuario = $this->input->post('id_rol_usuario'.$i);
                        if($estoscheck == 1){
                            $rolusuario_asignado = 1;
                        }else{
                            $rolusuario_asignado = 0;
                        }
                        $param = array(
                                'rolusuario_asignado' => $rolusuario_asignado,
                        );
                        $this->Rol_usuario_model->update_rol_usuario($id_rol_usuario, $param);
                        $i++;
                    }
                    redirect('tipo_usuario');
                }
                else
                {
                    $data['all_rolasignadopadre'] = $this->Rol_usuario_model->get_allrol_tipousuariopadre($tipousuario_id);
                    $data['all_rolasignadohijo'] = $this->Rol_usuario_model->get_allrol_tipousuariohijo($tipousuario_id);

                    $data['_view'] = 'tipo_usuario/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The tipo_usuario you are trying to edit does not exist.');
        //}
    }

    function inactivar($tipousuario_id)
    {
        //if($this->acceso(21)){
            $tipo_usuario = $this->Unidad_model->get_unidad($tipousuario_id);

            // check if the programa exists before trying to delete it
            if(isset($tipo_usuario['tipousuario_id']))
            {
                $this->Tipo_usuario_model->inactivar_tipo_usuario($tipousuario_id);
                redirect('tipo_usuario');
            }
            else
                show_error('La Categoria que intentas dar de baja, no existe.');
        //}
    }
    /* *********** Reasignar Roles *********** */
    function reasignarol($tipousuario_id)
    {
        //if($this->acceso(21)){
            $this->load->model('Rol_usuario_model');
            $this->Rol_usuario_model->delete_rolusuario_fromtipous($tipousuario_id);

            $this->load->model('Rol_model');
            $all_rol = $this->Rol_model->get_allrol();
            foreach ($all_rol as $rol) {
                $param = array(
                    'tipousuario_id' => $tipousuario_id,
                    'rol_id' => $rol['rol_id'],
                    'rolusuario_asignado' => 1,
                );
                $rol_usuario_id = $this->Rol_usuario_model->add_rol_usuario($param);
            }
            redirect('tipo_usuario/edit/'.$tipousuario_id);
        //}
    }
}
