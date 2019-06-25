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
        $this->load->model('Carrera_model');
        $this->load->model('Nivel_model');
        $this->load->model('Kardex_economico_model');
        
       
    } 

    /*
     * Listing of inscripcion
     */
    function index()
    {
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

    /*
     * Adding a new inscripcion
     */
    function add()
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

    /*
     * Adding a new inscripcion
     */
    function inscribir($estudiante_id)
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
            
            $inscripcion_id = $this->Inscripcion_model->add_inscripcion($params);
            redirect('inscripcion/index');
        }
        else
        {
			
            
                        $this->load->model('Carrera_model');
			$data['all_carrera'] = $this->Carrera_model->get_all_carrera();

//			$this->load->model('Usuario_model');
//			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Gestion_model');
			$data['all_gestion'] = $this->Gestion_model->get_all_gestion();

			$this->load->model('Estudiante_model');
			
                        if ($estudiante_id>0)                        
                            $data['estudiante'] = $this->Estudiante_model->get_estudiante_por_id($estudiante_id);
                        else
                            $data['estudiante'] = $this->Estudiante_model->get_estudiante_temporal();
                        
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

    /*
     * Editing a inscripcion
     */
    function edit($inscripcion_id)
    {   
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

    /*
     * Deleting inscripcion
     */
    function remove($inscripcion_id)
    {
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

        $session_data = $this->session->userdata('logged_in');
        $usuario_id = $session_data['usuario_id'];
        $gestion_id = $session_data['gestion_id'];
        
        $estudiante_id = $this->input->post('estudiante_id');
        $paralelo_id = $this->input->post('paralelo_id');
        $nivel_id = $this->input->post('nivel_id');
        $turno_id = $this->input->post('turno_id');
        $inscripcion_fecha = date('Y-m-d');
        $inscripcion_hora = date('H:t:s');
        $inscripcion_fechainicio = $this->input->post('inscripcion_fechainicio');
        $carrera_id = $this->input->post('carrera_id');
        $inscripcion_glosa = $this->input->post('inscripcion_glosa');
        
        $sql = "insert into inscripcion(usuario_id,gestion_id,estudiante_id,"
                . "paralelo_id,nivel_id,turno_id,inscripcion_fecha,inscripcion_hora,"
                . "inscripcion_fechainicio,carrera_id,inscripcion_glosa) value(".
                $usuario_id.",".
                $gestion_id.",".
                $estudiante_id.",".
                $paralelo_id.",".
                $nivel_id.",".
                $turno_id.",".
                "'".$inscripcion_fecha."',".
                "'".$inscripcion_hora."',".
                "'".$inscripcion_fechainicio."',".
                $carrera_id.",".
                "'".$inscripcion_glosa."')";       
        $this->Inscripcion_model->ejecutar($sql);        
        
        //Registro de kardek académico
       
        $res = $this->Inscripcion_model->ultima_inscripcion();
        
        $inscripcion_id = $res[0]["inscripcion_id"];
        $kardexacad_notfinal1 = 0;
        $kardexacad_notfinal2 = 0;
        $kardexacad_notfinal3 = 0;
        $kardexacad_notfinal4 = 0;
        $kardexacad_notfinal5 = 0;
        $kardexacad_notfinal = 0;
        $kardexacad_estado = 1;
        
        $sql = "insert into kardex_academico(inscripcion_id,kardexacad_notfinal1,"
                . "kardexacad_notfinal2,kardexacad_notfinal3,kardexacad_notfinal4,"
                . "kardexacad_notfinal5,kardexacad_notfinal,kardexacad_estado) value(".
                $inscripcion_id.",".
                $kardexacad_notfinal1.",".
                $kardexacad_notfinal2.",".
                $kardexacad_notfinal3.",".
                $kardexacad_notfinal4.",".
                $kardexacad_notfinal5.",".
                $kardexacad_notfinal.",".
                $kardexacad_estado.")";
        $this->Inscripcion_model->ejecutar($sql);

        //Registro de kardex economico
        
        //$inscripcion_id = ;
        $estado_id = 1;
        $kardexeco_matricula = $this->input->post('inscripcion_matricula');
        $kardexeco_mensualidad = $this->input->post('inscripcion_mensualidad');
        $kardexeco_nummens = $this->input->post('carrera_nummeses');
        $kardexeco_observacion = $this->input->post('inscripcion_glosa');
        $kardexeco_fechainicio = $this->input->post('inscripcion_fechainicio');
        //$kardexeco_hora = $this->input->post('inscripcion_fechainicio');
        
        $sql = "insert into kardex_economico(inscripcion_id,estado_id,kardexeco_matricula,"
                . "kardexeco_mensualidad,kardexeco_nummens,kardexeco_observacion,kardexeco_fecha) value(".
                $inscripcion_id.",".
                $estado_id.",".
                $kardexeco_matricula.",".
                $kardexeco_mensualidad.",".
                $kardexeco_nummens.",".
                "'".$kardexeco_observacion."',".
                "'".$kardexeco_fecha."')";
        
        $kardexeco_id = $this->Kardex_economico_model->registrar_kardex($sql);
        
        $intervalo = 30; //mensual
        //$dia_pago = date('d');
        $dia_pago = date("d", strtotime($kardexeco_fechainicio));
        
        $cuota_fechalimite = $kardexeco_fechainicio; // inicio de los pagos
                
        for ($i = 1; $i<=$kardexeco_nummens; $i++){
            
                       
            $estado_id = 3;
            
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
        
        return true;
    }
    
    
}
