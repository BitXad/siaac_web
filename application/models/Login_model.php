<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username,$password)  {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario_login', $username);
        $this->db->where('estado_id', 1);
        $this->db->where('usuario_clave', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login1($usuario_login,$usuario_clave){
        $query = $this->db->query("SELECT * from usuario WHERE usuario_login='".$usuario_login."' AND usuario_clave = '".md5($usuario_clave)."' and estado_id=1 ");
        return $query->row();
    }

    public function login2($usuario_login,$usuario_clave){
        $query = $this->db->query("SELECT * from docente WHERE docente_login='".$usuario_login."' AND docente_clave = '".md5($usuario_clave)."' and estado_id=1 ");
        return $query->row();
    }

    public function login3($usuario_login,$usuario_clave){
        $query = $this->db->query("SELECT * from estudiante WHERE estudiante_login='".$usuario_login."' AND estudiante_clave = '".md5($usuario_clave)."' and estado_id=1 ");
        return $query->row();
    }

    public function read_user_information($username) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario_login', $username);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}