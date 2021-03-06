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
        $this->load->model('Grupo_model');
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

    private function privado($docente_id){
        $docente = $this->session_data['usuario_id'];
        if($docente == $docente_id){
            return true;
        }else{
            $data['_view'] = 'login/mensajeprivado';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of docente
     */
    function index()
    {
        if($this->acceso(54)){
            

            //$data['docente'] = $this->Docente_model->get_all_docente();

            $data['_view'] = 'docente/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function dashboard()
    {
        $docente_id = $this->session_data['usuario_id'];
        //menu docentes
        if($this->acceso(136)&&$this->privado($docente_id)){
            $data['docente'] = $this->Docente_model->get_docent($docente_id);
            $data['_view'] = 'docente/dashboard';
            $this->load->view('layouts/main',$data);
        }
    }

    function grupos()
    {
        $docente_id = $this->session_data['usuario_id'];
        $gestion_id = $this->session_data['gestion_id'];
        if($this->acceso(137)&&$this->privado($docente_id)){
            $data['grupos'] = $this->Grupo_model->get_grupos_docente($docente_id, $gestion_id);
            $data['_view'] = 'docente/grupos';
            $this->load->view('layouts/main',$data);
        }
    }
    function materias()
    {
        $docente_id = $this->session_data['usuario_id'];
        $gestion_id = $this->session_data['gestion_id'];
        if($this->acceso(138)&&$this->privado($docente_id)){
            $data['materias'] = $this->Docente_model->get_allmaterias($docente_id, $gestion_id);
            $data['_view'] = 'docente/materias';
            $this->load->view('layouts/main',$data);
        }
    }
    function horarios()
    {
        $docente_id = $this->session_data['usuario_id'];
        if($this->acceso(139)&&$this->privado($docente_id)){
            $data['_view'] = 'docente/horarios';
            $this->load->view('layouts/main',$data);
        }
    }
    function notas()
    {
        $docente_id = $this->session_data['usuario_id'];
        if($this->acceso(140)&&$this->privado($docente_id)){
            $data['_view'] = 'docente/notas';
            $this->load->view('layouts/main',$data);
        }
    }

    function nota($grupo)
    {
        if($this->acceso(140)){
            $data['estudiante'] = $this->Docente_model->get_estudiantes($grupo);
            $data['_view'] = 'docente/nota_grupo';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new docente
     */
    function add()
    {
        if($this->acceso(55)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('docente_nombre','docente Nombre','required');
            $this->form_validation->set_rules('docente_apellidos','docente Apellidos','required');
            $this->form_validation->set_rules('docente_ci','docente_ci','is_unique[docente.docente_ci]', array('is_unique' => 'Este C.I. ya fue Registrado'));
            $this->form_validation->set_rules('docente_codigo','docente_codigo','is_unique[docente.docente_codigo]',array('is_unique' => 'Este Codigo ya fue Registrado'));
            if($this->form_validation->run())     
            {   
                /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['docente_foto']['name'])){
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/docentes/';
                    $img_full_path = $config['upload_path'];

                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    /*$config['max_width'] = 2900;
                    $config['max_height'] = 2900;*/

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
                    'estadocivil_id' => $this->input->post('estadocivil_id'),
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
                    'docente_login' => $this->input->post('docente_login'),
                    'docente_clave' => md5($this->input->post('docente_clave')),
                    'tipousuario_id' => 2,
                );

                $docente_id = $this->Docente_model->add_docente($params);
                redirect('docente/index');
            }
            else
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Estado_civil_model');
                $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['_view'] = 'docente/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a docente
     */
    function edit($docente_id)
    {
        if($this->acceso(56)){
            // check if the docente exists before trying to edit it
            $data['docente'] = $this->Docente_model->get_docente($docente_id);


        if ($this->input->post('docente_ci') != $data['docente']['docente_ci']) {
            $is_unique = '|is_unique[docente.docente_ci]';
        } else {
            $is_unique = '';
        }
        if ($this->input->post('docente_codigo') != $data['docente']['docente_codigo']) {
            $is_unique1 = '|is_unique[docente.docente_codigo]';
        } else {
            $is_unique1 = '';
        }

            if(isset($data['docente']['docente_id']))
            {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('docente_nombre','docente Nombre','required');
                $this->form_validation->set_rules('docente_apellidos','docente Apellidos','required');
                $this->form_validation->set_rules('docente_ci', 'docente_ci', 'required' . $is_unique, array('is_unique' => 'Este C.I. de docente ya existe.'));
                $this->form_validation->set_rules('docente_codigo', 'docente_codigo', 'required' . $is_unique1, array('is_unique' => 'Este codigo de docente ya existe.'));

                if($this->form_validation->run())     
                {   
                     /* *********************INICIO imagen***************************** */
                    $foto="";
                    $foto1= $this->input->post('docente_foto1');
                    if (!empty($_FILES['docente_foto']['name']))
                    {
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/docentes/';
                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        /*$config['max_width'] = 2900;
                        $config['max_height'] = 2900;*/

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
                        'estadocivil_id' => $this->input->post('estadocivil_id'),
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
                        //'docente_login' => $this->input->post('docente_login'),
                        //'docente_clave' => md5($this->input->post('docente_clave')),
                        //'tipousuario_id' => 2,
                    );

                    $this->Docente_model->update_docente($docente_id,$params); 

                    redirect('docente/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $this->load->model('Estado_civil_model');
                    $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                    $this->load->model('Genero_model');
                    $data['all_genero'] = $this->Genero_model->get_all_genero();

                    $data['_view'] = 'docente/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The docente you are trying to edit does not exist.');
        }
    } 


    function cuenta()
    {
        $docente_id = $this->session_data['usuario_id'];
        if($this->acceso(136)&&$this->privado($docente_id)){
            //usuario_id ===>id de docente
            $usuario_id = $this->session_data['usuario_id'];
            if($docente_id == $usuario_id){
                $data['docente'] = $this->Docente_model->get_docente($docente_id);

                if(isset($data['docente']['docente_id']))  
                {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('docente_login','docente_login','required');
                    if($this->form_validation->run()) {
                        $curr_password = md5($this->input->post('docente_clave'));
                        if ($curr_password==$data['docente']['docente_clave']) {
                           $params = array(

                        'docente_login' => $this->input->post('docente_login'),
                        'docente_clave' => md5($this->input->post('newpass')),

                            );

                         $this->Docente_model->update_docente($docente_id,$params);
                         redirect('docente/dashboard');
                        }else{
                            $data['mensaje'] = 'La clave antigua es incorrecta.';
                     $data['_view'] = 'docente/cuenta';
                     $this->load->view('layouts/main',$data);
                        }
                    }else {
                        $data['mensaje'] = '';
                        $data['_view'] = 'docente/cuenta';
                     $this->load->view('layouts/main',$data);
                    } 
                     
                }else
                    show_error('The docente you are trying to edit does not exist.');
            }else{
                $data['_view'] = 'login/mensajeacceso';
                $this->load->view('layouts/main',$data);
            }
        }
       
    }


    /*
     * Deleting docente
     */

    function restablecer($docente_id)
    {
        if($this->acceso(57)){
           
           $sql="UPDATE docente SET docente_login=docente_ci, docente_clave=md5(docente_ci) WHERE docente_id=".$docente_id." ";
           $this->db->query($sql);
           redirect('docente/index');
        }
    }

    function remove($docente_id)
    {
        if($this->acceso(54)){
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
    /* funcion que busca inscritos */
    function buscar_docentes()
    {
        if($this->input->is_ajax_request()){
            $filtro = $this->input->post('filtro');
            $res_docentes = $this->Docente_model->get_all_docentes($filtro);
            echo json_encode($res_docentes);
        }else{
            show_404();
        }
    }
    
}
