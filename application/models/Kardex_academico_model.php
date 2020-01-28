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

    function get_est_kardex($dato)
    {
        $kardex_economico = $this->db->query("
            SELECT
                i.*, ka.*, c.*, e.*, n.*, g.*

            FROM
                inscripcion i

            LEFT JOIN kardex_academico ka ON i.inscripcion_id=ka.inscripcion_id
            LEFT JOIN carrera c ON i.carrera_id=c.carrera_id
            LEFT JOIN estudiante e ON i.estudiante_id=e.estudiante_id
            LEFT JOIN nivel n ON i.nivel_id=n.nivel_id
            LEFT JOIN gestion g ON i.gestion_id=g.gestion_id
            LEFT JOIN gestion g ON i.gestion_id=g.gestion_id
            

            WHERE
                
                 ".$dato."

            ORDER BY `kardexeco_id` DESC
        ")->result_array();

        return $kardex_economico;
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
