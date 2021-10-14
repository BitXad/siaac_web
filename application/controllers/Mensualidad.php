<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Mensualidad extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensualidad_model');
        $this->load->model('Parametro_model');
        $this->load->model('Institucion_model');
        $this->load->model('Kardex_economico_model');
        $this->load->model('Dosificacion_model');
        $this->load->helper('numeros');
        $this->load->library('ControlCode');
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
     * Listing of mensualidad
     */
    function index()
    {
        if($this->acceso(34)){
            $data['mensualidad'] = $this->Mensualidad_model->get_all_mensualidad();
            $data['_view'] = 'mensualidad/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function mensualidad($kardexeco_id)
    {
        if($this->acceso(34)){
            $mens_pendientes = $this->Mensualidad_model->get_pendientes($kardexeco_id);
            $parametro_id = 1;
            $esteparametro = $this->Parametro_model->get_parametro($parametro_id);
            if (isset($mens_pendientes)) {
                foreach ($mens_pendientes as $mens) {
                $hoy = new DateTime('NOW');
                $fechalimite = new DateTime($mens['mensualidad_fechalimite']); 
                
                
                    if ($hoy>$fechalimite) {
                        $diff = $hoy->diff($fechalimite);
                        $dias =  $diff->days;
                        $multa = $dias*$esteparametro['parametro_multadia'];  //esto hay que parametrizar
                        $sql = "UPDATE mensualidad SET mensualidad_mora = ".$dias.", mensualidad_multa = ".$multa."  WHERE mensualidad_id = ".$mens['mensualidad_id']." ";
                        $this->db->query($sql);
                    }
                }
            }
            $data["parametro_formaimagen"] = $esteparametro["parametro_formaimagen"];
            $data['mensualidad'] = $this->Mensualidad_model->kardex_mensualidad($kardexeco_id);
            $data['kardex_economico'] = $this->Kardex_economico_model->get_datos_kardex($kardexeco_id);
            $data['dosificacion'] = $this->Dosificacion_model->get_dosificacion_activa();
            $data['creditos'] = $this->Mensualidad_model->get_credito_cliente($kardexeco_id);
            $data['_view'] = 'mensualidad/mensualidades';
            $this->load->view('layouts/main',$data);
        }
    }

    function planmensualidad($kardexeco_id)
    {
        if($this->acceso(49)){
            $data['mensualidad'] = $this->Mensualidad_model->kardex_mensualidad($kardexeco_id);
            $data['kardex_economico'] = $this->Kardex_economico_model->get_datos_kardex($kardexeco_id);
            $data['institucion'] = $this->Institucion_model->get_institucion(1);
            $data['_view'] = 'mensualidad/planmensualidad';
            $this->load->view('layouts/main',$data);
        }
    }

    function comprobante($mensualidad_id)
    {
        $tipo_facturadora = $this->Parametro_model->get_parametro_impresora(1);
        if ($tipo_facturadora['parametro_tipoimpresora']=='NORMAL') {
            redirect('mensualidad/carta/'.$mensualidad_id);
        }else{
            redirect('mensualidad/boucher/'.$mensualidad_id);
        }
    }

    function boucher($mensualidad_id)
    {
        if($this->acceso(49)){
            $data['mensualidad'] = $this->Mensualidad_model->boucher_mensualidad($mensualidad_id);
            $data['institucion'] = $this->Institucion_model->get_institucion(1);
            $data['parametro'] = $this->Parametro_model->get_parametros();
            $data['_view'] = 'mensualidad/boucher';
            $this->load->view('layouts/main',$data);
        }
    }

    function carta($mensualidad_id)
    {   
        if($this->acceso(45)){
            $data['mensualidad'] = $this->Mensualidad_model->boucher_mensualidad($mensualidad_id);
            $data['institucion'] = $this->Institucion_model->get_institucion(1);

            $data['_view'] = 'mensualidad/carta';
            $this->load->view('layouts/main',$data);
        }
    }

    function buscarpension($grupo)
    {
        if($this->acceso(34)){
            $data['mensualidad'] = $this->Mensualidad_model->grupo_mensualidad($grupo);
            $data['pensiones'] = $this->Mensualidad_model->geta_mensualidades();
            $data['sumas'] = $this->Mensualidad_model->suma_mensualidades();
            $data['institucion'] = $this->Institucion_model->get_institucion(1);
            $data['_view'] = 'mensualidad/registropensiones';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * Adding a new mensualidad
     */
    function add()
    {
        if($this->acceso(34)){
            $usuario_id = $this->session_data['usuario_id'];
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'kardexeco_id' => $this->input->post('kardexeco_id'),
                    'usuario_id' => $usuario_id,
                    'mensualidad_numero' => $this->input->post('mensualidad_numero'),
                    'mensualidad_montoparcial' => $this->input->post('mensualidad_montoparcial'),
                    'mensualidad_descuento' => $this->input->post('mensualidad_descuento'),
                    'mensualidad_montototal' => $this->input->post('mensualidad_montototal'),
                    'mensualidad_fechalimite' => $this->input->post('mensualidad_fechalimite'),
                    'mensualidad_mora' => $this->input->post('mensualidad_mora'),
                    'mensualidad_montocancelado' => $this->input->post('mensualidad_montocancelado'),
                    'mensualidad_saldo' => $this->input->post('mensualidad_saldo'),
                    'mensualidad_fechapago' => $this->input->post('mensualidad_fechapago'),
                    'mensualidad_horapago' => $this->input->post('mensualidad_horapago'),
                    'mensualidad_nombre' => $this->input->post('mensualidad_nombre'),
                    'mensualidad_ci' => $this->input->post('mensualidad_ci'),
                    'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),
                );

                $mensualidad_id = $this->Mensualidad_model->add_mensualidad($params);
                redirect('mensualidad/index');
            }
            else
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Kardex_economico_model');
                $data['all_kardex_economico'] = $this->Kardex_economico_model->get_all_kardex_economico();

                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'mensualidad/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  


    function nueva($kardexeco_id)
    {
        if($this->acceso(34)){
            $usuario_id = $this->session_data['usuario_id'];
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'estado_id' => 8,
                    'kardexeco_id' => $kardexeco_id,
                    'usuario_id' => $usuario_id,
                    'mensualidad_numero' => $this->input->post('mensualidad_numero'),
                    'mensualidad_montoparcial' => $this->input->post('mensualidad_montoparcial'),
                    'mensualidad_descuento' => 0,
                    'mensualidad_montototal' => $this->input->post('mensualidad_montoparcial'),
                    'mensualidad_fechalimite' => $this->input->post('mensualidad_fechalimite'),
                    'mensualidad_mes' => $this->input->post('mensualidad_mes'),
                    'mensualidad_mora' => 0,
                    'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),

                );

                $mensualidad_id = $this->Mensualidad_model->add_mensualidad($params);
                redirect('mensualidad/mensualidad/'.$kardexeco_id);
            }
            else
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Kardex_economico_model');
                $data['all_kardex_economico'] = $this->Kardex_economico_model->get_all_kardex_economico();

                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'mensualidad/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  
    /*
     * Editing a mensualidad
     */
    function edit($mensualidad_id)
    {
        if($this->acceso(34)){
            // check if the mensualidad exists before trying to edit it
            $data['mensualidad'] = $this->Mensualidad_model->get_mensualidad($mensualidad_id);

            if(isset($data['mensualidad']['mensualidad_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'estado_id' => $this->input->post('estado_id'),
                        'kardexeco_id' => $this->input->post('kardexeco_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'mensualidad_numero' => $this->input->post('mensualidad_numero'),
                        'mensualidad_montoparcial' => $this->input->post('mensualidad_montoparcial'),
                        'mensualidad_descuento' => $this->input->post('mensualidad_descuento'),
                        'mensualidad_montototal' => $this->input->post('mensualidad_montototal'),
                        'mensualidad_fechalimite' => $this->input->post('mensualidad_fechalimite'),
                        'mensualidad_mora' => $this->input->post('mensualidad_mora'),
                        'mensualidad_montocancelado' => $this->input->post('mensualidad_montocancelado'),
                        'mensualidad_saldo' => $this->input->post('mensualidad_saldo'),
                        'mensualidad_fechapago' => $this->input->post('mensualidad_fechapago'),
                        'mensualidad_horapago' => $this->input->post('mensualidad_horapago'),
                        'mensualidad_nombre' => $this->input->post('mensualidad_nombre'),
                        'mensualidad_ci' => $this->input->post('mensualidad_ci'),
                        'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),
                    );

                    $this->Mensualidad_model->update_mensualidad($mensualidad_id,$params);            
                    redirect('mensualidad/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $this->load->model('Kardex_economico_model');
                    $data['all_kardex_economico'] = $this->Kardex_economico_model->get_all_kardex_economico();

                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $data['_view'] = 'mensualidad/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The mensualidad you are trying to edit does not exist.');
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

     function pagar($mensualidad_id)
    {
        if($this->acceso(48)){
            $usuario_id = $this->session_data['usuario_id'];
            $gestion = $this->session_data['gestion_id'];
            $numrec = $this->Mensualidad_model->numero($gestion);
            $numero = $numrec[0]['gestion_numingreso'] + 1;
            $mensualidad_id = $this->input->post('mensualidad_id');
            $kardexeco_id = $this->input->post('kardexeco_id');
            $mensualidad_saldo = $this->input->post('mensualidad_saldo');
            $dias_mora = 0;
            $descuento = 0;
            $cancelado = 0;
            $mes = $this->input->post('mensualidad_mes');
            $fechalimite  = $this->input->post('mensualidad_fechalimite');
            $mensualidad_fechalimite = "'".$fechalimite."'";
            $mensualidad_montoparcial = $this->input->post('mensualidad_saldo');
            $mensualidad_numero = $this->input->post('mensualidad_numero1');
            $total = $this->input->post('mensualidad_montototal');
            $descontar = $this->input->post('mensualidad_descuento');
            $detalle_descuento = $this->input->post('detalle_descuento');
            $params = array(
                'usuario_id' => $usuario_id,
                'estado_id' => 9,
                
                'mensualidad_descuento' => $this->input->post('mensualidad_descuento'),
                //'mensualidad_montototal' => $total-$descontar,
                'mensualidad_montototal' => $this->input->post('mensualidad_montocancelado'),
                'mensualidad_montocancelado' => $this->input->post('mensualidad_montocancelado'),
                'mensualidad_fechapago' => $this->input->post('mensualidad_fecha'),
                'mensualidad_horapago' => $this->input->post('mensualidad_hora'),
                'mensualidad_nombre' => $this->input->post('mensualidad_nombre'),
                'mensualidad_ci' => $this->input->post('mensualidad_ci'),
                'mensualidad_glosa' => $this->input->post('mensualidad_glosa'),
                'mensualidad_saldo' => $this->input->post('mensualidad_saldo'),
                'mensualidad_numrec' => $numero,
            );
            $this->Mensualidad_model->update_mensualidad($mensualidad_id,$params);

            $sql = "UPDATE gestion SET gestion_numingreso=gestion_numingreso+1 WHERE gestion_id = ".$gestion.""; 
            $this->db->query($sql);

            $facturado = $this->input->post('factura'.$mensualidad_id);
            if($facturado=="on"){ //si la venta es facturada

                $dosificacion = $this->Dosificacion_model->get_dosificacion_activa();

  //          if (sizeof($dosificacion)>0){ //si existe una dosificacion activa
                
                $estado_id = 1; 
                
                $venta_efectivo    = $this->input->post('mensualidad_montocancelado');
                $factura_fechaventa    = $this->input->post('mensualidad_fecha');
                $factura_fecha         = "date(now())";
                $factura_hora          = "time(now())";
                //$factura_subtotal      = $total;
                $factura_subtotal      = $this->input->post('mensualidad_montocancelado') + $descontar;
                $factura_nit           = $this->input->post('mensualidad_ci');
                $factura_razonsocial   = $this->input->post('mensualidad_nombre');
                $factura_ice           = 0;
                $factura_exento        = 0;
                $factura_descuento     = $descontar;
                //$factura_total         = $total-$descontar;
                $factura_total         = $this->input->post('mensualidad_montocancelado');
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
                
                $tamllave = substr($factura_llave, -1);
                //var_dump($tamllave); $tamllave."QQ";
                //break;
                if("$tamllave" === chr(92)){ $factura_llave = $factura_llave."\\"; }
                //$factura_llave = $factura_llave."\\";
                $sql = "insert into factura(estado_id, mensualidad_id, factura_fechaventa, 
                    factura_fecha, factura_hora, factura_subtotal, 
                    factura_ice, factura_exento, factura_descuento, factura_total, 
                    factura_numero, factura_autorizacion, factura_llave, 
                    factura_fechalimite, factura_codigocontrol, factura_leyenda1, factura_leyenda2,
                    factura_nit, factura_razonsocial, factura_nitemisor, factura_sucursal, factura_sfc, factura_actividad,
                    usuario_id, tipotrans_id, factura_efectivo, factura_cambio) value(".
                    $estado_id.",".$mensualidad_id.",'".$factura_fechaventa."',".
                    $factura_fecha.",".$factura_hora.",".$factura_subtotal.",".
                    $factura_ice.",".$factura_exento.",".$factura_descuento.",".$factura_total.",".
                    $factura_numero.",".$factura_autorizacion.",'".$factura_llave."','".
                    $factura_fechalimite."','".$factura_codigocontrol."','".$factura_leyenda1."','".$factura_leyenda2."',".
                    $factura_nit.",'".$factura_razonsocial."','".$factura_nitemisor."','".
                    $factura_sucursal."','".$factura_sfc."','".$factura_actividad."',".
                    $usuario_id.",1,".$venta_efectivo.",0)";

                $factura_id = $this->Mensualidad_model->ejecutar($sql);
               
            
            $producto_id = 0;
            $cantidad = 1;
            $detallefact_codigo = "MENS002";
            $detallefact_cantidad = $cantidad;
            $detallefact_descripcion = $this->input->post('factura_detalle'.$mensualidad_id);
            $unidad = "";
            
            $precio = ($this->input->post('mensualidad_montocancelado'));
            $detallefact_precio = $precio;
            $detallefact_subtotal =  $precio;
            $detallefact_descuento = $descontar;
            //$detallefact_total = $factura_subtotal;
            $detallefact_total = $this->input->post('mensualidad_montocancelado');
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

            if ($descontar>0){

                $producto_id = 0;
                $cantidad = 0;
                $detallefact_codigo = "DESC001";
                $detallefact_cantidad = $cantidad;
                $detallefact_descripcion = $this->input->post('factura_detalle'.$mensualidad_id);
                $unidad = "";

                $precio = ($this->input->post('mensualidad_montocancelado'));
                $detallefact_precio = $descontar * -1;
                $detallefact_subtotal =  $descontar * -1;
                $detallefact_descuento = 0;
                //$detallefact_total = $factura_subtotal;
                $detallefact_total = $descontar * -1;
                $detallefact_preferencia =  "";
                $detallefact_caracteristicas = "";
                $detallefact_descripcion = $detalle_descuento;

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

            if($mensualidad_saldo>0){ 
                $this->Mensualidad_model->parcial_mensualidad($kardexeco_id,$descuento,$cancelado,$fechalimite,$mensualidad_fechalimite,$mensualidad_montoparcial,$mensualidad_numero,$usuario_id,$mes); 
            }
             redirect('mensualidad/mensualidad/'.$kardexeco_id);  
        }
    }

    function pendiente($mensualidad_id,$kardexeco_id,$descuento,$numero)
    {
        if($this->acceso(34)){
            $ptq="DELETE FROM mensualidad WHERE mensualidad_numero = ".$numero." and mensualidad_id > ".$mensualidad_id." and kardexeco_id=".$kardexeco_id." and estado_id=8 ";
            $this->db->query($ptq);
            $sql = "UPDATE mensualidad SET estado_id=8,mensualidad_montocancelado=0,mensualidad_montototal=mensualidad_montototal+".$descuento.", mensualidad_fechapago=NULL,mensualidad_saldo=0,mensualidad_descuento=0, mensualidad_nombre='',mensualidad_ci='',mensualidad_horapago=NULL WHERE mensualidad.mensualidad_id=".$mensualidad_id." and mensualidad.kardexeco_id=".$kardexeco_id." ";
            $this->db->query($sql);
            
            redirect('mensualidad/mensualidad/'.$kardexeco_id);
        }
    }

    /*
     * Deleting mensualidad
     */
    function remove($mensualidad_id,$kardexeco_id)
    {
        if($this->acceso(34)){
            $mensualidad = $this->Mensualidad_model->get_mensualidad($mensualidad_id);
            // check if the mensualidad exists before trying to delete it
            if(isset($mensualidad['mensualidad_id']))
            {
                $this->Mensualidad_model->delete_mensualidad($mensualidad_id);
                redirect('mensualidad/mensualidad/'.$kardexeco_id); 
            }
            else
                show_error('The mensualidad you are trying to delete does not exist.');
        }
    }
    function planmensualidadest($kardexeco_id, $estudiante_id)
    {
        // para el menu de estudiantes
        if($this->acceso(135)){
            //usuario_id ===>id de estudiante
            $usuario_id = $this->session_data['usuario_id'];
            if($estudiante_id == $usuario_id){
                $data['mensualidad'] = $this->Mensualidad_model->kardex_mensualidad($kardexeco_id);
                $data['kardex_economico'] = $this->Kardex_economico_model->get_datos_kardex($kardexeco_id);
                $data['institucion'] = $this->Institucion_model->get_institucion(1);
                $data['_view'] = 'mensualidad/planmensualidadest';
                $this->load->view('layouts/main',$data);
            }else{
                $data['_view'] = 'login/mensajeacceso';
                $this->load->view('layouts/main',$data);
            }
        }
    }
    
}
