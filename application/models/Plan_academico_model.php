<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Plan_academico_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get plan_academico by plan_academico_id
     */
    function get_plan_academico($planacad_id)
    {
        $plan_academico = $this->db->query("
            SELECT
                *

            FROM
                `plan_academico`

            WHERE
                `planacad_id` = ?
        ",array($planacad_id))->row_array();

        return $plan_academico;
    }
        
    /*
     * Get all plan_academico
     */
    function get_all_plan_academico()
    {
        $plan_academico = $this->db->query("
            SELECT
                pa.*, e.estado_color, e.estado_descripcion, c.carrera_nombre

            FROM
                plan_academico pa, estado e, carrera c

            WHERE
                pa.estado_id = e.estado_id
                and pa.carrera_id = c.carrera_id

            ORDER BY `planacad_id` DESC
        ")->result_array();

        return $plan_academico;
    }
        
    /*
     * function to add new plan_academico
     */
    function add_plan_academico($params)
    {
        $this->db->insert('plan_academico',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update plan_academico
     */
    function update_plan_academico($plan_academico_id,$params)
    {
        $this->db->where('planacad_id',$plan_academico_id);
        return $this->db->update('plan_academico',$params);
    }
    
    /*
     * function to delete plan_academico
     */
    function delete_plan_academico($plan_academico_id)
    {
        return $this->db->delete('plan_academico',array('planacad_id'=>$plan_academico_id));
    }
    /*
     * Get plan_academico by carrera_id
     */
    function get_plan_acad_carr($carrera_id)
    {
        $plan_academico = $this->db->query("
            SELECT
                pa.planacad_nombre, pa.planacad_id, pa.planacad_codigo
            FROM
                plan_academico pa
            WHERE
                pa.carrera_id = $carrera_id
                and pa.estado_id = 1
            order by pa.planacad_id desc
        ")->result_array();

        return $plan_academico;
    }
    /*
     * Get all plan_academico
     */
    function get_this_plan_academico($plan_academico_id)
    {
        $plan_academico = $this->db->query("
            SELECT
                pa.*

            FROM
                plan_academico pa

            WHERE
                pa.planacad_id = $plan_academico_id
        ")->result_array();

        return $plan_academico;
    }
    function inactivar_plan($planacad_id)
    {
        $sql = "update plan_academico set estado_id = 2 where planacad_id = ".$planacad_id;
        
        return $this->db->query($sql);
    }
    function activar_plan($planacad_id)
    {
        $sql = "update plan_academico set estado_id = 1 where planacad_id = ".$planacad_id;
        
        return $this->db->query($sql);
    }
}
