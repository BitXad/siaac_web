<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Detalle_factura extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detalle_factura_model');
    } 

    /*
     * Listing of detalle_factura
     */
    function index()
    {
        $data['detalle_factura'] = $this->Detalle_factura_model->get_all_detalle_factura();
        
        $data['_view'] = 'detalle_factura/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new detalle_factura
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'factura_id' => $this->input->post('factura_id'),
				'detalle_descripcion' => $this->input->post('detalle_descripcion'),
				'detalle_cantidad' => $this->input->post('detalle_cantidad'),
				'detalle_precio' => $this->input->post('detalle_precio'),
				'detalle_subtotal' => $this->input->post('detalle_subtotal'),
				'detalle_descuento' => $this->input->post('detalle_descuento'),
				'detalle_totalfinal' => $this->input->post('detalle_totalfinal'),
				'detalle_caracteristicas' => $this->input->post('detalle_caracteristicas'),
            );
            
            $detalle_factura_id = $this->Detalle_factura_model->add_detalle_factura($params);
            redirect('detalle_factura/index');
        }
        else
        {
			$this->load->model('Factura_model');
			$data['all_factura'] = $this->Factura_model->get_all_factura();
            
            $data['_view'] = 'detalle_factura/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a detalle_factura
     */
    function edit($detalle_id)
    {   
        // check if the detalle_factura exists before trying to edit it
        $data['detalle_factura'] = $this->Detalle_factura_model->get_detalle_factura($detalle_id);
        
        if(isset($data['detalle_factura']['detalle_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'factura_id' => $this->input->post('factura_id'),
					'detalle_descripcion' => $this->input->post('detalle_descripcion'),
					'detalle_cantidad' => $this->input->post('detalle_cantidad'),
					'detalle_precio' => $this->input->post('detalle_precio'),
					'detalle_subtotal' => $this->input->post('detalle_subtotal'),
					'detalle_descuento' => $this->input->post('detalle_descuento'),
					'detalle_totalfinal' => $this->input->post('detalle_totalfinal'),
					'detalle_caracteristicas' => $this->input->post('detalle_caracteristicas'),
                );

                $this->Detalle_factura_model->update_detalle_factura($detalle_id,$params);            
                redirect('detalle_factura/index');
            }
            else
            {
				$this->load->model('Factura_model');
				$data['all_factura'] = $this->Factura_model->get_all_factura();

                $data['_view'] = 'detalle_factura/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The detalle_factura you are trying to edit does not exist.');
    } 

    /*
     * Deleting detalle_factura
     */
    function remove($detalle_id)
    {
        $detalle_factura = $this->Detalle_factura_model->get_detalle_factura($detalle_id);

        // check if the detalle_factura exists before trying to delete it
        if(isset($detalle_factura['detalle_id']))
        {
            $this->Detalle_factura_model->delete_detalle_factura($detalle_id);
            redirect('detalle_factura/index');
        }
        else
            show_error('The detalle_factura you are trying to delete does not exist.');
    }
    
}
