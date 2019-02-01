<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Detalle_factura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get detalle_factura by detalle_id
     */
    function get_detalle_factura($detalle_id)
    {
        $detalle_factura = $this->db->query("
            SELECT
                *

            FROM
                `detalle_factura`

            WHERE
                `detalle_id` = ?
        ",array($detalle_id))->row_array();

        return $detalle_factura;
    }
        
    /*
     * Get all detalle_factura
     */
    function get_all_detalle_factura()
    {
        $detalle_factura = $this->db->query("
            SELECT
                *

            FROM
                `detalle_factura`

            WHERE
                1 = 1

            ORDER BY `detalle_id` DESC
        ")->result_array();

        return $detalle_factura;
    }
        
    /*
     * function to add new detalle_factura
     */
    function add_detalle_factura($params)
    {
        $this->db->insert('detalle_factura',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update detalle_factura
     */
    function update_detalle_factura($detalle_id,$params)
    {
        $this->db->where('detalle_id',$detalle_id);
        return $this->db->update('detalle_factura',$params);
    }
    
    /*
     * function to delete detalle_factura
     */
    function delete_detalle_factura($detalle_id)
    {
        return $this->db->delete('detalle_factura',array('detalle_id'=>$detalle_id));
    }
}