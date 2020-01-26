<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Imagen_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get imagen by imagen_id
     */
    function get_imagen($imagen_id)
    {
        $imagen = $this->db->query("
            SELECT
                *

            FROM
                `imagen`

            WHERE
                `imagen_id` = ?
        ",array($imagen_id))->row_array();

        return $imagen;
    }
    
    /*
     * Get all imagen count
     */
    function get_all_imagen_count()
    {
        $imagen = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `imagen`
        ")->row_array();

        return $imagen['count'];
    }
        
    /*
     * Get all imagen
     */
    function get_all_imagen($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $imagen = $this->db->query("
            SELECT
                *

            FROM
                imagen i, estado_pagina e, articulo a

            WHERE
                i.estadopag_id = e.estadopag_id
                and i.articulo_id = a.articulo_id

            ORDER BY `imagen_id` DESC

            " . $limit_condition . "
        ")->result_array();

        return $imagen;
    }
        
    /*
     * function to add new imagen
     */
    function add_imagen($params)
    {
        $this->db->insert('imagen',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update imagen
     */
    function update_imagen($imagen_id,$params)
    {
        $this->db->where('imagen_id',$imagen_id);
        return $this->db->update('imagen',$params);
    }
    
    /*
     * function to delete imagen
     */
    function delete_imagen($imagen_id)
    {
        return $this->db->delete('imagen',array('imagen_id'=>$imagen_id));
    }
}
