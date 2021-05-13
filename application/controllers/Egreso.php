<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Egreso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Egreso_model');
        $this->load->model('Categoria_egreso_model'); 
        $this->load->model('Institucion_model');
        $this->load->model('Usuario_model');   
        $this->load->helper('numeros');
        $this->load->model('Parametro_model');
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
     * Listegr of egreso
     */
    function index()
    {
        if($this->acceso(19)){
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1) {
                   $data = array(
                        'page_title' => 'Admin >> Mi Cuenta'
                    );
                    $usuario_id = $session_data['usuario_id'];
            $data['egreso'] = $this->Egreso_model->get_all_egreso();
            $data['categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
            $data['institucion'] = $this->Institucion_model->get_institucion(1);    
            $data['_view'] = 'egreso/index';
            $this->load->view('layouts/main',$data);
                }
                else{
                    redirect('alerta');
                }
            } else {
                redirect('', 'refresh');
            }
        }
    }

 function buscarfecha()
    {
        if($this->acceso(23)){
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1) {
                    if ($this->input->is_ajax_request()) {

                        $filtro = $this->input->post('filtro');

                       if ($filtro == null){
                        $result = $this->Egreso_model->get_all_egreso($params);
                        }
                        else{
                        $result = $this->Egreso_model->fechaegreso($filtro);            
                        }
                       echo json_encode($result);

                    }
                    else
                    {                 
                                show_404();
                    }          
                }else{
                    redirect('alerta');
                }
            } else {
                redirect('', 'refresh');
            }
        }
    }

    
    function add()
    {
        if($this->acceso(20)){
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                   $data = array(
                        'page_title' => 'Admin >> Registrar Egreso'
                    );
                    $usuario_id = $session_data['usuario_id'];
                    $gestion = $session_data['gestion_id'];

                    $this->load->library('form_validation');
                    $this->form_validation->set_rules(
                        'egreso_nombre', 'egreso_nombre',
                        'required');

                if($this->form_validation->run())      
                {   
                    $numrec = $this->Egreso_model->numero($gestion);
                    $numero = $numrec[0]['gestion_numegreso'] + 1;
                    $params = array(
                        'usuario_id' => $usuario_id,
                        'egreso_categoria' => $this->input->post('egreso_categoria'),
                        'egreso_numero' => $numero,
                        'egreso_nombre' => $this->input->post('egreso_nombre'),
                        'egreso_monto' => $this->input->post('egreso_monto'),
                        'egreso_moneda' => $this->input->post('egreso_moneda'),
                        'egreso_concepto' => $this->input->post('egreso_concepto'),
                        'egreso_fecha' => $this->input->post('egreso_fecha'),
                    );
                    $egreso_id = $this->Egreso_model->add_egreso($params);
                    $sql = "UPDATE gestion SET gestion_numegreso=gestion_numegreso+1 WHERE gestion_id = ".$gestion.""; 
                    $this->db->query($sql);
                    redirect('egreso/index');
                }else
                {
                    $this->load->model('Categoria_egreso_model');
                    $data['all_categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
                    $this->load->model('Parametro_model');
                    $data['parametro'] = $this->Parametro_model->get_all_parametro();
                    $data['_view'] = 'egreso/add';
                    $this->load->view('layouts/main',$data);
                }
            }else{
                redirect('', 'refresh');
            }
        }
    }

    /*
     * Editegr a egreso
     */
    function edit($egreso_id)
    {
        if($this->acceso(21)){
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1) {
                    $usuario_id = $session_data['usuario_id'];
            // check if the egreso exists before tryegr to edit it
            $data['egreso'] = $this->Egreso_model->get_egreso($egreso_id);

            if(isset($data['egreso']['egreso_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'usuario_id' => $usuario_id,
                        'egreso_categoria' => $this->input->post('egreso_categoria'),
                        'egreso_numero' => $this->input->post('egreso_numero'),
                        'egreso_nombre' => $this->input->post('egreso_nombre'),
                        'egreso_monto' => $this->input->post('egreso_monto'),
                        'egreso_moneda' => $this->input->post('egreso_moneda'),
                        'egreso_concepto' => $this->input->post('egreso_concepto'),
                        'egreso_fecha' => $this->input->post('egreso_fecha'),
                    );
                    $this->Egreso_model->update_egreso($egreso_id,$params);            
                    redirect('egreso/index');
                }
                else
                {

                    $this->load->model('Categoria_egreso_model');
                    $data['all_categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
                    $data['_view'] = 'egreso/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The egreso you are tryegr to edit does not exist.');
                }
                else{
                    redirect('alerta');
                }
            } else {
                redirect('', 'refresh');
            }
        }
    }

    /*
     * Deletegr egreso
     */

public function pdf($egreso_id){
    if($this->acceso(22)){
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
               $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );

                $data['egresos'] = $this->Egreso_model->get_egresos($egreso_id);
                $data['institucion'] = $this->Institucion_model->get_institucion(1);    
                $data['_view'] = 'egreso/recibo';
                $this->load->view('layouts/main',$data);
            }
                else{
                    redirect('alerta');
                }
            } else {
                redirect('', 'refresh');
            }
        }
    }


    public function boucher($egreso_id){
        if($this->acceso(22)){
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                if($session_data['tipousuario_id']==1) {
                    $data['egreso'] = $this->Egreso_model->get_egresos($egreso_id);
                    $data['institucion'] = $this->Institucion_model->get_institucion(1);    
                    $data['_view'] = 'egreso/reciboboucher';
                    $this->load->view('layouts/main',$data);
                }
                else{
                    redirect('alerta');
                }
            } else {
                redirect('', 'refresh');
            }
        }
    }

    function remove($egreso_id)
    {
        if($this->acceso(24)){
            $egreso = $this->Egreso_model->get_egreso($egreso_id);
            // check if the egreso exists before tryegr to delete it
            if(isset($egreso['egreso_id']))
            {
                $this->Egreso_model->delete_egreso($egreso_id);
                redirect('egreso/index');
            }
            else
                show_error('The egreso you are tryegr to delete does not exist.');
        }
    }
    

    public function convertir()
    {
        $egreso_monto = trim($this->input->post('egreso_monto'));

        if (empty($egreso_monto)) {
            echo json_encode(array('leyenda' => 'Debe introducir una egreso_monto.'));
            
            return;
        }
        
        # verificar si el número no tiene caracteres no númericos, con excepción
        # del punto decimal
        $xegreso_monto = str_replace('.', '', $egreso_monto);
        
        if (FALSE === ctype_digit($xegreso_monto)){
            echo json_encode(array('leyenda' => 'La egreso_monto introducida no es válida.'));
            
            return;
        }

        # procedemos a covertir la egreso_monto en letras
        $this->load->helper('numeros');
        $response = array(
            'leyenda' => num_to_letras($egreso_monto)
            , 'egreso_monto' => $egreso_monto
            );  
        echo json_encode($response);
    }


}
