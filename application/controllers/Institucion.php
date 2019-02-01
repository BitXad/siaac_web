<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Institucion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Institucion_model');
    } 

    /*
     * Listing of institucion
     */
    function index()
    {
        $rescount = $this->Institucion_model->get_all_institucion_count();
        if($rescount >0){
            $data['newinst'] = 1;
        }else{ $data['newinst'] = 0; }
        $data['institucion'] = $this->Institucion_model->get_all_institucion();
        
        $data['_view'] = 'institucion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new institucion
     */
    function add()
    {   
        $this->load->library('form_validation');

        $this->form_validation->set_rules('institucion_nombre','Institucion Nombre','required', array('required' => 'Este Campo no debe ser vacio'));

        if($this->form_validation->run())     
        {
            /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['institucion_logo']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/institucion/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 200000;
                        $config['max_width'] = 2900;
                        $config['max_height'] = 2900;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('institucion_logo');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/institucion/';
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
                        $confi['source_image'] = './resources/images/institucion/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/institucion/'."thumb_".$new_name.$extension;
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
				'institucion_nombre' => $this->input->post('institucion_nombre'),
				'institucion_direccion' => $this->input->post('institucion_direccion'),
				'institucion_telefono' => $this->input->post('institucion_telefono'),
				'institucion_fechacreacion' => $this->input->post('institucion_fechacreacion'),
				'institucion_logo' => $foto,
				'institucion_ubicacion' => $this->input->post('institucion_ubicacion'),
				'institucion_distrito' => $this->input->post('institucion_distrito'),
				'institucion_zona' => $this->input->post('institucion_zona'),
				'institucion_slogan' => $this->input->post('institucion_slogan'),
				'institucion_departamento' => $this->input->post('institucion_departamento'),
				'institucion_codigo' => $this->input->post('institucion_codigo'),
            );
            
            $institucion_id = $this->Institucion_model->add_institucion($params);
            redirect('institucion/index');
        }
        else
        {            
            $data['_view'] = 'institucion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a institucion
     */
    function edit($institucion_id)
    {   
        // check if the institucion exists before trying to edit it
        $data['institucion'] = $this->Institucion_model->get_institucion($institucion_id);
        
        if(isset($data['institucion']['institucion_id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('institucion_nombre','Institucion Nombre','required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('institucion_logo1');
                if (!empty($_FILES['institucion_logo']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/institucion/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 200000;
                    $config['max_width'] = 2900;
                    $config['max_height'] = 2900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('institucion_logo');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/institucion/';
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
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/siaac_web/resources/images/institucion/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/institucion/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/institucion/'."thumb_".$new_name.$extension;
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
					'institucion_nombre' => $this->input->post('institucion_nombre'),
					'institucion_direccion' => $this->input->post('institucion_direccion'),
					'institucion_telefono' => $this->input->post('institucion_telefono'),
					'institucion_fechacreacion' => $this->input->post('institucion_fechacreacion'),
					'institucion_logo' => $foto,
					'institucion_ubicacion' => $this->input->post('institucion_ubicacion'),
					'institucion_distrito' => $this->input->post('institucion_distrito'),
					'institucion_zona' => $this->input->post('institucion_zona'),
					'institucion_slogan' => $this->input->post('institucion_slogan'),
					'institucion_departamento' => $this->input->post('institucion_departamento'),
					'institucion_codigo' => $this->input->post('institucion_codigo'),
                );

                $this->Institucion_model->update_institucion($institucion_id,$params);            
                redirect('institucion/index');
            }
            else
            {
                $data['_view'] = 'institucion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The institucion you are trying to edit does not exist.');
    } 

    /*
     * Deleting institucion
     */
    function remove($institucion_id)
    {
        $institucion = $this->Institucion_model->get_institucion($institucion_id);

        // check if the institucion exists before trying to delete it
        if(isset($institucion['institucion_id']))
        {
            $this->Institucion_model->delete_institucion($institucion_id);
            redirect('institucion/index');
        }
        else
            show_error('The institucion you are trying to delete does not exist.');
    }
    
}