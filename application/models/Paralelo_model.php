<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Paralelo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get paralelo by paralelo_id
     */
    function get_paralelo($paralelo_id)
    {
        $paralelo = $this->db->query("
            SELECT
                *

            FROM
                `paralelo`

            WHERE
                `paralelo_id` = ?
        ",array($paralelo_id))->row_array();

        return $paralelo;
    }
        
    /*
     * Get all paralelo
     */
    function get_all_paralelo()
    {
        $paralelo = $this->db->query("
            SELECT
                p.*, e.*

            FROM
                paralelo p, estado e

            WHERE
                p.estado_id=e.estado_id

            ORDER BY `paralelo_id` DESC
        ")->result_array();

        return $paralelo;
    }
        
    /*
     * function to add new paralelo
     */
    function add_paralelo($params)
    {
        $this->db->insert('paralelo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update paralelo
     */
    function update_paralelo($paralelo_id,$params)
    {
        $this->db->where('paralelo_id',$paralelo_id);
        return $this->db->update('paralelo',$params);
    }
    
    /*
     * function to delete paralelo
     */
    function delete_paralelo($paralelo_id)
    {
        return $this->db->delete('paralelo',array('paralelo_id'=>$paralelo_id));
    }
}
