<?php/*  * Generated by CRUDigniter v3.2  * www.crudigniter.com */class Reportes extends CI_Controller{    private $session_data = "";    function __construct()    {        parent::__construct();        $this->load->model('Reportes_model');        $this->load->model('Institucion_model');        if ($this->session->userdata('logged_in')) {            $this->session_data = $this->session->userdata('logged_in');        }else {            redirect('', 'refresh');        }    }     private function acceso($id_rol){        $rolusuario = $this->session_data['rol'];        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){            return true;        }else{            $data['_view'] = 'login/mensajeacceso';            $this->load->view('layouts/main',$data);        }    }    /*     * Listing of cliente     */    function index()    {        if($this->acceso(120)){            $data['institucion'] = $this->Institucion_model->get_all_institucion();            $data['tipousuario_id']  = $this->session_data['tipousuario_id'];            $data['usuario_id']  = $this->session_data['usuario_id'];            $data['usuario_nombre']  = $this->session_data['usuario_nombre'];            $this->load->model('Usuario_model');            $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();            $this->load->model('Parametro_model');            $data['parametro'] = $this->Parametro_model->get_parametros();            $data['page_title'] = "Reportes";            $data['_view'] = 'reportes/index';            $this->load->view('layouts/main',$data);        }    }    /*     * Reporte de Ingresos y Salidas     */    function buscarlosreportes()    {        if($this->acceso(118)){            if ($this->input->is_ajax_request()) {                $fecha1 = $this->input->post('fecha1');                   $fecha2 = $this->input->post('fecha2');                 $usuario = $this->input->post('usuario_id');                 $valfecha1 = "";                $valfecha2 = "";                $usuario_id = "";                if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                    $valfecha1 = $fecha1;                    $valfecha2 = $fecha2;                }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                    $valfecha1 = $fecha1;                    $valfecha2 = $fecha1;                }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                    $valfecha1 = $fecha2;                    $valfecha2 = $fecha2;                }else{                    $fecha1 = null;                    $fecha2 = null;                }                if($usuario >  0){                    $usuario_id = $usuario;                }else{                    $usuario_id = 0;                }                $detalles = $this->Reportes_model->get_detalleventas_reporte($valfecha1, $valfecha2, $usuario_id);                $ventas = $this->Reportes_model->get_reportes($valfecha1, $valfecha2, $usuario_id);                $datos=array("ventas" => $ventas, "detalles" => $detalles);                echo json_encode($datos);            }               else            {                                 show_404();            }        }        }    function rinscripcion()    {        if($this->acceso(119)){            $data['usuario_nombre'] = $this->session_data['usuario_nombre'];            $this->load->model('Usuario_model');            $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();            $data['institucion'] = $this->Institucion_model->get_all_institucion();                        $data['gestion_descripcion'] = $this->session_data['gestion'];            $data['tipousuario_id'] = $this->session_data['tipousuario_id'];            $data['gestion_id'] = $this->session_data['gestion_id'];                        $data['_view'] = 'reportes/rinscripcion';            $this->load->view('layouts/main',$data);        }    }        function buscarlosinscritos()    {        if($this->acceso(118)){            if ($this->input->is_ajax_request()) {                $fecha1 = $this->input->post('fecha1');                $fecha2 = $this->input->post('fecha2');                $usuario = $this->input->post('usuario_id');                $gestion_id = $this->input->post('gestion_id');                $filtro = $this->input->post('filtro');                $valfecha1 = "";                $valfecha2 = "";                $usuario_id = "";                if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                    $valfecha1 = $fecha1;                    $valfecha2 = $fecha2;                }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                    $valfecha1 = $fecha1;                    $valfecha2 = $fecha1;                }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                    $valfecha1 = $fecha2;                    $valfecha2 = $fecha2;                }else{                    $fecha1 = null;                    $fecha2 = null;                }                if($usuario >  0){                    $usuario_id = $usuario;                }else{                    $usuario_id = 0;                }                $datos = $this->Reportes_model->get_inscritos($valfecha1, $valfecha2, $usuario_id, $gestion_id, $filtro);                echo json_encode($datos);            }               else            {                show_404();            }        }    }    /* muestra las mensualidades que faltan cobrar */    function rdeudas()    {        if($this->acceso(119)){            $data['usuario_nombre'] = $this->session_data['usuario_nombre'];            $data['institucion'] = $this->Institucion_model->get_all_institucion();                        $data['gestion_descripcion'] = $this->session_data['gestion'];            $data['tipousuario_id'] = $this->session_data['tipousuario_id'];            $data['gestion_id'] = $this->session_data['gestion_id'];                        $this->load->model('Gestion_model');            $data['all_gestion'] = $this->Gestion_model->get_all_gestion_activo();                        $mes =  date("m");            $anio = date("Y");            $primer_dia=1;            $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);            $fecha_inicial = date("Y-m-d", strtotime($anio."-".$mes."-".$primer_dia) );            $fecha_final = date("Y-m-d", strtotime($anio."-".$mes."-".$ultimo_dia) );            $data['fecha_inicial'] = $fecha_inicial;            $data['fecha_final'] = $fecha_final;            $data['_view'] = 'reportes/rdeudas';            $this->load->view('layouts/main',$data);        }    }    /* devuelve el ultimo dia de un mes */    public function getUltimoDiaMes($elAnio,$elMes) {     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));    }    /* busca los deudores */    function buscarlasdeudas()    {        if($this->acceso(118)){            if ($this->input->is_ajax_request()) {                $fecha1 = $this->input->post('fecha1');                $fecha2 = $this->input->post('fecha2');                $gestion_id = $this->input->post('gestion_id');                $datos = $this->Reportes_model->get_deudas($fecha1, $fecha2, $gestion_id);                echo json_encode($datos);            }               else            {                                 show_404();            }        }    }}    