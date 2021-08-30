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
        $this->load->model('Rol_usuario_model');
        $this->load->model('Tipo_usuario_model');
        $this->load->model('Citacion_model');
    }

    function index()
    {
        $username = $this->input->post('username');
        $clave = $this->input->post('password');
        $gestion_id = $this->input->post('gestion');
        $tipo = $this->input->post('tipo');
        
        if ($tipo==1) {//admin
                redirect('verificar/index1/'.$username.'/'.$clave.'/'.$gestion_id);
                
        }elseif ($tipo==2) {// docente 
                redirect('verificar/index2/'.$username.'/'.$clave.'/'.$gestion_id);
                
        }elseif ($tipo==3) {// estudiante             
                redirect('verificar/index3/'.$username.'/'.$clave.'/'.$gestion_id);   
        }

    }
    
    function index1($username,$clave,$gestion_id)
    {
        
        $result = $this->login_model->login1($username, $clave);

        if ($result) {
            if ($result->tipousuario_id <= 10) {
                $thumb = "default_thumb.jpg";
                if ($result->usuario_imagen <> null) {
                    $thumb = "thumb_".$result->usuario_imagen;
                    //$thumb = $this->foto_thumb($result->usuario_imagen);
                }
                
                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($result->tipousuario_id);
                $tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);

                $gestion = $this->Gestion_model->get_gestion2($gestion_id);
                
                $sess_array = array(
                    'usuario_login' => $result->usuario_login,
                    'usuario_id' => $result->usuario_id,
                    'usuario_nombre' => $result->usuario_nombre,
                    'estado_id' => $result->estado_id,
                    'tipousuario_id' => $result->tipousuario_id,
                    'tipousuario_descripcion' => $tipousuario_nombre,
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
                $dosif="SELECT DATEDIFF(dosificacion_fechalimite, CURDATE()) as dias FROM dosificacion WHERE dosificacion_id = 1";
                $dosificacion = $this->db->query($dosif)->row_array();

                if ($session_data['tipousuario_id'] == 1) {// admin page
                    if ($dosificacion['dias']<=10 && $dosificacion['dias']!=null) {
                        redirect('alerta/dosificacion'); 
                    }else{
                        redirect('admin/dashb');
                    }
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

            }else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USUARIO invalido' . $result . '</div>');
                redirect('login');
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="font-family:Arial; font-size:12px;">El usuario o la contraseña son incorrectos.' . $result . '</div>');
            redirect('login');
        }

    }

    function index2($username,$clave,$gestion_id)
    {
        
        $result = $this->login_model->login2($username, $clave);

        if ($result) {
           
                $thumb = "";
                if ($result->docente_foto <> null) {
                    $thumb = $this->foto_thumb($result->docente_foto);
                }

                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($result->tipousuario_id);
                $tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);
                $gestion = $this->Gestion_model->get_gestion2($gestion_id);

                $sess_array = array(
                    'usuario_login' => $result->docente_login,
                    'usuario_id' => $result->docente_id,
                    'usuario_nombre' => $result->docente_nombre,
                    'estado_id' => $result->estado_id,
                    'tipousuario_id' => $result->tipousuario_id,
                    'tipousuario_descripcion' => $tipousuario_nombre,
                    'usuario_imagen' => $result->docente_foto,
                    'usuario_email' => $result->docente_email,
                    'usuario_clave' => $result->docente_clave,
                    'thumb' => $thumb,
                    'rol' => $rolusuario,
                    'semestre' => $gestion->gestion_semestre,
                    'gestion' => $gestion->gestion_descripcion,
                    'gestion_id' => $gestion->gestion_id
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');

     
                    redirect('docente/dashboard');
             
                


        } else {
//            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USER o PASSWORD invalidos' . $result . '</div>');
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="font-family:Arial; font-size:12px;">El usuario o la contraseña son incorrectos.' . $result . '</div>');
            redirect('login');
        }

    }

     function index3($username,$clave,$gestion_id)
    {
        
        $result = $this->login_model->login3($username, $clave);

        if ($result) {
           
                $thumb = "";
                if ($result->estudiante_foto <> null) {
                    $thumb = $this->foto_thumb($result->estudiante_foto);
                }

                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($result->tipousuario_id);
                $tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);
                $gestion = $this->Gestion_model->get_gestion2($gestion_id);
                $total_citacion = $this->Citacion_model->total_citaciones($result->estudiante_id);
                $sess_array = array(
                    'usuario_login' => $result->estudiante_login,
                    'usuario_id' => $result->estudiante_id,
                    'usuario_nombre' => $result->estudiante_nombre,
                    'estado_id' => $result->estado_id,
                    'tipousuario_id' => $result->tipousuario_id,
                    'tipousuario_descripcion' => $tipousuario_nombre,
                    'usuario_imagen' => $result->estudiante_foto,
                    'usuario_email' => $result->estudiante_email,
                    'usuario_clave' => $result->estudiante_clave,
                    'thumb' => $thumb,
                    'rol' => $rolusuario,
                    'semestre' => $gestion->gestion_semestre,
                    'gestion' => $gestion->gestion_descripcion,
                    'gestion_id' => $gestion->gestion_id,
                    'total_citacion' => $total_citacion
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');

     
                    redirect('estudiante/menu_estudiante');
             
                


        } else {
            //$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USER o PASSWORD invalidos' . $result . '</div>');
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="font-family:Arial; font-size:12px;">El usuario o la contraseña son incorrectos.' . $result . '</div>');
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