<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Administrativo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get administrativo by administrativo_id
     */
    function get_administrativo($administrativo_id)
    {
        $administrativo = $this->db->query("
            SELECT
                *

            FROM
                `administrativo`

            WHERE
                `administrativo_id` = ?
        ",array($administrativo_id))->row_array();

        return $administrativo;
    }
        
    /*
     * Get all administrativo
     */
    function get_all_administrativo()
    {
        $administrativo = $this->db->query("
            SELECT
                *

            FROM
                `administrativo`

            WHERE
                1 = 1

            ORDER BY `administrativo_id` DESC
        ")->result_array();

        return $administrativo;
    }
        
    /*
     * function to add new administrativo
     */
    function add_administrativo($params)
    {
        $this->db->insert('administrativo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update administrativo
     */
    function update_administrativo($administrativo_id,$params)
    {
        $this->db->where('administrativo_id',$administrativo_id);
        return $this->db->update('administrativo',$params);
    }
    
    /*
     * function to delete administrativo
     */
    function delete_administrativo($administrativo_id)
    {
        return $this->db->delete('administrativo',array('administrativo_id'=>$administrativo_id));
    }
}