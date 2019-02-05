<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Turno_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get turno by turno_id
     */
    function get_turno($turno_id)
    {
        $turno = $this->db->query("
            SELECT
                *

            FROM
                `turno`

            WHERE
                `turno_id` = ?
        ",array($turno_id))->row_array();

        return $turno;
    }
        
    /*
     * Get all turno
     */
    function get_all_turno()
    {
        $turno = $this->db->query("
            SELECT
                t.*, e.*

            FROM
                turno t, estado e

            WHERE
                t.estado_id=e.estado_id

            ORDER BY `turno_id` DESC
        ")->result_array();

        return $turno;
    }
        
    /*
     * function to add new turno
     */
    function add_turno($params)
    {
        $this->db->insert('turno',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update turno
     */
    function update_turno($turno_id,$params)
    {
        $this->db->where('turno_id',$turno_id);
        return $this->db->update('turno',$params);
    }
    
    /*
     * function to delete turno
     */
    function delete_turno($turno_id)
    {
        return $this->db->delete('turno',array('turno_id'=>$turno_id));
    }
}
