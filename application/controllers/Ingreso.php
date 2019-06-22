<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Ingreso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ingreso_model');
        $this->load->model('Categoria_ingreso_model');
        $this->load->model('Institucion_model');
        $this->load->model('Usuario_model');
        $this->load->helper('numeros');
        $this->load->model('Parametro_model'); 
        //*************** Control de sesiones *******************//           
    } 


     
    /*
     * Listing of ingresos
     */
    function index()
    {
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
                $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );
                $usuario_id = $session_data['usuario_id'];
        $data['ingresos'] = $this->Ingreso_model->get_all_ingresos();
        $data['categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
        $data['_view'] = 'ingreso/index';
        $this->load->view('layouts/main',$data);
            }
            else{
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }

     function buscarfecha()
    {
         
     
 
        $usuario_id = 1;

        if ($this->input->is_ajax_request()) {
            
            $filtro = $this->input->post('filtro');
            
           if ($filtro == null){
            $result = $this->Ingreso_model->get_all_ingresos($params);
            }
            else{
            $result = $this->Ingreso_model->fechaingreso($filtro);            
            }
           echo json_encode($result);
            
        }
        else
        {                 
                    show_404();
        }          
    }
    /*
     * Adding a new ingreso
     */
    function add()
    {   
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
                $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );
                $usuario_id = $session_data['usuario_id'];
        $this->load->library('form_validation');
      $this->form_validation->set_rules(
        'ingreso_nombre', 'ingreso_nombre',
        'required');
       
       if($this->form_validation->run())      
        {   
          $numrec = $this->Ingreso_model->numero();
           $numero = $numrec[0]['parametro_numrecing'] + 1;
           

            $params = array(
				'usuario_id' => $usuario_id,
				'ingreso_categoria' => $this->input->post('ingreso_categoria'),
        'ingreso_numero' => $numero,
        'ingreso_nombre' => $this->input->post('ingreso_nombre'),
				'ingreso_monto' => $this->input->post('ingreso_monto'),
				'ingreso_moneda' => $this->input->post('ingreso_moneda'),
				'ingreso_concepto' => $this->input->post('ingreso_concepto'),
				'ingreso_fecha' => $this->input->post('ingreso_fecha'),
				
            );

            
            
            $ingreso_id = $this->Ingreso_model->add_ingreso($params);
            $sql = "UPDATE parametros SET parametro_numrecing=parametro_numrecing+1 WHERE parametro_id = '1'"; 
            $this->db->query($sql);
            redirect('ingreso/index');
           
        }
        else
        {
	       $this->load->model('Categoria_ingreso_model');
           $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
           $this->load->model('Parametro_model');
           $data['parametro'] = $this->Parametro_model->get_all_parametro();
            $data['_view'] = 'ingreso/add';
            $this->load->view('layouts/main',$data);
        }
            }
            else{
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }

    /*
     * Editing a ingreso
     */
    function edit($ingreso_id)
    {   
        
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
               $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );
                $usuario_id = $session_data['usuario_id'];
        // check if the ingreso exists before trying to edit it
        $data['ingreso'] = $this->Ingreso_model->get_ingreso($ingreso_id);
        
        if(isset($data['ingreso']['ingreso_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'usuario_id' => $usuario_id,
        'ingreso_categoria' => $this->input->post('ingreso_categoria'),
        'ingreso_numero' => $this->input->post('ingreso_numero'),
        'ingreso_nombre' => $this->input->post('ingreso_nombre'),
        'ingreso_monto' => $this->input->post('ingreso_monto'),
        'ingreso_moneda' => $this->input->post('ingreso_moneda'),
        'ingreso_concepto' => $this->input->post('ingreso_concepto'),
        'ingreso_fecha' => $this->input->post('ingreso_fecha'),
				
                );

                $this->Ingreso_model->update_ingreso($ingreso_id,$params);            
                redirect('ingreso/index');
            }
            else
            {
				      $this->load->model('Categoria_ingreso_model');
               $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
                $data['_view'] = 'ingreso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ingreso you are trying to edit does not exist.');
    }
            else{
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }
    

public function pdf($ingreso_id){
    if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
               $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );

      $data['ingresos'] = $this->Ingreso_model->get_ingresos($ingreso_id);
       $data['institucion'] = $this->Institucion_model->get_institucion(1); 
             $data['_view'] = 'ingreso/recibo';
            $this->load->view('layouts/main',$data);
       
            }
            else{
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }
public function boucher($ingreso_id){
    if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if($session_data['tipousuario_id']==1) {
               $data = array(
                    'page_title' => 'Admin >> Mi Cuenta'
                );

      $data['ingreso'] = $this->Ingreso_model->get_ingresos($ingreso_id);
       $data['institucion'] = $this->Institucion_model->get_institucion(1); 
             $data['_view'] = 'ingreso/reciboboucher';
            $this->load->view('layouts/main',$data);
            }
            else{
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }
    /*
     * Deleting ingreso
     */
    function remove($ingreso_id)
    {
        $ingreso = $this->Ingreso_model->get_ingreso($ingreso_id);

        // check if the ingreso exists before trying to delete it
        if(isset($ingreso['ingreso_id']))
        {
            $this->Ingreso_model->delete_ingreso($ingreso_id);
            redirect('ingreso/index');
        }
        else
            show_error('The ingreso you are trying to delete does not exist.');
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