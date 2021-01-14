<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grupo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get grupo by grupo_id
     */
    function get_grupo($grupo_id)
    {
        $grupo = $this->db->query("
            SELECT
                *

            FROM
                `grupo`

            WHERE
                `grupo_id` = ?
        ",array($grupo_id))->row_array();

        return $grupo;
    }
    
    /*
     * Get all grupo count
     */
    function get_all_grupo_count()
    {
        $grupo = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `grupo`
        ")->row_array();

        return $grupo['count'];
    }
        
    /*
     * Get all grupo
     */
    function get_all_grupo()
    {
        $grupo = $this->db->query("
            SELECT
                *

            FROM
                `grupo`

            WHERE
                1 = 1

            ORDER BY `grupo_id` DESC
            
        ")->result_array();

        return $grupo;
    }
        
    /*
     * function to add new grupo
     */
    function add_grupo($params)
    {
        $this->db->insert('grupo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update grupo
     */
    function update_grupo($grupo_id,$params)
    {
        $this->db->where('grupo_id',$grupo_id);
        return $this->db->update('grupo',$params);
    }
    
    /*
     * function to delete grupo
     */
    function delete_grupo($grupo_id)
    {
        return $this->db->delete('grupo',array('grupo_id'=>$grupo_id));
    }
    /*
     * Get all grupos de docente
     */
    function get_allgrupo_docente($docente_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.grupo_id, g.grupo_nombre, p.periodo_horainicio, p.periodo_horafin,
                di.dia_nombre, a.aula_nombre, concat(ge.gestion_semestre, ' ', ge.gestion_descripcion) as descripcion_gestion,
                concat(d.docente_apellidos, ' ', d.docente_nombre) as nombre_docente, m.materia_nombre, u.usuario_nombre
            FROM
                grupo g
            LEFT JOIN docente d  on g.docente_id = d.docente_id
            LEFT JOIN horario h  on g.horario_id = h.horario_id
            LEFT JOIN aula    a  on g.aula_id = a.aula_id
            LEFT JOIN aula    b  on h.aula_id = b.aula_id
            LEFT JOIN periodo p  on h.periodo_id = p.periodo_id
            LEFT JOIN dia     di on h.dia_id = di.dia_id
            LEFT JOIN gestion ge on g.gestion_id = ge.gestion_id
            LEFT JOIN usuario u  on g.usuario_id = u.usuario_id
            LEFT JOIN materia m on g.materia_id = m.materia_id
            where
                d.docente_id = $docente_id
            
        ")->result_array();

        return $grupo;
    }
    /* para ver si ya hay registrado dia->periodo y aula */
    function existe_docentedia_periodo($docente_id, $dia_id, $periodo_id)
    {
        $horario = $this->db->query("
            SELECT
                count(g.grupo_id) as res
                
            FROM
                grupo g, horario h
            where
                g.horario_id = h.horario_id
                and g.docente_id = $docente_id
                and h.dia_id = $dia_id
                and h.periodo_id = $periodo_id
        ")->row_array();

        return $horario;
    }
    /* para ver carrera, plan academico y nivel desde materia */
    function get_carr_plan_nivel($materia_id)
    {
        $carr_plan_nivel = $this->db->query("
            SELECT
                c.carrera_id, c.carrera_nombre, pa.planacad_id, pa.planacad_nombre,
                n.nivel_id, n.nivel_descripcion, m.materia_id
            FROM
                materia m
            LEFT JOIN nivel n  on m.nivel_id = n.nivel_id
            LEFT JOIN plan_academico pa  on n.planacad_id = pa.planacad_id
            LEFT JOIN carrera c     on pa.carrera_id = c.carrera_id
            where
                m.materia_id = $materia_id
        ")->row_array();

        return $carr_plan_nivel;
    }
    
    /*
     * Get grupo by grupo_id all informacion
     */
    function get_all_thisgrupo($grupo_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.grupo_id, g.horario_id, g.grupo_nombre, p.periodo_id, p.periodo_horainicio, p.periodo_horafin,
                di.dia_id, di.dia_nombre, a.aula_id, a.aula_nombre, d.docente_id,
                d.docente_apellidos, d.docente_nombre, m.materia_id, m.materia_nombre
            FROM
                grupo g
            LEFT JOIN horario h  on h.horario_id = g.horario_id
            LEFT JOIN periodo p  on p.periodo_id = h.horario_id
            LEFT JOIN dia     di on di.dia_id = h.dia_id
            LEFT JOIN aula    a  on a.aula_id = h.aula_id
            LEFT JOIN docente d  on d.docente_id = g.docente_id
            LEFT JOIN gestion ge on ge.gestion_id = g.gestion_id
            LEFT JOIN usuario u  on u.usuario_id = g.usuario_id
            LEFT JOIN materia m on m.materia_id = g.materia_id
            where
                g.grupo_id = $grupo_id
        ")->row_array();

        return $grupo;
    }
    function get_all_grupo_gestion($gestion_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.grupo_id, g.materia_id, g.grupo_nombre
            FROM
                grupo g
            WHERE
                g.gestion_id = $gestion_id
        ")->result_array();

        return $grupo;
    }
    /*
     * Obtiene todos los grupos de una materia
     */
    function get_allgrupo_materia($materia_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.grupo_id, g.grupo_nombre, ge.gestion_descripcion, u.usuario_nombre
            FROM
                grupo g
            LEFT JOIN gestion ge on g.gestion_id = ge.gestion_id
            LEFT JOIN usuario u  on g.usuario_id = u.usuario_id
            LEFT JOIN materia m on g.materia_id = m.materia_id
            where
                g.materia_id = $materia_id
        ")->result_array();

        return $grupo;
    }
    /* verifica si ya esta registrado un grupo */
    function existe_grupomateria($materia_id, $gestion_id, $grupo_nombre)
    {
        $horario = $this->db->query("
            SELECT
                count(g.grupo_id) as res
                
            FROM
                grupo g
            where
                g.materia_id = $materia_id
                and g.gestion_id = $gestion_id
                and g.grupo_nombre = '".$grupo_nombre."'
        ")->row_array();

        return $horario;
    }
    /* obtiene informacion de un grupo */
    function get_informaciongrupo($grupo_id)
    {
        $grupo = $this->db->query("
            SELECT
                g.`grupo_id`, g.`grupo_nombre`, g.`materia_id`,
                m.`nivel_id`, n.`planacad_id`, p.`carrera_id`
                
            FROM
                grupo g, materia m, nivel n, `plan_academico` p, `carrera` c
            where
                g.materia_id = m.`materia_id`
                and m.`nivel_id` = n.`nivel_id`
                and n.`planacad_id` = p.`planacad_id`
                and p.`carrera_id` = c.`carrera_id`
                and g.`grupo_id` = $grupo_id
        ")->row_array();

        return $grupo;
    }
}
