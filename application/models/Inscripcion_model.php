<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Inscripcion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get inscripcion by inscripcion_id
     */
    function get_inscripcion($inscripcion_id)
    {
        $inscripcion = $this->db->query("
            SELECT
                *

            FROM
                `inscripcion`

            WHERE
                `inscripcion_id` = ?
        ",array($inscripcion_id))->row_array();

        return $inscripcion;
    }
    
    /*
     * Get all inscripcion count
     */
    function get_all_inscripcion_count()
    {
        $inscripcion = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `inscripcion`
        ")->row_array();

        return $inscripcion['count'];
    }
        
    /*
     * Get all inscripcion
     */
    function get_all_inscripcion($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $inscripcion = $this->db->query("
            SELECT
                *

            FROM
                `inscripcion`

            WHERE
                1 = 1

            ORDER BY `inscripcion_id` DESC

            " . $limit_condition . "
        ")->result_array();

        return $inscripcion;
    }
        
    /*
     * function to add new inscripcion
     */
    function add_inscripcion($params)
    {
        $this->db->insert('inscripcion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update inscripcion
     */
    function update_inscripcion($inscripcion_id,$params)
    {
        $this->db->where('inscripcion_id',$inscripcion_id);
        return $this->db->update('inscripcion',$params);
    }
    
    /*
     * function to delete inscripcion
     */
    function delete_inscripcion($inscripcion_id)
    {
        return $this->db->delete('inscripcion',array('inscripcion_id'=>$inscripcion_id));
    }
    
    /*
     * function to ejecutar una consulta sql
     */
    function ejecutar($sql)
    {
        $this->db->query($sql);
        return TRUE;
    }
    
    
    /*
     * function to ejecutar una consulta sql
     */
    function ultima_inscripcion()
    {
        $sql = "select max(inscripcion_id) as inscripcion_id from inscripcion";
        $resultado = $this->db->query($sql)->result_array();
        return $resultado;
    }
    
    /*
     * function to ejecutar una consulta sql y devolver una tupla
     */
    function consultar($sql)
    {
        $resultado = $this->db->query($sql)->$result_array();
        return $resultado;
    }
    
    /*
     * function to ejecutar una consulta sql y devolver una tupla
     */
    function get_estudiantes($parametro)
    {
        $sql = "select * from estudiante where "
                . "estudiante_nombre like '%".$parametro."%' or "
                . "estudiante_apellidos like '%".$parametro."%' or "
                . "estudiante_codigo like '%".$parametro."%' or "
                . "estudiante_ci like '%".$parametro."%' ";

        $resultado = $this->db->query($sql)->result_array();
        return $resultado;
    }
    
    /*
     * function que devuelve las materias pertenecientes a un nivel
     */
    function get_materias($nivel_id)
    {
        $sql = "select * from materia where nivel_id = ".$nivel_id;                
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }

    /*
     * function to ejecutar una consulta sql y devolver una tupla
     */
    function get_inscripciones()
    {
        $sql = "select * from consinscripcion";

        $resultado = $this->db->query($sql)->result_array();
        return $resultado;
    }
    /*
     * Get inscripcion by inscripcion_id
     */
    function get_carreraid_inscripcion($estudiante_id)
    {
        $inscripcion = $this->db->query("
            SELECT
                i.carrera_id
            FROM
                inscripcion i
            WHERE
                i.estudiante_id = $estudiante_id
                order by i.inscripcion_id desc
        ")->row_array();

        return $inscripcion['carrera_id'];
    }
    /*
     * Get grupos de una materia
     */
    function get_grupomateria($materia_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.grupo_id, g.grupo_nombre
            FROM
                grupo g
            WHERE
                g.materia_id = $materia_id
                group by g.grupo_nombre
        ")->result_array();

        return $grupo;
    }

    function get_ultima_inscripcion()
    {
        $sql = "select * 
                from inscripcion i, estudiante e, kardex_economico ke, usuario u, carrera c, gestion g, nivel n
                where i.estudiante_id = e.estudiante_id and 
                i.inscripcion_id = ke.inscripcion_id and 
                i.gestion_id = g.gestion_id and
                c.carrera_id = i.carrera_id and
                i.usuario_id = u.usuario_id and
                i.nivel_id = n.nivel_id and
                i.inscripcion_id = (select max(inscripcion_id) from inscripcion)";
        $grupo = $this->db->query($sql)->result_array();
        return $grupo;
    }

    function get_inscritos($desde,$hasta)
    {
        $sql = "select 
                e.estudiante_apellidos,e.estudiante_nombre,e.estudiante_id,
                ke.*, c.*, g.*, n.nivel_descripcion, u.usuario_nombre
                from inscripcion i, estudiante e, kardex_economico ke, usuario u, carrera c, gestion g, nivel n
                where i.estudiante_id = e.estudiante_id and 
                i.inscripcion_id = ke.inscripcion_id and 
                i.gestion_id = g.gestion_id and
                c.carrera_id = i.carrera_id and
                i.usuario_id = u.usuario_id and
                i.nivel_id = n.nivel_id and
                i.inscripcion_fecha >= '".$desde."' and
                i.inscripcion_fecha <= '".$hasta."'";
        $grupo = $this->db->query($sql)->result_array();
        return $grupo;
    }
    
}
