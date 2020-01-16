<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Inscripcion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Inscripcion_model');
        $this->load->model('Institucion_model');
        $this->load->model('Carrera_model');
        $this->load->model('Nivel_model');
        $this->load->helper('numeros');
        $this->load->library('ControlCode');
        $this->load->model('Kardex_economico_model');
        $this->load->model('Kardex_academico_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of inscripcion
     */
    function index()
    {
        if($this->acceso(45)){
            $params['limit'] = RECORDS_PER_PAGE; 
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('inscripcion/index?');
            $config['total_rows'] = $this->Inscripcion_model->get_all_inscripcion_count();
            $this->pagination->initialize($config);

            $data['inscripcion'] = $this->Inscripcion_model->get_inscripciones($params);

            $data['_view'] = 'inscripcion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new inscripcion
     */
    function add()
    {
        if($this->acceso(45)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'usuario_id' => $this->input->post('usuario_id'),
                    'gestion_id' => $this->input->post('gestion_id'),
                    'estudiante_id' => $this->input->post('estudiante_id'),
                    'paralelo_id' => $this->input->post('paralelo_id'),
                    'nivel_id' => $this->input->post('nivel_id'),
                    'turno_id' => $this->input->post('turno_id'),
                    'inscripcion_fecha' => $this->input->post('inscripcion_fecha'),
                    'inscripcion_hora' => $this->input->post('inscripcion_hora'),
                    'inscripcion_fechainicio' => $this->input->post('inscripcion_fechainicio'),
                );

                $inscripcion_id = $this->Inscripcion_model->add_inscripcion($params);
                redirect('inscripcion/index');
            }
            else
            {
                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $this->load->model('Estudiante_model');
                $data['all_estudiante'] = $this->Estudiante_model->get_all_estudiante();

                $this->load->model('Paralelo_model');
                $data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

                $this->load->model('Nivel_model');
                $data['all_nivel'] = $this->Nivel_model->get_all_nivel();

                $this->load->model('Turno_model');
                $data['all_turno'] = $this->Turno_model->get_all_turno();

                $data['_view'] = 'inscripcion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    /*
     * Adding a new inscripcion
     */
    function inscribir($estudiante_id)
    {
        if($this->acceso(45)){
            if(isset($_POST) && count($_POST) > 0)     
            {
                $params = array(
                    'usuario_id' => $this->input->post('usuario_id'),
                    'gestion_id' => $this->input->post('gestion_id'),
                    'estudiante_id' => $this->input->post('estudiante_id'),
                    'paralelo_id' => $this->input->post('paralelo_id'),
                    'nivel_id' => $this->input->post('nivel_id'),
                    'turno_id' => $this->input->post('turno_id'),
                    'inscripcion_fecha' => $this->input->post('inscripcion_fecha'),
                    'inscripcion_hora' => $this->input->post('inscripcion_hora'),
                    'inscripcion_fechainicio' => $this->input->post('inscripcion_fechainicio'),
                );
                $inscripcion_id = $this->Inscripcion_model->add_inscripcion($params);
                redirect('inscripcion/index');
            }
            else
            {
                $gestion_id = $this->session_data['gestion_id'];
                $this->load->model('Carrera_model');
                $data['all_carrera'] = $this->Carrera_model->get_all_carrera();
                $this->load->model('Dosificacion_model');
                $data['dosificacion'] = $this->Dosificacion_model->get_dosificacion_activa();
    //			$this->load->model('Usuario_model');
    //			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $this->load->model('Estudiante_model');

                if ($estudiante_id>0){
                    $data['estudiante'] = $this->Estudiante_model->get_estudiante_por_id($estudiante_id);
                    $this->load->model('Inscripcion_model');
                    $data['carrera_idinsc_est'] = $this->Inscripcion_model->get_carreraid_inscripcion($estudiante_id);
                }else{
                    $data['estudiante'] = $this->Estudiante_model->get_estudiante_temporal();
                    $data['carrera_idinsc_est'] = 0;
                }

                $this->load->model('Paralelo_model');
                $data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

    //			$this->load->model('Nivel_model');
    //			$data['all_nivel'] = $this->Nivel_model->get_all_nivel();

                $this->load->model('Turno_model');
                $data['all_turno'] = $this->Turno_model->get_all_turno();

                $data['_view'] = 'inscripcion/inscribir';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a inscripcion
     */
    function edit($inscripcion_id)
    {
        if($this->acceso(45)){
            // check if the inscripcion exists before trying to edit it
            $data['inscripcion'] = $this->Inscripcion_model->get_inscripcion($inscripcion_id);

            if(isset($data['inscripcion']['inscripcion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'usuario_id' => $this->input->post('usuario_id'),
                        'gestion_id' => $this->input->post('gestion_id'),
                        'estudiante_id' => $this->input->post('estudiante_id'),
                        'paralelo_id' => $this->input->post('paralelo_id'),
                        'nivel_id' => $this->input->post('nivel_id'),
                        'turno_id' => $this->input->post('turno_id'),
                        'inscripcion_fecha' => $this->input->post('inscripcion_fecha'),
                        'inscripcion_hora' => $this->input->post('inscripcion_hora'),
                        'inscripcion_fechainicio' => $this->input->post('inscripcion_fechainicio'),
                    );

                    $this->Inscripcion_model->update_inscripcion($inscripcion_id,$params);            
                    redirect('inscripcion/index');
                }
                else
                {
                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                    $this->load->model('Estudiante_model');
                    $data['all_estudiante'] = $this->Estudiante_model->get_all_estudiante();

                    $this->load->model('Paralelo_model');
                    $data['all_paralelo'] = $this->Paralelo_model->get_all_paralelo();

                    $this->load->model('Nivel_model');
                    $data['all_nivel'] = $this->Nivel_model->get_all_nivel();

                    $this->load->model('Turno_model');
                    $data['all_turno'] = $this->Turno_model->get_all_turno();

                    $data['_view'] = 'inscripcion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The inscripcion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting inscripcion
     */
    function remove($inscripcion_id)
    {
        if($this->acceso(45)){
            $inscripcion = $this->Inscripcion_model->get_inscripcion($inscripcion_id);

            // check if the inscripcion exists before trying to delete it
            if(isset($inscripcion['inscripcion_id']))
            {
                $this->Inscripcion_model->delete_inscripcion($inscripcion_id);
                redirect('inscripcion/index');
            }
            else
                show_error('The inscripcion you are trying to delete does not exist.');
        }
    }
    
    function buscar_carrera(){
        
        $carrera_id = $this->input->post('carrera_id');
        $carrera = $this->Carrera_model->get_carrera_por_id($carrera_id);
        echo json_encode($carrera);
        
    }
        
    function buscar_nivel(){
        
        $carrera_id = $this->input->post('carrera_id');
        $nivel = $this->Nivel_model->get_nivel_por_carrera($carrera_id);
        echo json_encode($nivel);
        
    }
        
    function buscar_estudiante(){
        
        $parametro = $this->input->post('parametro');
        $estudiantes = $this->Inscripcion_model->get_estudiantes($parametro);
        echo json_encode($estudiantes);
        
    }
        
    function buscar_materias(){
        $nivel_id = $this->input->post('nivel_id');
        $materias = $this->Inscripcion_model->get_materias($nivel_id);
        echo json_encode($materias);
    }
        
    function registrar_inscripcion(){
        //$session_data = $this->session->userdata('logged_in');
        $usuario_id = $this->session_data['usuario_id'];
        $gestion_id = $this->session_data['gestion_id'];
        $this->load->model('Mensualidad_model');
        
        $estudiante_id = $this->input->post('estudiante_id');
        $paralelo_id = $this->input->post('paralelo_id');
        $nivel_id = $this->input->post('nivel_id');
        $turno_id = $this->input->post('turno_id');
        $inscripcion_fecha = date('Y-m-d');
        $inscripcion_hora = date('H:i:s');
        $inscripcion_fechainicio = $this->input->post('inscripcion_fechainicio');
        $carrera_id = $this->input->post('carrera_id');
        $inscripcion_glosa = $this->input->post('inscripcion_glosa');
        $pagar_matricula = $this->input->post('pagar_matricula');
        $pagar_mensualidad = $this->input->post('pagar_mensualidad');
        
        $paramsi = array(
            'usuario_id' => $usuario_id,
            'gestion_id' => $gestion_id,
            'estudiante_id' => $estudiante_id,
            'paralelo_id' => $paralelo_id,
            'nivel_id' => $nivel_id,
            'turno_id' => $turno_id,
            'inscripcion_fecha' => $inscripcion_fecha,
            'inscripcion_hora' => $inscripcion_hora,
            'inscripcion_fechainicio' => $inscripcion_fechainicio,
            'carrera_id' => $carrera_id,
            'inscripcion_glosa' => $inscripcion_glosa,
            );
        $inscripcion_id = $this->Inscripcion_model->add_inscripcion($paramsi);

        $kardexacad_notfinal1 = 0;
        $kardexacad_notfinal2 = 0;
        $kardexacad_notfinal3 = 0;
        $kardexacad_notfinal4 = 0;
        $kardexacad_notfinal5 = 0;
        $kardexacad_notfinal = 0;
        $kardexacad_estado = 1;
        
        $params = array(
            'inscripcion_id' => $inscripcion_id,
            'kardexacad_notfinal1' => $kardexacad_notfinal1,
            'kardexacad_notfinal2' => $kardexacad_notfinal2,
            'kardexacad_notfinal3' => $kardexacad_notfinal3,
            'kardexacad_notfinal4' => $kardexacad_notfinal4,
            'kardexacad_notfinal5' => $kardexacad_notfinal5,
            'kardexacad_notfinal' => $kardexacad_notfinal,
            'kardexacad_estado' => $kardexacad_estado,
            );
            $kardexacad_id = $this->Kardex_academico_model->add_kardex_academico($params);
        
        //Registro de kardex economico
        
        //$inscripcion_id = ;
        $estado_id = 1;
        $kardexeco_matricula = $this->input->post('inscripcion_matricula');
        $kardexeco_mensualidad = $this->input->post('inscripcion_mensualidad');
        $kardexeco_nummens = $this->input->post('carrera_nummeses');
        $kardexeco_observacion = $this->input->post('inscripcion_glosa');
        $kardexeco_fechainicio = $this->input->post('inscripcion_fechainicio');
        //$kardexeco_hora = $this->input->post('inscripcion_fechainicio');
        $kardexeco_fecha = date("Y-m-d");
        $kardexeco_hora  = date("H:i:s");
        /*if($pagar_matricula !=1){
            $kardexeco_matricula = 0;
        }*/
        $paramseco = array(
            'inscripcion_id' => $inscripcion_id,
            'estado_id' => $estado_id,
            'kardexeco_matricula' => $kardexeco_matricula,
            'kardexeco_mensualidad' => $kardexeco_mensualidad,
            'kardexeco_nummens' => $kardexeco_nummens,
            'kardexeco_observacion' => $kardexeco_observacion,
            'kardexeco_fecha' => $kardexeco_fecha,
            'kardexeco_hora' => $kardexeco_hora,
            );
        $kardexeco_id = $this->Kardex_economico_model->add_kardex_economico($paramseco);
        
        $intervalo = 30; //mensual
        //$dia_pago = date('d');
        $dia_pago = date("d", strtotime($kardexeco_fechainicio));
        
        $cuota_fechalimite = $kardexeco_fechainicio; // inicio de los pagos
                
        for ($i = 1; $i<=$kardexeco_nummens; $i++){
            
                       
            $estado_id = 3; // estado PENDIENTE
            
            $mes = date("m", strtotime($cuota_fechalimite));
            
            if($mes==1)  $nombremes = "ENERO";
            if($mes==2)  $nombremes = "FEBRERO";
            if($mes==3)  $nombremes = "MARZO";
            if($mes==4)  $nombremes = "ABRIL";
            if($mes==5)  $nombremes = "MAYO";
            if($mes==6)  $nombremes = "JUNIO";
            if($mes==7)  $nombremes = "JULIO";
            if($mes==8)  $nombremes = "AGOSTO";
            if($mes==9)  $nombremes = "SEPTIEMBRE";
            if($mes==10)  $nombremes = "OCTUBRE";
            if($mes==11)  $nombremes = "NOVIEMBRE";
            if($mes==12)  $nombremes = "DICIEMBRE";
            $anio = date("Y", strtotime($cuota_fechalimite));
            
            //$kardexeco_id = ;
            //$usuario_id = ;
            $mensualidad_numero = $i;
            $mensualidad_montoparcial = $kardexeco_mensualidad;
            $mensualidad_descuento = 0;
            $mensualidad_montototal = $kardexeco_mensualidad;
            $mensualidad_fechalimite = $cuota_fechalimite;
            $mensualidad_mora = 0;
            $mensualidad_montocancelado = 0;
            $mensualidad_saldo = 0;
            //$mensualidad_fechapago = ;
            //$mensualidad_horapago = ;
            //$mensualidad_nombre = ;
            //$mensualidad_ci = ;
            //$mensualidad_glosa = ;
            $mensualidad_numrec = 0;
            $mensualidad_mes = $nombremes."/".$anio;
            
            $sql = "insert into mensualidad(estado_id,kardexeco_id,usuario_id,mensualidad_numero,"
                    . "mensualidad_montoparcial,mensualidad_descuento,mensualidad_montototal,"
                    . "mensualidad_fechalimite,mensualidad_mora,mensualidad_montocancelado,"
                    . "mensualidad_saldo,mensualidad_numrec,mensualidad_mes) value(".
                    $estado_id.",".
                    $kardexeco_id.",".
                    $usuario_id.",".
                    $mensualidad_numero.",".
                    $mensualidad_montoparcial.",".
                    $mensualidad_descuento.",".
                    $mensualidad_montototal.",".
                    "'".$mensualidad_fechalimite."',".
                    $mensualidad_mora.",".
                    $mensualidad_montocancelado.",".
                    $mensualidad_saldo.",".                   
                    $mensualidad_numrec.",".
                    "'".$mensualidad_mes."')";
             $this->Inscripcion_model->ejecutar($sql);
             
            $cuota_fechalimitex = (time() + ($intervalo * $i * 24 * 60 * 60 ));
            $cuota_fechalimite = date('Y-m-'.$dia_pago, $cuota_fechalimitex);
        }
        
        if($pagar_matricula == 1){
            $this->load->model('Matricula_model');
            $paramspm = array(
                'inscripcion_id' => $inscripcion_id,
                'matricula_fechapago' => $kardexeco_fecha,
                'matricula_horapago' => $kardexeco_hora,
                //'matricula_fechalimite' => $kardexeco_mensualidad,
                'matricula_monto' => $kardexeco_matricula,
                'matricula_descuento' => 0,
                'matricula_total' => $kardexeco_matricula,
            );
            $matricula_id = $this->Matricula_model->add_matricula($paramspm);
        }elseif($pagar_matricula == 2){
            //$kardexeco_id
        }
        if($pagar_mensualidad >0){
            $estadomen_id = 4; //cancelado
            $this->load->model('Estudiante_model');
            $thisestudiante = $this->Estudiante_model->get_estudiante($estudiante_id);
            
            $thismensualidad = $this->Mensualidad_model->kardex_mensualidad($kardexeco_id);
            $cont = 0;
            for($i = 1; $i <= $pagar_mensualidad; $i++){
                $parampm = array(
                    'estado_id' => $estadomen_id,
                    'mensualidad_montocancelado' => $kardexeco_fecha,
                    'mensualidad_fechapago' => $kardexeco_fecha,
                    'mensualidad_horapago' => $kardexeco_hora,
                    'mensualidad_nombre' => $thisestudiante['estudiante_nombre']." ".$thisestudiante['estudiante_apellidos'],
                    'mensualidad_ci' => $thisestudiante['estudiante_ci'],
                    'mensualidad_glosa' => "Se pago al momento de inscribirse",
                );
                $this->Mensualidad_model->update_mensualidad($thismensualidad[$cont]['mensualidad_id'], $parampm);
                $cont++;
            }
        }
        
        $esfacturado = $this->input->post('esfactura');
        $esfactura_id = "";
        if($esfacturado=="si"){ //si la inscripcion es es facturada
            //$this->load->library('ControlCode');
            $this->load->model('Dosificacion_model');
            $dosificacion = $this->Dosificacion_model->get_dosificacion_activa();

            if (sizeof($dosificacion)>0){ //si existe una dosificacion activa
                
                $estado_id = 1;
                $fechahoy = date("Y-m-d");
                $total = $this->input->post('total_final');
                $descontar = $this->input->post('descuento');
                $venta_efectivo        = $this->input->post('total_final');
                $factura_fechaventa    = $fechahoy; //$this->input->post('mensualidad_fecha');
                $factura_fecha         = "date(now())";
                $factura_hora          = "time(now())";
                $factura_subtotal      = $total-$descontar;
                $factura_nit           = $this->input->post('nit');
                $factura_razonsocial   = $this->input->post('razon');
                $factura_ice           = 0;
                $factura_exento        = 0;
                $factura_descuento     = $descontar;
                $factura_total         = $total;
                $factura_numero        = $dosificacion[0]['dosificacion_numfact']+1;
                $factura_autorizacion  = $dosificacion[0]['dosificacion_autorizacion'];
                $factura_llave         = $dosificacion[0]['dosificacion_llave'];
                $factura_fechalimite   = $dosificacion[0]['dosificacion_fechalimite'];
                $factura_codigocontrol = $this->codigo_control($factura_llave, $factura_autorizacion, $factura_numero, $factura_nit, $factura_fechaventa, $factura_total);
                $factura_leyenda1       = $dosificacion[0]['dosificacion_leyenda1'];
                $factura_leyenda2       = $dosificacion[0]['dosificacion_leyenda2'];
                $factura_nitemisor     = $dosificacion[0]['dosificacion_nitemisor'];
                $factura_sucursal      = $dosificacion[0]['dosificacion_sucursal'];
                $factura_sfc           = $dosificacion[0]['dosificacion_sfc'];
                $factura_actividad     = $dosificacion[0]['dosificacion_actividad'];

                $sql = "update dosificacion set dosificacion_numfact = ".$factura_numero;
                $this->Mensualidad_model->ejecutar($sql);
                             
                $sql = "insert into factura(estado_id, servicio_id, factura_fechaventa, 
                    factura_fecha, factura_hora, factura_subtotal, 
                    factura_ice, factura_exento, factura_descuento, factura_total, 
                    factura_numero, factura_autorizacion, factura_llave, 
                    factura_fechalimite, factura_codigocontrol, factura_leyenda1, factura_leyenda2,
                    factura_nit, factura_razonsocial, factura_nitemisor, factura_sucursal, factura_sfc, factura_actividad,
                    usuario_id, tipotrans_id, factura_efectivo, factura_cambio) value(".
                    $estado_id.",".$inscripcion_id.",'".$factura_fechaventa."',".
                    $factura_fecha.",".$factura_hora.",".$factura_subtotal.",".
                    $factura_ice.",".$factura_exento.",".$factura_descuento.",".$factura_total.",".
                    $factura_numero.",".$factura_autorizacion.",'".$factura_llave."','".
                    $factura_fechalimite."','".$factura_codigocontrol."','".$factura_leyenda1."','".$factura_leyenda2."',".
                    $factura_nit.",'".$factura_razonsocial."','".$factura_nitemisor."','".
                    $factura_sucursal."','".$factura_sfc."','".$factura_actividad."',".
                    $usuario_id.",1,".$venta_efectivo.",0)";

                $factura_id = $this->Mensualidad_model->ejecutar($sql);
                $esfactura_id = $factura_id;
            
            $producto_id = 0;
            $cantidad = 1;
            $detallefact_codigo = "-";
            $detallefact_cantidad = $cantidad;
            $cadena = "";
            if($pagar_mensualidad >0){
                if($pagar_mensualidad == 1){
                    $cadena = "MENSUALIDAD ".$pagar_mensualidad;
                }else{
                    $cadena = "MENSUALIDADES ".$pagar_mensualidad;
                }
            }
            $this->load->model('Carrera_model');
            $carrera = $this->Carrera_model->get_carrera($carrera_id);
            $this->load->model('Estudiante_model');
            $elestudiante = $this->Estudiante_model->get_estudiante($estudiante_id);
            $masdetalle = "INSCRIPCION, ".$cadena.", ".$carrera["carrera_nombre"].", ".$elestudiante["estudiante_nombre"]." ".$elestudiante["estudiante_apellidos"];
            $eslaglosa = $this->input->post('inscripcion_glosa');
            if($eslaglosa == ""){
                $eslaglosa = "";
            }else{ $eslaglosa = ", ".$eslaglosa; }
            $detallefact_descripcion = $masdetalle.$eslaglosa;
            $unidad = "";
            
            $precio = $total-$descontar;
            $detallefact_precio = $precio;
            $detallefact_subtotal =  $precio;
            $detallefact_descuento = 0;
            $detallefact_total = $factura_subtotal;
            $detallefact_preferencia =  "";
            $detallefact_caracteristicas = "";
            
            $sql =  "insert into detalle_factura(
            producto_id,
            factura_id,
            detallefact_codigo,
            detallefact_unidad,
            detallefact_cantidad,            
            detallefact_descripcion,
            detallefact_precio,
            detallefact_subtotal,
            detallefact_descuento,
            detallefact_total,                
            detallefact_preferencia,
            detallefact_caracteristicas)
            
            value(
            ".$producto_id.",
            ".$factura_id.",
            '".$detallefact_codigo."',
            '".$unidad."',
            ".$detallefact_cantidad.",            
            '".$detallefact_descripcion."',
            ".$detallefact_precio.",
            ".$detallefact_subtotal.",
            ".$detallefact_descuento.",
            ".$detallefact_total.",                
            '".$detallefact_preferencia."',
            '".$detallefact_caracteristicas."')";

            $this->Mensualidad_model->ejecutar($sql);           
            }
        }
        $datos= array($kardexacad_id, $esfactura_id);
        echo json_encode($datos);
    }
    
    function getname_grupo(){
        $materia_id = $this->input->post('materia_id');
        $materias = $this->Inscripcion_model->get_grupomateria($materia_id);
        echo json_encode($materias);
    }
    
    function registrar_matasignada(){
        $this->load->model('Materia_model');
        $this->load->model('Materia_asignada_model');
        $kardexacad_id = $this->input->post('kardexacad_id');
        $materia_id    = $this->input->post('materia_id');
        $grupo_id      = $this->input->post('grupo_id');
        $materia = $this->Materia_model->get_materia($materia_id);
        $estado_id = 1;
        $params = array(
            'estado_id' => $estado_id,
            'kardexacad_id' => $kardexacad_id,
            'materiaasig_nombre' => $materia['materia_nombre'],
            'materiaasig_codigo' => $materia['materia_codigo'],
            'materia_id' => $materia_id,
            'grupo_id' => $grupo_id,
            );
            $materiaasig_id = $this->Materia_asignada_model->add_materia_asignada($params);
        echo json_encode("ok");
    }
    
    function ultima_inscripcion()
    {   
        if($this->acceso(45)){
            $data['inscripcion'] = $this->Inscripcion_model->get_ultima_inscripcion();
            $data['institucion'] = $this->Institucion_model->get_all_institucion();

            $data['_view'] = 'inscripcion/comprobante';
            $this->load->view('layouts/main',$data);
        }
    }
    function codigo_control($dosificacion_llave, $dosificacion_autorizacion, $dosificacion_numfact, $nit,$fecha_trans, $monto)
    {
        //include 'ControlCode.php';
        $code = $this->controlcode->generate($dosificacion_autorizacion,//Numero de autorizacion
                                           $dosificacion_numfact,//Numero de factura
                                           $nit,//Número de Identificación Tributaria o Carnet de Identidad
                                           str_replace('-','',$fecha_trans),//fecha de transaccion de la forma AAAAMMDD
                                           $monto,//Monto de la transacción
                                           $dosificacion_llave//Llave de dosificación
                                    );
         return $code;
    }
    
    
}
