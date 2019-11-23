<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get aula by aula_id
     */
    function get_estudiantes()
    {
        $estudiantes = $this->db->query("
            SELECT
                estudiante_id

            FROM
                estudiante

            WHERE
                estado_id=1

            
        ")->result_array();

        return $estudiantes;
    }

    function get_docentes()
    {
        $docentes = $this->db->query("
            SELECT
                docente_id

            FROM
                docente

            WHERE
                estado_id=1

            
        ")->result_array();

        return $docentes;
    }

    function get_inscripcion()
    {
        $docentes = $this->db->query("
            SELECT
                COUNT(i.inscripcion_id) 'cantidad', SUM(k.kardexeco_matricula) as 'suma'

            FROM
                inscripcion i, kardex_economico k
            WHERE
                i.inscripcion_id=k.inscripcion_id
                and i.inscripcion_fecha = CURDATE()
           

            
        ")->result_array();

        return $docentes;
    }

    function get_pensiones()
    {
        $mensualidad = $this->db->query("
            SELECT
                mensualidad_id

            FROM
                mensualidad


            
        ")->result_array();

        return $mensualidad;
    }

    function get_facturas()
    {
        $factura = $this->db->query("
            SELECT
                factura_id

            FROM
                factura


            
        ")->result_array();

        return $factura;
    }

    function get_kardex_eco()
    {
        $kardex_eco = $this->db->query("
            SELECT
                kardexeco_id

            FROM
                kardex_economico


            
        ")->result_array();

        return $kardex_eco;
    }

    function get_kardex_aca()
    {
        $kardex_aca = $this->db->query("
            SELECT
                kardexacad_id

            FROM
                kardex_academico


            
        ")->result_array();

        return $kardex_aca;
    }
        
    /*
     * Get all aula
     */

    function get_usuario_inscripcion()
    {
        $docentes = $this->db->query("
            SELECT u.usuario_nombre, usuario_imagen, count(*) as cantidad_insc, sum(k.kardexeco_matricula) as total_insc
                FROM usuario u, kardex_economico k, inscripcion i 
                WHERE 
                u.usuario_id = i.usuario_id and
                i.inscripcion_id = k.inscripcion_id
                group by u.usuario_id
            
        ")->result_array();

        return $docentes;
    }


    function get_carrera()
    {
        $carrera = $this->db->query("
            SELECT
                c.*

            FROM
                carrera c   , 
            
            
            ORDER BY carrera_id ASC   
           

        ")->result_array();

        return $carrera;
    }

    function get_carreraest()
    {
        $carrera = $this->db->query("
            SELECT
                c.*, insc.cant

            FROM
                carrera c   
            LEFT JOIN 
            
            (SELECT  count(i.inscripcion_id) as 'cant', i.carrera_id
            FROM inscripcion i) AS insc
            ON c.carrera_id=insc.carrera_id            
            ORDER BY c.carrera_id ASC 

        ")->result_array();

        return $carrera;
    }

    function get_inscritos($ultimos)
    {
        $carrera = $this->db->query("
            SELECT
                i.estudiante_id, e.estudiante_apellidos, e.estudiante_nombre, e.estudiante_foto

            FROM
                estudiante e, inscripcion i
            WHERE
                i.estudiante_id=e.estudiante_id    
           

            ORDER BY i.inscripcion_fecha ASC limit ".$ultimos."
        ")->result_array();

        return $carrera;
    }

    function get_montoinsc()
    {
        $montos = $this->db->query("
        SELECT if(count(*)>0, count(*), 0) as cantidad_incs, if(sum(kardexeco_matricula)>0, sum(kardexeco_matricula), 0) as total_insc
        from kardex_economico
        ")->result_array();

        return $montos;
    }
        
    /*
     * function to add new aula
     */
    function add_aula($params)
    {
        $this->db->insert('aula',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update aula
     */
    function update_aula($aula_id,$params)
    {
        $this->db->where('aula_id',$aula_id);
        return $this->db->update('aula',$params);
    }
    
    /*
     * function to delete aula
     */
    function delete_aula($aula_id)
    {
        return $this->db->delete('aula',array('aula_id'=>$aula_id));
    }
}
