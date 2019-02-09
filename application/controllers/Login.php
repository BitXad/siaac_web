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

        $this->load->view('public/login',$data);
    }
}

