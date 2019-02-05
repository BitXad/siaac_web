<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kardex_academico_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kardex_academico by kardexacad_id
     */
    function get_kardex_academico($kardexacad_id)
    {
        $kardex_academico = $this->db->query("
            SELECT
                *

            FROM
                `kardex_academico`

            WHERE
                `kardexacad_id` = ?
        ",array($kardexacad_id))->row_array();

        return $kardex_academico;
    }
        
    /*
     * Get all kardex_academico
     */
    function get_all_kardex_academico()
    {
        $kardex_academico = $this->db->query("
            SELECT
                *

            FROM
                `kardex_academico`

            WHERE
                1 = 1

            ORDER BY `kardexacad_id` DESC
        ")->result_array();

        return $kardex_academico;
    }
        
    /*
     * function to add new kardex_academico
     */
    function add_kardex_academico($params)
    {
        $this->db->insert('kardex_academico',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kardex_academico
     */
    function update_kardex_academico($kardexacad_id,$params)
    {
        $this->db->where('kardexacad_id',$kardexacad_id);
        return $this->db->update('kardex_academico',$params);
    }
    
    /*
     * function to delete kardex_academico
     */
    function delete_kardex_academico($kardexacad_id)
    {
        return $this->db->delete('kardex_academico',array('kardexacad_id'=>$kardexacad_id));
    }
}
