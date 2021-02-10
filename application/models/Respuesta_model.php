<?php

class Respuesta_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    /*
    * Registrar respuesta de estudiante  
    */
    function add_respuesta($params){
        $this->db->insert('respuesta',$params);
        return $this->db->insert_id();
    }

    /* 
    * Obtener todas las respuestas de una tarea
    */
    function get_respuestas($tarea_id){
        return $this->db->query(
            "SELECT 
                r.*, e.`estudiante_apellidos`,e.estudiante_nombre
            FROM
                respuesta r
            left join estudiante e on e.`estudiante_id` = r.`estudiante_id`
            WHERE
                r.tarea_id = $tarea_id
            order by e.`estudiante_apellidos`"
        )->result_array();
    }
    /*
    * Contar respuestas registradas hasta el momento
    */
    function get_count_respuestas(){}
    /*
    * Estudiante Envio su tarea?
    * en caso que si devolvera 1, sino 0
    */
    function estado_tarea($tarea_id, $estudiante_id){
        return $this->db->query(
            "SELECT 
                if(count(r.tarea_id) > 0, 1, 0) AS respondido
            FROM
                tarea t
                LEFT OUTER JOIN respuesta r ON (r.tarea_id = t.tarea_id)
            WHERE
            t.tarea_id = $tarea_id AND 
            r.estudiante_id = $estudiante_id"
        )->row_array();
    }
}