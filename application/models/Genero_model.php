<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Genero_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get genero by genero_id
     */
    function get_genero($genero_id)
    {
        $genero = $this->db->query("
            SELECT
                *

            FROM
                `genero`

            WHERE
                `genero_id` = ?
        ",array($genero_id))->row_array();

        return $genero;
    }
        
    /*
     * Get all genero
     */
    function get_all_genero()
    {
        $genero = $this->db->query("
            SELECT
                *

            FROM
                `genero`

            WHERE
                1 = 1

            ORDER BY `genero_id` DESC
        ")->result_array();

        return $genero;
    }
        
    /*
     * function to add new genero
     */
    function add_genero($params)
    {
        $this->db->insert('genero',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update genero
     */
    function update_genero($genero_id,$params)
    {
        $this->db->where('genero_id',$genero_id);
        return $this->db->update('genero',$params);
    }
    
    /*
     * function to delete genero
     */
    function delete_genero($genero_id)
    {
        return $this->db->delete('genero',array('genero_id'=>$genero_id));
    }
}
