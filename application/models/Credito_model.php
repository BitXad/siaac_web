<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Credito_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get credito by credito_id
     */
    function get_credito($credito_id)
    {
        $credito = $this->db->query("
            SELECT
                *

            FROM
                `credito`

            WHERE
                `credito_id` = ?
        ",array($credito_id))->row_array();

        return $credito;
    }
    
    /*
     * Get all credito count
     */
    function get_all_credito_count()
    {
        $credito = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `credito`
            WHERE
                compra_id<>0
                and estado_id=8
        ")->row_array();

        return $credito['count'];
    }

    function get_all_credito_count1()
    {
        $credito = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `credito`
            WHERE
                venta_id<>0
                 and estado_id=8
        ")->row_array();

        return $credito['count'];
    }

    function get_deudas($filtro,$condicion)
    {
        $deuda = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*, u.*

            FROM
                credito c, proveedor p, compra co, estado e, usuario u

            WHERE
                c.compra_id = co.compra_id
                and p.proveedor_id = co.proveedor_id
                and c.estado_id = e.estado_id
                and co.usuario_id = u.usuario_id
                ".$filtro."
                ".$condicion." 

            ORDER BY c.credito_fecha DESC

            
        ")->result_array();

        return $deuda;
    }
     function dato_deudas($filtro)
    {
        $deuda = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*

            FROM
                credito c, proveedor p, compra co, estado e

            WHERE
                c.compra_id = co.compra_id
                and p.proveedor_id = co.proveedor_id
                and c.estado_id = e.estado_id
                and c.credito_id=".$filtro." 

            ORDER BY c.credito_fecha DESC

            
        ")->result_array();

        return $deuda;
    }
        
    function get_cuentas($filtro,$condicion)
    {
        $deuda = $this->db->query("

           SELECT
                c.*, ve.venta_id as ventita, ve.cliente_id, e.*, p.cliente_id, p.cliente_nombre as kay , ve.usuario_id, u.usuario_nombre, f.factura_id

            FROM
                credito c

LEFT JOIN venta ve on c.venta_id = ve.venta_id
LEFT JOIN cliente p on ve.cliente_id = p.cliente_id
LEFT JOIN estado e on c.estado_id = e.estado_id
LEFT JOIN usuario u on ve.usuario_id = u.usuario_id 
LEFT JOIN factura f on c.credito_id = f.credito_id



            WHERE
                c.compra_id = 0
                 ".$filtro." 
                 ".$condicion."

            ORDER BY c.credito_fecha DESC


            
        ")->result_array();

        return $deuda;
    }

     function dato_cuentas($filtro)
    {
        $deuda = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*

            FROM
                credito c, cliente p, venta co, estado e

            WHERE
                c.venta_id = co.venta_id
                and p.cliente_id = co.cliente_id
                and c.estado_id = e.estado_id
                and c.credito_id=".$filtro." 

            ORDER BY c.credito_fecha DESC

            
        ")->result_array();

        return $deuda;
    }

    function dato_cuenta_serv($filtro)
    {
        $deuda = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*

            FROM
                credito c, cliente p, servicio co, estado e

            WHERE
                c.servicio_id = co.servicio_id
                and p.cliente_id = co.cliente_id
                and c.estado_id = e.estado_id
                and c.credito_id=".$filtro." 

            ORDER BY c.credito_fecha DESC

            
        ")->result_array();

        return $deuda;
    }
        
    /*
     * Get all credito
     */
    function get_all_credito($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $credito = $this->db->query("
            SELECT
                *

            FROM
                `credito`

            WHERE
                1 = 1

            ORDER BY `credito_id` DESC

            " . $limit_condition . "
        ")->result_array();

        return $credito;
    }
         function get_all_deuda($condicion)
    {
        
        
        $credito = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*, u.*

            FROM
                credito c, proveedor p, compra co, estado e, usuario u

            WHERE
                c.compra_id = co.compra_id
                and p.proveedor_id = co.proveedor_id
                and c.estado_id = e.estado_id
                and c.estado_id = 8
                and co.usuario_id = u.usuario_id
                ".$condicion."


            ORDER BY `credito_id` DESC  limit 150;

            
        ")->result_array();

        return $credito;
    }
    function filtrodeudas($filtro)
    {
        
        
        $credito = $this->db->query("
            SELECT
                c.*, p.*, co.*, e.*, u.*

            FROM
                credito c
                LEFT JOIN compra co on c.compra_id=co.compra_id
                LEFT JOIN proveedor p on co.proveedor_id=p.proveedor_id
                LEFT JOIN estado e on c.estado_id=e.estado_id
                LEFT JOIN usuario u on co.usuario_id=u.usuario_id

            WHERE
                
                ".$filtro."



            ORDER BY `credito_id` DESC

            
        ")->result_array();

        return $credito;
    }
     function get_all_cuentas($condicion)
    {
        
        $credito = $this->db->query("
              SELECT
                c.*, ve.*, e.*, p.*,  s.servicio_id, s.cliente_id , r.cliente_nombre as perro, s.usuario_id as ususer, ve.usuario_id, u.usuario_nombre, f.factura_id


            FROM
                credito c

LEFT JOIN venta ve on c.venta_id = ve.venta_id
LEFT JOIN cliente p on ve.cliente_id = p.cliente_id
LEFT JOIN estado e on c.estado_id = e.estado_id
LEFT JOIN servicio s on c.servicio_id = s.servicio_id
LEFT JOIN cliente r on s.cliente_id = r.cliente_id 
LEFT JOIN usuario u on ve.usuario_id = u.usuario_id 
LEFT JOIN factura f on c.credito_id = f.credito_id

            WHERE
                 c.estado_id = 8
                 and c.compra_id = 0
                ".$condicion."
            ORDER BY `credito_id` DESC  limit 150;
           
        ")->result_array();

        return $credito;
    }

    function filtrocuentas($filtro)
    {
        
        $credito = $this->db->query("
              SELECT
                c.*, ve.*, e.*, p.*,  s.servicio_id, s.cliente_id , r.cliente_nombre as perro, u.usuario_nombre

            FROM
                credito c

LEFT JOIN venta ve on c.venta_id = ve.venta_id
LEFT JOIN cliente p on ve.cliente_id = p.cliente_id
LEFT JOIN estado e on c.estado_id = e.estado_id
LEFT JOIN servicio s on c.servicio_id = s.servicio_id
LEFT JOIN cliente r on s.cliente_id = r.cliente_id 
LEFT JOIN usuario u on ve.usuario_id = u.usuario_id 

            WHERE
                ".$filtro."
                 
            ORDER BY `credito_id` DESC
           
        ")->result_array();

        return $credito;
    }
    /*
     * function to add new credito
     */
    function add_credito($params)
    {
        $this->db->insert('credito',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update credito
     */
    function update_credito($credito_id,$params)
    {
        $this->db->where('credito_id',$credito_id);
        return $this->db->update('credito',$params);
    }
    
    /*
     * function to delete credito
     */
    function delete_credito($credito_id)
    {
        return $this->db->delete('credito',array('credito_id'=>$credito_id));
    }

    function get_ventas($venta_id)
    {
        
        $credito = $this->db->query("
              SELECT
                ve.*, p.*

            FROM
                credito c

            LEFT JOIN venta ve on c.venta_id = ve.venta_id
            LEFT JOIN cliente p on ve.cliente_id = p.cliente_id

            WHERE
                ve.venta_id=".$venta_id."
      
           
        ",array($venta_id))->row_array();
        return $credito;
       }

    function get_credito_id($venta_id)
    {
        $sql = "select * from credito where venta_id =".$venta_id;
        $credito = $this->db->query($sql)->row_array();
        return $credito;
    }

    
}
