<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Administrativo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Administrativo_model');
        $this->load->model('Usuario_model');
    } 
    
    /*
     * Listing of administrativo
     */
    function index()
    {
        $data['administrativo'] = $this->Administrativo_model->get_all_administrativo();
        
        $data['_view'] = 'administrativo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new administrativo
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('administrativo_nombre','Administrativo Nombre','required');
		$this->form_validation->set_rules('administrativo_apellidos','Administrativo Apellidos','required');
		
		if($this->form_validation->run())     
        {   
             /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['administrativo_foto']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/usuarios/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 200000;
                        $config['max_width'] = 2900;
                        $config['max_height'] = 2900;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('administrativo_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/usuarios/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }
            /* *********************FIN imagen***************************** */
            $ci = $this->input->post('administrativo_ci');
            
            $cargo = $this->input->post('administrativo_cargo');
            if ($cargo == 3){
                $administrativo_cargo = 'ADMINISTRATIVO';
                $login = 'adm'.$ci;
            }
            if ($cargo == 4){
                $administrativo_cargo = 'SECRETARIA';
                $login = 'sec'.$ci;
            }
             $nombre = $this->input->post('administrativo_nombre');
            $apellido = $this->input->post('administrativo_apellidos');
            $name = $nombre." ".$apellido;
            $params = array(
                'tipousuario_id' => $cargo,
                'estado_id' => 1,
                'usuario_nombre' => $name,
                'usuario_email' => $this->input->post('administrativo_email'),
                'usuario_login' => $login,
                'usuario_clave' => md5($this->input->post('administrativo_ci')),
                'usuario_imagen' => $foto,
                
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            $params = array(
				'estado_id' => 1,
				'estadocivil_id' => $this->input->post('estadocivil_id'),
				'institucion_id' => $this->input->post('institucion_id'),
				'genero_id' => $this->input->post('genero_id'),
				'administrativo_nombre' => $this->input->post('administrativo_nombre'),
				'administrativo_apellidos' => $this->input->post('administrativo_apellidos'),
				'administrativo_fechanac' => $this->input->post('administrativo_fechanac'),
				'administrativo_edad' => $this->input->post('administrativo_edad'),
				'administrativo_ci' => $this->input->post('administrativo_ci'),
				'administrativo_extci' => $this->input->post('administrativo_extci'),
				'administrativo_codigo' => $this->input->post('administrativo_codigo'),
				'administrativo_direccion' => $this->input->post('administrativo_direccion'),
				'administrativo_telefono' => $this->input->post('administrativo_telefono'),
				'administrativo_celular' => $this->input->post('administrativo_celular'),
				'administrativo_cargo' => $administrativo_cargo,
				'administrativo_foto' => $foto,
				'administrativo_fechareg' => $this->input->post('administrativo_fechareg'),
                'administrativo_email' => $this->input->post('administrativo_email'),
                'usuario_id' => $usuario_id,
            );
            
            $administrativo_id = $this->Administrativo_model->add_administrativo($params);
           
            redirect('administrativo/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$this->load->model('Estado_civil_model');
			$data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

			$this->load->model('Institucion_model');
			$data['all_institucion'] = $this->Institucion_model->get_all_institucion();

			$this->load->model('Genero_model');
			$data['all_genero'] = $this->Genero_model->get_all_genero();
            
            $data['_view'] = 'administrativo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a administrativo
     */
    function edit($administrativo_id)
    {
        // check if the administrativo exists before trying to edit it
        $data['administrativo'] = $this->Administrativo_model->get_administrativo($administrativo_id);
        
        if(isset($data['administrativo']['administrativo_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('administrativo_nombre','Administrativo Nombre','required');
			$this->form_validation->set_rules('administrativo_apellidos','Administrativo Apellidos','required');
		
			if($this->form_validation->run())     
            {   
                                /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('administrativo_foto1');
                if (!empty($_FILES['administrativo_foto']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/usuarios/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 200000;
                    $config['max_width'] = 2900;
                    $config['max_height'] = 2900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('administrativo_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/usuarios/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    //$directorio = base_url().'resources/imagenes/';
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/siaac_web/resources/images/usuarios/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 50;
                    $confi['height'] = 50;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
            $ci = $this->input->post('administrativo_ci');
            $cargo = $this->input->post('administrativo_cargo');
            if ($cargo == 3){
                $administrativo_cargo = 'ADMINISTRATIVO';
                 $login = 'adm'.$ci;
            }
            if ($cargo == 4){
                $administrativo_cargo = 'SECRETARIA';
                 $login = 'sec'.$ci;
            }
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'estadocivil_id' => $this->input->post('estadocivil_id'),
					'institucion_id' => $this->input->post('institucion_id'),
					'genero_id' => $this->input->post('genero_id'),
					'administrativo_nombre' => $this->input->post('administrativo_nombre'),
					'administrativo_apellidos' => $this->input->post('administrativo_apellidos'),
					'administrativo_fechanac' => $this->input->post('administrativo_fechanac'),
					'administrativo_edad' => $this->input->post('administrativo_edad'),
					'administrativo_ci' => $this->input->post('administrativo_ci'),
					'administrativo_extci' => $this->input->post('administrativo_extci'),
					'administrativo_codigo' => $this->input->post('administrativo_codigo'),
					'administrativo_direccion' => $this->input->post('administrativo_direccion'),
					'administrativo_telefono' => $this->input->post('administrativo_telefono'),
					'administrativo_celular' => $this->input->post('administrativo_celular'),
					'administrativo_cargo' => $administrativo_cargo,
					'administrativo_foto' => $foto,
					'administrativo_fechareg' => $this->input->post('administrativo_fechareg'),
                    'administrativo_email' => $this->input->post('administrativo_email'),
                );

                $this->Administrativo_model->update_administrativo($administrativo_id,$params);
                $usuario_id = $this->input->post('usuario_id');
                $nombre = $this->input->post('administrativo_nombre');
                $apellido = $this->input->post('administrativo_apellidos');
                $name = $nombre." ".$apellido;
                $params = array(
                'tipousuario_id' => $cargo,
                'estado_id' => $this->input->post('estado_id'),
                'usuario_nombre' => $name,
                'usuario_email' => $this->input->post('administrativo_email'),
                'usuario_login' => $login,
                'usuario_clave' => md5($this->input->post('administrativo_ci')),
                'usuario_imagen' => $foto,
               
            );
                $this->Usuario_model->update_usuario($usuario_id,$params);
          
                redirect('administrativo/index');
            }
            else
            {
				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

				$this->load->model('Estado_civil_model');
				$data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

				$this->load->model('Institucion_model');
				$data['all_institucion'] = $this->Institucion_model->get_all_institucion();

				$this->load->model('Genero_model');
				$data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['_view'] = 'administrativo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The administrativo you are trying to edit does not exist.');
    } 

    /*
     * Deleting administrativo
     */
    function remove($administrativo_id)
    {
        $administrativo = $this->Administrativo_model->get_administrativo($administrativo_id);

        // check if the administrativo exists before trying to delete it
        if(isset($administrativo['administrativo_id']))
        {
            $this->Administrativo_model->delete_administrativo($administrativo_id);
            redirect('administrativo/index');
        }
        else
            show_error('The administrativo you are trying to delete does not exist.');
    }
    
}
