<?php

class Alerta extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $session_data = $this->session->userdata('logged_in');
        echo 'Ud no esta autorizado para ver esta pagina'.
             '<br><a href="'.base_url('admin/dashb/logout').'">Cerrar Sesion</a>';
    }
    public function dosificacion()
    {
        $dosif="SELECT DATEDIFF(dosificacion_fechalimite, CURDATE()) as dias FROM dosificacion WHERE dosificacion_id = 1";
                $dosificacion = $this->db->query($dosif)->row_array();

        $data['diasdo'] = $dosificacion;
        $data['_view'] = 'admin/dosificacion';
        $this->load->view('layouts/main',$data);
    }
}