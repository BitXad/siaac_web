<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rol_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get rol by rol_id
     */
    function get_rol($rol_id)
    {
        $rol = $this->db->query("
            SELECT
                *

            FROM
                `rol`

            WHERE
                `rol_id` = ?
        ",array($rol_id))->row_array();

        return $rol;
    }
        
    /*
     * Get all rol
     */
    function get_all_rol()
    {
        $rol = $this->db->query("
            SELECT
                *

            FROM
                `rol`

            WHERE
                1 = 1

            ORDER BY `rol_id` DESC
        ")->result_array();

        return $rol;
    }
        
    /*
     * function to add new rol
     */
    function add_rol($params)
    {
        $this->db->insert('rol',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update rol
     */
    function update_rol($rol_id,$params)
    {
        $this->db->where('rol_id',$rol_id);
        return $this->db->update('rol',$params);
    }
    
    /*
     * function to delete rol
     */
    function delete_rol($rol_id)
    {
        return $this->db->delete('rol',array('rol_id'=>$rol_id));
    }
}