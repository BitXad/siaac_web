<?php

Class Login extends CI_Controller
{

    public function __construct()    {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'msg' => $this->session->flashdata('msg')
        );

        $this->load->model('Gestion_model');
        
        $data['gestiones'] = $this->Gestion_model->get_gestiones();
        $data['institucion'] = $this->Gestion_model->get_institucion();
        
        $licencia="SELECT DATEDIFF(licencia_fechalimite, CURDATE()) as dias FROM licencia WHERE licencia_id = 1";
        $lice = $this->db->query($licencia)->row_array();
        
        if ($lice['dias']<=10) {
            $data['diaslic'] = $lice['dias'];
            $this->load->view('public/login',$data);
    	} else{
            $data['diaslic'] = 5000;
            $this->load->view('public/login',$data);	
    	}
        //$this->load->view('public/login',$data);
    }
    public function mensajeacceso(){
        redirect('login/mensajeacceso');
    }
}

