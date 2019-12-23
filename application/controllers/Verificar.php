<?php

class Verificar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('rol_model');
        $this->load->model('Gestion_model');
    }

    function index()
    {
        $username = $this->input->post('username');
        $clave = $this->input->post('password');
        $gestion_id = $this->input->post('gestion');

        $result = $this->login_model->login2($username, $clave);
        //print "<pre>"; print_r( $result); print "</pre>";
        //var_dump($result);

        if ($result) {
            if ($result->tipousuario_id <= 10) {
                $thumb = "default_thumb.jpg";
                if ($result->usuario_imagen <> null) {
                    $thumb = "thumb_".$result->usuario_imagen;
                    //$thumb = $this->foto_thumb($result->usuario_imagen);
                }
                $this->load->model('Rol_usuario_model');
                $this->load->model('Tipo_usuario_model');
                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($result->tipousuario_id);
                $tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);

                $gestion = $this->Gestion_model->get_gestion2($gestion_id);

                $sess_array = array(
                    'usuario_login' => $result->usuario_login,
                    'usuario_id' => $result->usuario_id,
                    'usuario_nombre' => $result->usuario_nombre,
                    'estado_id' => $result->estado_id,
                    'tipousuario_id' => $result->tipousuario_id,
                    'usuario_imagen' => $result->usuario_imagen,
                    'usuario_email' => $result->usuario_email,
                    'usuario_clave' => $result->usuario_clave,
                    'thumb' => $thumb,
                    'rol' => $rolusuario,
                    'semestre' => $gestion->gestion_semestre,
                    'gestion' => $gestion->gestion_descripcion,
                    'gestion_id' => $gestion->gestion_id
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');

                if ($session_data['tipousuario_id'] == 1) {// admin page
                    redirect('admin/dashb');
                }elseif ($session_data['tipousuario_id'] == 2 || $session_data['tipousuario_id'] == 7) {// docente page
                    redirect('docente/dashboard');
                }elseif ($session_data['tipousuario_id'] == 3) {// administrativo page
                    redirect('plan_academico');
                }elseif ($session_data['tipousuario_id'] == 4) {// secretaria page
                    redirect('inscripcion');
                }
                elseif ($session_data['tipousuario_id'] == 5 || $session_data['tipousuario_id'] == 8) {// estudiante aqui mario!!!!
                    redirect('estudiante/menu_estudiante/19');
                }

            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USUARIO invalido' . $result . '</div>');
                redirect('login');
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USER o PASSWORD invalidos' . $result . '</div>');
            redirect('login');
        }

    }

    public function foto_thumb($foto)
    {
        $path_parts = pathinfo('./uploads/profile/' . $foto);
        return  $path_parts['filename'].'_thumb.' . $path_parts['extension'];
    }

    public function logout()
    {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);

        $this->session->set_flashdata('msg', 'Successfully Logout');
        redirect('');
    }
    /*
    public function getTipo_usuario($tipousuario_id)
    {
        $tipo_usuarios = $this->rol_model->get_tipousuarios();

        foreach ($tipo_usuarios as $row) {
            if ($tipousuario_id == $row->tipousuario_id) {
                return $row->tipousuario_descripcion;
            }
        }

        if (count($tipo_usuarios) == 0) {
            return '----';
        }
    }*/


}

?>