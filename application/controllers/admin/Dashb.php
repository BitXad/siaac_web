<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashb extends CI_Controller
{
    var $session_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('user_model');
        $this->load->model('rol_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Institucion_model');
        $this->load->model('Rol_usuario_model');
        $this->load->model('Tipo_usuario_model');
        $this->load->model('Gestion_model');
        $this->session_data = $this->session->userdata('logged_in');
    }

    public function index()
    {
        $this->acceso();
        $data['page_title'] = ' - Bienvenido '.$this->session_data['usuario_nombre'];
        $gestion_id = $this->session_data['gestion_id'];
        $data['inscripcion'] = $this->Dashboard_model->get_inscripcion();
        $data['docentes'] = $this->Dashboard_model->get_docentes();
        $data['estudiantes'] = $this->Dashboard_model->get_estudiantes();
        $data['pensiones'] = $this->Dashboard_model->get_pensiones();
        $data['facturas'] = $this->Dashboard_model->get_facturas();
        $data['kardex_eco'] = $this->Dashboard_model->get_kardex_eco();
        $data['kardex_aca'] = $this->Dashboard_model->get_kardex_aca();
        //$data['carrera_estudiante'] = $this->Dashboard_model->get_carrera();
        $data['estudiante_carr'] = $this->Dashboard_model->get_carreraest($gestion_id);
        $data['usuario_inscripcion'] = $this->Dashboard_model->get_usuario_inscripcion();
        $data['montos_inscripcion'] = $this->Dashboard_model->get_montoinsc();
        $data['inscritos_estudiante'] = $this->Dashboard_model->get_inscritos(10, $gestion_id);
        $data['institucion'] = $this->Institucion_model->get_institucion(1);


        $data['_view'] = 'hola';
        $this->load->view('layouts/main',$data);

    }

    //Para graficos//

    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    function mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $fechas = "SELECT i.inscripcion_fecha, round(k.kardexeco_matricula,2) as matricula_totalfinal FROM inscripcion i, kardex_economico k where i.inscripcion_id=k.inscripcion_id and i.inscripcion_fecha >= '".$anio."-".$mes."-01' and  i.inscripcion_fecha <= '".$anio."-".$mes."-31' ";
        
        //echo $fechas;
        $result= $this->db->query($fechas)->result_array();
        $fechasven = "SELECT m.mensualidad_fechapago, round(m.mensualidad_montocancelado,2) as mesualidad_total FROM mensualidad m where m.estado_id=9 and  m.mensualidad_fechapago >= '".$anio."-".$mes."-01' and  m.mensualidad_fechapago <= '".$anio."-".$mes."-31' ";
        
        //echo $fechasven;
        $resultven= $this->db->query($fechasven)->result_array();
        //$result=$data['result'];
        $ct=count($result);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;
            $registrosven[$d]=0;     
        }

        foreach($result as $res){
        $diasel=intval(date("d",strtotime($res['inscripcion_fecha']) ) );
        
        $suma=$res['matricula_totalfinal'];
        
        $registros[$diasel]+=$suma;    
        }

        foreach($resultven as $resven){
        $diaselven=intval(date("d",strtotime($resven['mensualidad_fechapago']) ) );
        
        $sumave=$resven['mesualidad_total'];
       
        $registrosven[$diaselven]+=$sumave;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros, "registrosven" =>$registrosven);
        echo   json_encode($data);
        /*$anio = $this->input->post('anio');   1555891200
        $mes = $this->input->post('fecha2'); 
*/
        
    }

    function incripciones($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $fechas = "SELECT i.inscripcion_fecha FROM inscripcion i where i.inscripcion_fecha >= '".$anio."-".$mes."-01' and  i.inscripcion_fecha <= '".$anio."-".$mes."-31' ";
        $result= $this->db->query($fechas)->result_array();
        
        //$result=$data['result'];
        $ct=count($result);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;
            $registrosven[$d]=0;     
        }

        foreach($result as $res){
        $diasel=intval(date("d",strtotime($res['inscripcion_fecha']) ) );
        
        $suma=1;
        
        $registros[$diasel]+=$suma;    
        }


        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        echo   json_encode($data);
        /*$anio = $this->input->post('anio');   1555891200
        $mes = $this->input->post('fecha2'); 
*/
        
    }
    // Fin para graficos//
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }

    public function cuenta()
    {
        $this->acceso();

        $session_data = $this->session->userdata('logged_in');

            $data = array(
                'usuario_login' => $session_data['usuario_login'],
                'usuario_id' => $session_data['usuario_id'],
                'usuario_nombre' => $session_data['usuario_nombre'],
                'rol' => $this->getRol($session_data['tipousuario_id']),
                'tipousuario_id' => $session_data['tipousuario_id'],
                'usuario_imagen' => $session_data['usuario_imagen'],
                'usuario_email' => $session_data['usuario_email'],
                'page_title' => 'Admin >> Mi Cuenta',
                'thumb'=> $session_data['thumb']
            );

            $data['user'] = $this->user_model->get_usuario($session_data['usuario_id']);
            $data['usuario_imagen'] = $session_data['usuario_imagen'];

            //$data['main'] = $this->load->view('admin/form_cuenta',$data1, true);
            //$this->load->view('template/main',$data);

            $data['_view'] = 'admin/form_cuenta';
            $this->load->view('layouts/main',$data);

    }

    public function setu()
    {
        $this->acceso();

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[10]|max_length[250]|callback_hay_email2');//OJO
        $this->form_validation->set_message('hay_email2', 'El email ya se registro, escriba uno diferente');
        $this->form_validation->set_rules('clave', 'Password', 'trim|required|matches[rclave]');
        $this->form_validation->set_rules('rclave', 'Repetir Password', 'trim|required');
        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[4]|max_length[50]|callback_hay_login2');//OJO
        $this->form_validation->set_message('hay_login2', 'El login ya se registro, escriba uno diferente');

        if ($this->form_validation->run() == FALSE) {   //validacion falla

            $data['user'] = $this->user_model->get_usuario($session_data['usuario_id']);
            $data['usuario_imagen'] = $this->session_data['usuario_imagen'];

            $data['_view'] = 'admin/form_cuenta';
            $this->load->view('layouts/main',$data);

        }
        else {
//ini
            $idu = $this->session_data['usuario_id'];
            $foto = $this->input->post('foto');

            if (!empty($_FILES['chivo']['name'])){
                $this->load->library('image_lib');
                $config['upload_path'] = './resources/images/usuarios';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 450;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $new_name = time();
                $config['file_name'] = $new_name;
                $config['file_ext_tolower'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('chivo');

                $img_data = $this->upload->data();
                $extension = $img_data['file_ext'];

                $confi['image_library'] = 'gd2';
                $confi['source_image'] = './resources/images/usuarios/' . $new_name . $extension;
                $confi['create_thumb'] = TRUE;
                $confi['maintain_ratio'] = TRUE;
                $confi['width'] = 40;
                $confi['height'] = 40;

                $this->image_lib->clear();
                $this->image_lib->initialize($confi);
                $this->image_lib->resize();

                $foto = $new_name . $extension;
            }


            $data = array(
                'usuario_nombre' => $this->input->post('nombre'),
                'usuario_clave' => md5($this->input->post('clave')),
                'usuario_email' => $this->input->post('email'),
                'usuario_imagen' => $foto,
                'usuario_login' => $this->input->post('login')
            );

            if (!$this->user_model->update_usuario($data, $idu)) {
                $result = $this->user_model->get_usuario3($idu);
                if ($result) {
                    $this->session->unset_userdata('logged_in');

                    $path_parts = pathinfo('./resources/images/usuarios/' . $result->usuario_imagen);
                    $thumb =  $path_parts['filename'] .'_thumb.'. $path_parts['extension'];

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
                    $this->session->set_flashdata('msg',
                        '<div class="alert alert-success text-center fade in" style="margin-top:18px;">
                                <a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a>
                                Cuenta Actualizada con <strong>Exito!</strong>
                            </div>');

                    redirect('admin/dashb/cuenta');
                }

            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error.  Intente mas tarde!!!</div>');
                redirect('admin/dashb/cuenta');
            }
        }

    }

    public function getRol($tipousuario_idol)
    {
        $tipo_usuarios = $this->rol_model->get_tipousuarios();

        foreach ($tipo_usuarios as $row) {
            if ($tipousuario_idol == $row->tipousuario_id) {
                return $row->tipousuario_descripcion;
            }
        }

        if (count($tipo_usuarios) == 0) {
            return '----';
        }
    }

    public function haylogin()
    {
        $this->acceso();
        $login = $this->input->post('login');
        $uid = $this->input->post('uid');

        $res = $this->user_model->hay_login($login, $uid);
        echo $res;
    }

    public function haylogin2()
    {
        $login = $this->input->post('login');
        $uid = $this->input->post('uid');
        $res = $this->user_model->hay_login($login,$uid);

        echo $res;
    }

    public function hay_email2($email_field)
    {
        $idu = $this->input->post('userid');
        if ($this->user_model->email_repeat2($email_field, $idu)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function hay_login2($login_field)
    {
        $idu = $this->input->post('userid');
        if ($this->user_model->login_repeat2($login_field, $idu)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function haylogin1()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');

            if ($session_data['tipousuario_id'] == 1) {

                $login = $this->input->post('login');

                $res = $this->user_model->hay_login1($login);
                echo $res;

            } else {
                redirect('alerta');
            }
        } else {
            redirect('', 'refresh');
        }
    }

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
    }

    private function acceso(){
        if ($this->session->userdata('logged_in')) {

            if( $this->session_data['tipousuario_id']==1 or $this->session_data['tipousuario_id']==2) {
                return;

            } else {
                redirect('alerta');
            }
        } else {
            redirect('inicio', 'refresh');
        }
    }


}