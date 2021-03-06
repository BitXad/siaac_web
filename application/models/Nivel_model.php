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

            ORDER BY planacad_id,nivel_descripcion ASC
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
    
    /*
     * Get all nivel
     */
    function get_all_nivel_forplan($planacad_id)
    {
        $nivel = $this->db->query("
            SELECT
                n.*

            FROM
                nivel n

            WHERE
                n.planacad_id = $planacad_id

            ORDER BY `nivel_id` ASC
        ")->result_array();

        return $nivel;
    }
    /*
     * Get all nivel
     */
    function verifivar_nombre_nivel($planacad_id, $descripcion)
    {
        $nivel = $this->db->query("
            SELECT
               COUNT(n.nivel_descripcion) as resbusqueda

            FROM
                nivel n

            WHERE
                n.nivel_descripcion = '".$descripcion."'
                and n.planacad_id = $planacad_id
        ")->row_array();

        return $nivel["resbusqueda"];
    }
    
    /*
     * Get all nivel
     */
    function get_nivel_por_carrera($carrera_id)
    {
//        $sql = "select * from nivel where carrera_id = ".$carrera_id." order by nivel_id desc";
        $sql = "select n.*
                from plan_academico p, nivel n, carrera c
                where 
                c.carrera_id = ".$carrera_id." and
                c.carrera_id = p.carrera_id and
                p.planacad_id = n.planacad_id
                order by n.nivel_id desc";
        $nivel = $this->db->query($sql)->result_array();
        return $nivel;
    }
    
}
