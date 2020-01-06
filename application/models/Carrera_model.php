<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Carrera_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get carrera by carrera_id
     */
    function get_carrera($carrera_id)
    {
        $carrera = $this->db->query("
            SELECT
                *

            FROM
                `carrera`

            WHERE
                `carrera_id` = ?
        ",array($carrera_id))->row_array();

        return $carrera;
    }

    function get_carrera_por_id($carrera_id)
    {
        $sql = "select * from carrera where carrera_id = ".$carrera_id;
        $carrera = $this->db->query($sql)->result_array();
        return $carrera;
    }
        
    /*
     * Get all carrera
     */
    function get_all_carrera()
    {
        $carrera = $this->db->query("
            SELECT
                c.*, ac.areacarrera_nombre, e.*

            FROM
                carrera c, area_carrera ac, estado e

            WHERE
                c.areacarrera_id = ac.areacarrera_id
                and c.estado_id = e.estado_id

            ORDER BY `carrera_nombre` ASC
        ")->result_array();

        return $carrera;
    }
        
    /*
     * function to add new carrera
     */
    function add_carrera($params)
    {
        $this->db->insert('carrera',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update carrera
     */
    function update_carrera($carrera_id,$params)
    {
        $this->db->where('carrera_id',$carrera_id);
        return $this->db->update('carrera',$params);
    }
    
    /*
     * function to delete carrera
     */
    function delete_carrera($carrera_id)
    {
        return $this->db->delete('carrera',array('carrera_id'=>$carrera_id));
    }
    /*
     * Get all carrera
     */
    function get_all_carreras()
    {
        $carrera = $this->db->query("
            SELECT
                c.*

            FROM
                carrera c

            WHERE
                1 = 1

            ORDER BY `carrera_id` DESC
        ")->result_array();

        return $carrera;
    }
    
    function get_carrera_porestudante($estudiante_id)
    {
        $carrera = $this->db->query("
            SELECT
                c.*, ac.areacarrera_nombre

            FROM
                estudiante e
            LEFT JOIN inscripcion i on e.estudiante_id = i.estudiante_id
            LEFT JOIN carrera c on i.carrera_id = c.carrera_id
            LEFT JOIN area_carrera ac on c.areacarrera_id = ac.areacarrera_id

            WHERE
                e.estudiante_id = $estudiante_id
            group by c.carrera_nombre
        ")->result_array();

        return $carrera;
    }

    function inactivar_carrera($carrera_id)
    {
        $sql = "update carrera set estado_id = 2 where carrera_id = ".$carrera_id;
        
        return $this->db->query($sql);
    }
    function activar_carrera($carrera_id)
    {
        $sql = "update carrera set estado_id = 1 where carrera_id = ".$carrera_id;
        
        return $this->db->query($sql);
    }
}
