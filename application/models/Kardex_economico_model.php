<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kardex_economico_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kardex_economico by kardexeco_id
     */
    function get_kardex_economico($kardexeco_id)
    {
        $kardex_economico = $this->db->query("
            SELECT
                *

            FROM
                `kardex_economico`

            WHERE
                `kardexeco_id` = ?
        ",array($kardexeco_id))->row_array();

        return $kardex_economico;
    }
        
    /*
     * Get all kardex_economico
     */
    function get_all_kardex_economico()
    {
        $kardex_economico = $this->db->query("
            SELECT
                *

            FROM
                `kardex_economico`

            WHERE
                1 = 1

            ORDER BY `kardexeco_id` DESC
        ")->result_array();

        return $kardex_economico;
    }
        
    /*
     * function to add new kardex_economico
     */
    function add_kardex_economico($params)
    {
        $this->db->insert('kardex_economico',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kardex_economico
     */
    function update_kardex_economico($kardexeco_id,$params)
    {
        $this->db->where('kardexeco_id',$kardexeco_id);
        return $this->db->update('kardex_economico',$params);
    }
    
    /*
     * function to delete kardex_economico
     */
    function delete_kardex_economico($kardexeco_id)
    {
        return $this->db->delete('kardex_economico',array('kardexeco_id'=>$kardexeco_id));
    }
}