<?php
/**
 * Created by PhpStorm.
 * User: adolf
 * Date: 2/4/19
 * Time: 4:13 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {



	public function index()
	{
        $data = array(
            'msg' => $this->session->flashdata('msg')
        );

        $this->load->view('public/login',$data);
	}

}

/* End of file Controllername.php */