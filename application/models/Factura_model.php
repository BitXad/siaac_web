<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Factura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get factura by factura_id
     */
    function get_factura($factura_id)
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                `factura_id` = ?
        ",array($factura_id))->row_array();

        return $factura;
    }
        
    /*
     * Get all factura
     */
    function get_all_factura()
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                1 = 1

            ORDER BY `factura_id` DESC
        ")->result_array();

        return $factura;
    }

    function ejecutar($sql)
    {       
        $this->db->query($sql);     
        return $true;
    }

    function get_detalle_factura_id($factura_id)
    {
        $sql = "select * from detalle_factura d where d.factura_id = ".$factura_id;
        $detalle_venta = $this->db->query($sql)->result_array();        
        return $detalle_venta;
    }

    function get_factura_id($factura_id)
    {
        $sql = "select f.*,u.* from factura f 
                left join usuario u on u.usuario_id = f.usuario_id
                where f.factura_id = ".$factura_id;
        $factura = $this->db->query($sql)->result_array();
        return $factura;
        
    }
    
    function get_factura_ventas($inicio, $fin)
    {
        $sql = "
            SELECT
                *

            FROM
                `factura`

            WHERE
                factura_fecha >= '".$inicio."'
                and factura_fecha <= '".$fin."'
                ORDER BY `factura_numero` ASC
            ";
        
        $factura = $this->db->query($sql)->result_array();

        return $factura;
    }

    function get_factura_compras($inicio, $fin)
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                factura_fecha >= '".$inicio."'
                and factura_fecha <= '".$fin."' 
                

            ORDER BY `factura_id` ASC
        ")->result_array();

        return $factura;
    }
        
    /*
     * function to add new factura
     */
    function add_factura($params)
    {
        $this->db->insert('factura',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update factura
     */
    function update_factura($factura_id,$params)
    {
        $this->db->where('factura_id',$factura_id);
        return $this->db->update('factura',$params);
    }
    
    /*
     * function to delete factura
     */
    function delete_factura($factura_id)
    {
        return $this->db->delete('factura',array('factura_id'=>$factura_id));
    }
    
    function get_all_factura_count()
    {
        $factura = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `factura`
        ")->row_array();

        return $factura['count'];
    }
        
    
}
