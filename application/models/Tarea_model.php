<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tarea_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
    * Obtener todas las tareas
    */
    function get_all_tareas($docente_id, $materia_id){
        $tareas = $this->db->query(
            "SELECT t.*, e.`estado_descripcion`
            FROM tarea AS t
            LEFT JOIN horario AS h ON h.`docente_id` = t.`docente_id`
            LEFT JOIN grupo AS g ON g.`grupo_id` = h.`grupo_id`
            LEFT JOIN materia AS m ON m.materia_id =  t.`materia_id`
            LEFT JOIN estado AS e ON e.`estado_id` = t.`estado_id`
            WHERE t.`docente_id` = $docente_id
            AND t.`materia_id` = $materia_id
            GROUP BY t.`tarea_id`"
        )->result_array();
        return $tareas;
    }

    /*
    * Agregar una nueva tarea a una materia
    */
    function add_tarea($params){
        $this->db->insert('tarea',$params);
        return $this->db->insert_id();
    }

    /*
    * Actualizar tarea 
    */
    function update_tarea($tarea_id, $params){
        $this->db->where('tarea_id',$tarea_id);
        return $this->db->update('tarea',$params);
    }

    /*
    * Buscar tarea 
    */
    function get_tarea($tarea_id){
        $tarea = $this->db->query(
            "SELECT * FROM tarea WHERE tarea_id = $tarea_id"
        )->row_array();
        return $tarea;
    }

    /*
    * Obtener todas las tareas activas por el nivel que estudiante
    */
    function get_tareas($nivel_id){
        $tareas = $this->db->query(
            "SELECT m.*, t.`materia_nombre`, d.`docente_nombre`, d.`docente_apellidos`
            FROM tarea as m
            LEFT JOIN materia as t on m.`materia_id` = t.`materia_id`
            LEFT JOIN nivel as n on t.`nivel_id` = n.`nivel_id`
            LEFT JOIN docente as d on d.docente_id = m.`docente_id`
            WHERE m.materia_id = t.materia_id 
            AND m.estado_id =  1
            AND t.`nivel_id` = $nivel_id"
        )->result_array();
        return $tareas;
    }
}