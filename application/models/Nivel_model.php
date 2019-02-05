<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Nivel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get nivel by nivel_id
     */
    function get_nivel($nivel_id)
    {
        $nivel = $this->db->query("
            SELECT
                *

            FROM
                `nivel`

            WHERE
                `nivel_id` = ?
        ",array($nivel_id))->row_array();

        return $nivel;
    }
        
    /*
     * Get all nivel
     */
    function get_all_nivel()
    {
        $nivel = $this->db->query("
            SELECT
                n.*, pa.planacad_nombre

            FROM
                nivel n, plan_academico pa

            WHERE
                n.planacad_id = pa.planacad_id

            ORDER BY `nivel_id` DESC
        ")->result_array();

        return $nivel;
    }
        
    /*
     * function to add new nivel
     */
    function add_nivel($params)
    {
        $this->db->insert('nivel',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update nivel
     */
    function update_nivel($nivel_id,$params)
    {
        $this->db->where('nivel_id',$nivel_id);
        return $this->db->update('nivel',$params);
    }
    
    /*
     * function to delete nivel
     */
    function delete_nivel($nivel_id)
    {
        return $this->db->delete('nivel',array('nivel_id'=>$nivel_id));
    }
}
