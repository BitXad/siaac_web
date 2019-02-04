<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Docente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Docente_model');
    } 

    /*
     * Listing of docente
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('docente/index?');
        $config['total_rows'] = $this->Docente_model->get_all_docente_count();
        $this->pagination->initialize($config);

        $data['docente'] = $this->Docente_model->get_all_docente($params);
        
        $data['_view'] = 'docente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new docente
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['docente_foto']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/docentes/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 200000;
                        $config['max_width'] = 2900;
                        $config['max_height'] = 2900;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('docente_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/docentes/';
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
                        $confi['source_image'] = './resources/images/docentes/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/docentes/'."thumb_".$new_name.$extension;
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
            $params = array(
				'estado_id' => 1,
				'genero_id' => $this->input->post('genero_id'),
				'docente_nombre' => $this->input->post('docente_nombre'),
				'docente_apellidos' => $this->input->post('docente_apellidos'),
				'docente_fechanac' => $this->input->post('docente_fechanac'),
				//'docente_edad' => $this->input->post('docente_edad'),
				'docente_ci' => $this->input->post('docente_ci'),
				'docente_extci' => $this->input->post('docente_extci'),
				'docente_codigo' => $this->input->post('docente_codigo'),
				'docente_direccion' => $this->input->post('docente_direccion'),
				'docente_telefono' => $this->input->post('docente_telefono'),
				'docente_celular' => $this->input->post('docente_celular'),
				'docente_titulo' => $this->input->post('docente_titulo'),
				'docente_especialidad' => $this->input->post('docente_especialidad'),
				'docente_foto' => $foto,
				'docente_email' => $this->input->post('docente_email'),
            );
            
            $docente_id = $this->Docente_model->add_docente($params);
            redirect('docente/index');
        }
        else
        {
			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$this->load->model('Genero_model');
			$data['all_genero'] = $this->Genero_model->get_all_genero();
            
            $data['_view'] = 'docente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a docente
     */
    function edit($docente_id)
    {   
        // check if the docente exists before trying to edit it
        $data['docente'] = $this->Docente_model->get_docente($docente_id);
        
        if(isset($data['docente']['docente_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                 /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('docente_foto1');
                if (!empty($_FILES['docente_foto']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/docentes/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 200000;
                    $config['max_width'] = 2900;
                    $config['max_height'] = 2900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('docente_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/docentes/';
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
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/siaac_web/resources/images/docentes/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/docentes/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/docentes/'."thumb_".$new_name.$extension;
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
                $params = array(
					'estado_id' => $this->input->post('estado_id'),
					'genero_id' => $this->input->post('genero_id'),
					'docente_nombre' => $this->input->post('docente_nombre'),
					'docente_apellidos' => $this->input->post('docente_apellidos'),
					'docente_fechanac' => $this->input->post('docente_fechanac'),
					//'docente_edad' => $this->input->post('docente_edad'),
					'docente_ci' => $this->input->post('docente_ci'),
					'docente_extci' => $this->input->post('docente_extci'),
					'docente_codigo' => $this->input->post('docente_codigo'),
					'docente_direccion' => $this->input->post('docente_direccion'),
					'docente_telefono' => $this->input->post('docente_telefono'),
					'docente_celular' => $this->input->post('docente_celular'),
					'docente_titulo' => $this->input->post('docente_titulo'),
					'docente_especialidad' => $this->input->post('docente_especialidad'),
					'docente_foto' => $foto,
					'docente_email' => $this->input->post('docente_email'),
                );

                $this->Docente_model->update_docente($docente_id,$params);            
                redirect('docente/index');
            }
            else
            {
				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

				$this->load->model('Genero_model');
				$data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['_view'] = 'docente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The docente you are trying to edit does not exist.');
    } 

    /*
     * Deleting docente
     */
    function remove($docente_id)
    {
        $docente = $this->Docente_model->get_docente($docente_id);

        // check if the docente exists before trying to delete it
        if(isset($docente['docente_id']))
        {
            $this->Docente_model->delete_docente($docente_id);
            redirect('docente/index');
        }
        else
            show_error('The docente you are trying to delete does not exist.');
    }
    
}
