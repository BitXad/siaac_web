<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Mensualidad extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensualidad_model');
    } 

    /*
     * Listing of mensualidad
     */
    function index()
    {
        $data['mensualidad'] = $this->Mensualidad_model->get_all_mensualidad();
        
        $data['_view'] = 'mensualidad/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new mensualidad
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'estado_id' => $this->input->post('estado_id'),
				'kardexeco_id' => $this->input->post('kardexeco_id'),
				'usuario_id' => $this->input->post('usuario_id'),
				'mensualidad_numero' => $this->input->post('mensualidad_numero'),
				'mensualidad_montoparcial' => $this->input->post('mensualidad_montoparcial'),
				'mensualidad_descuento' => $this->input->post('mensualidad_descuento'),
				'mensualidad_montototal' => $this->input->post('mensualidad_montototal'),
				'mensualidad_fechalimite' => $this->input->post('mensualidad_fechalimite'),
				'mensualidad_mora' => $this->input->post('mensualidad_mora'),
				'mensualidad_fechapago' => $this->input->post('mensualidad_fechapago'),
				'mensualidad_horapago' => $this->input->post('mensualidad_horapago'),
				'mensualidad_nombre' => $this->input->post('mensualidad_nombre'),
				'mensualidad_ci' => $this->input->post('mensualidad_ci'),
				'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),
            );
            
            $mensualidad_id = $this->Mensualidad_model->add_mensualidad($params);
            redirect('mensualidad/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$this->load->model('Kardex_economico_model');
			$data['all_kardex_economico'] = $this->Kardex_economico_model->get_all_kardex_economico();

			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();
            
            $data['_view'] = 'mensualidad/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a mensualidad
     */
    function edit($mensualidad_id)
    {   
        // check if the mensualidad exists before trying to edit it
        $data['mensualidad'] = $this->Mensualidad_model->get_mensualidad($mensualidad_id);
        
        if(isset($data['mensualidad']['mensualidad_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'kardexeco_id' => $this->input->post('kardexeco_id'),
					'usuario_id' => $this->input->post('usuario_id'),
					'mensualidad_numero' => $this->input->post('mensualidad_numero'),
					'mensualidad_montoparcial' => $this->input->post('mensualidad_montoparcial'),
					'mensualidad_descuento' => $this->input->post('mensualidad_descuento'),
					'mensualidad_montototal' => $this->input->post('mensualidad_montototal'),
					'mensualidad_fechalimite' => $this->input->post('mensualidad_fechalimite'),
					'mensualidad_mora' => $this->input->post('mensualidad_mora'),
					'mensualidad_fechapago' => $this->input->post('mensualidad_fechapago'),
					'mensualidad_horapago' => $this->input->post('mensualidad_horapago'),
					'mensualidad_nombre' => $this->input->post('mensualidad_nombre'),
					'mensualidad_ci' => $this->input->post('mensualidad_ci'),
					'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),
                );

                $this->Mensualidad_model->update_mensualidad($mensualidad_id,$params);            
                redirect('mensualidad/index');
            }
            else
            {
				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

				$this->load->model('Kardex_economico_model');
				$data['all_kardex_economico'] = $this->Kardex_economico_model->get_all_kardex_economico();

				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'mensualidad/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The mensualidad you are trying to edit does not exist.');
    } 

    /*
     * Deleting mensualidad
     */
    function remove($mensualidad_id)
    {
        $mensualidad = $this->Mensualidad_model->get_mensualidad($mensualidad_id);

        // check if the mensualidad exists before trying to delete it
        if(isset($mensualidad['mensualidad_id']))
        {
            $this->Mensualidad_model->delete_mensualidad($mensualidad_id);
            redirect('mensualidad/index');
        }
        else
            show_error('The mensualidad you are trying to delete does not exist.');
    }
    
}
