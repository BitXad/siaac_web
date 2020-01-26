<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pedido_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    /*
     * Get all pedido count
     */
    function get_all_pedido_count()
    {
        $pedido = $this->db->query("
            SELECT
                count(*) as count

            FROM
                pedido
        ")->row_array();

        return $pedido['count'];
    }
        
    /*
     * Get all pedido count
     */
    function get_cliente_id($pedido_id)
    {
        $sql = "select cliente_id,usuario_id from pedido ".
               "where pedido_id = ".$pedido_id;
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
        
    /*
     * Get all pedido count
     */
    function get_pedido($pedido_id,$usuario_id)
    {
        $sql = "select p.*, 'NO DEFINIDO' as cliente_nombre,'NO DEFINIDO' as cliente_codigo,'-' as cliente_nombrenegocio,'-' as cliente_direccion, e.estado_descripcion, ".
                "'-' as cliente_telefono, '-' as cliente_celular, 'NO DEFINIDA' as zona_id ".
                " from pedido p, estado e ".
                "where pedido_id = ".$pedido_id." and p.usuario_id = ".$usuario_id." and p.estado_id = e.estado_id";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }

        
    /*
     * Get all pedido count
     */
    function get_pedidos_dia()
    {
        $sql = "select if(count(*)>0, count(*), 0) as cantidad_pedidos, if(sum(pedido_total)>0, sum(pedido_total), 0) as total_pedidos
                from pedido where date(pedido_fecha) = date(now()) and usuario_id>0";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }

        
    /*
     * Get all pedido count
     */
    function get_pedido_sin_nombre($usuario_id)
    {
        $sql = "select p.*, 'NO DEFINIDO' as cliente_nombre,'NO DEFINIDO' as cliente_codigo,'-' as cliente_nombrenegocio, e.estado_descripcion from pedido p, estado e ".
               "where p.usuario_id = ".$usuario_id." and p.estado_id = e.estado_id and p.cliente_id=0";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }

    /*
     * Get all cliente
     */
    
    function get_all_cliente($usuario_id)
    {
        $sql = "select * from cliente where usuario_id = ".$usuario_id;
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }

    /*
     * Get all pedido cliente
     */
    function get_pedido_cliente($pedido_id,$usuario_id)
    {
        $sql = "select p.*,c.*,e.estado_descripcion,e.estado_color from pedido p, estado e, cliente c ".
               "where pedido_id = ".$pedido_id." and p.usuario_id = ".$usuario_id." and p.estado_id = e.estado_id".
                " and p.cliente_id = c.cliente_id";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }
    /*
     * Get all pedido cliente
     */
    function get_pedidos_activos()
    {
//        $sql = "select p.*,c.cliente_nombre,c.cliente_codigo,c.cliente_nombrenegocio,e.estado_descripcion,e.estado_color "
//               ."from pedido p, estado e, cliente c ".
//               "where ".
//               "p.estado_id = e.estado_id".
//               " and p.cliente_id = c.cliente_id".
//               " and p.estado_id=11";

        $sql = "select p.*,c.cliente_nombre,c.cliente_codigo,c.cliente_nombrenegocio,e.estado_descripcion,e.estado_color, u.* 
                from pedido p
                left join estado e on e.estado_id = p.estado_id
                left join cliente c on c.cliente_id = p.cliente_id
                left join usuario u on u.usuario_id = p.usuario_id
                 where 
                 p.estado_id = 11";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }
      
    /*
     * Get all pedido cliente
     */
    function get_all_producto()
    {
        $sql = "select * from producto";
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }
      
    /*
     * Get all detalle pedido 
     */
    function get_detalle_pedido($pedido_id)
    {
        $sql = "select * from detalle_pedido ".
               "where pedido_id = ".$pedido_id;
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }
    
    /*
     * Get all pedido count
     */
    function crear_pedido($usuario_id)
    {
        $usuario_id = $usuario_id;
        $estado_id = 10; // pedido Abierto
        $cliente_id = 0;
        $tipotrans_id = 1;
        $pedido_fecha = "now()";
        $pedido_subtotal = 0;
        $pedido_descuento = 0;
        $pedido_total = 0;
        $pedido_glosa = "''";
        //estado 3 -> Abierto
        $sql = "insert into pedido(usuario_id,estado_id,cliente_id,tipotrans_id,pedido_fecha,pedido_subtotal,pedido_descuento,pedido_total,pedido_glosa) ".
                "value(".$usuario_id.",".$estado_id.",".$cliente_id.",".$tipotrans_id.",".$pedido_fecha.",".$pedido_subtotal.",".$pedido_descuento.",".$pedido_total.",".$pedido_glosa.")";
        $pedido = $this->db->query($sql);
        $pedido_id = $this->db->insert_id();
        return $pedido_id;        
        
    }
    
    /*
     * cambiar cliente
     */
    function cambiar_cliente($pedido_id,$cliente_id)
    {
        $sql = "update pedido set cliente_id = ".$cliente_id.
                " where pedido_id = ".$pedido_id;
        $pedido = $this->db->query($sql);                
        return $pedido_id;
        
    }
    
    /*
     * cambiar cliente
     */
    function ejecutar($sql)
    {
//        $pedido = $this->db->query($sql);
//        return $pedido;        
        $pedido = $this->db->query($sql);        
        $insert_id = $this->db->insert_id();   
        
        return $insert_id;
    }
    
    /*
     * Consulta para actualizar/modificar datos
     */
    function modificar($sql)
    {
      $pedido = $this->db->query($sql);        
       return true;
       
    }
        
    /*
     * Get all pedido
     */
    function get_all_pedido($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $pedido = $this->db->query("
            SELECT
                p.*, e.*,c.cliente_id, c.tipocliente_id, c.categoriaclie_id, 
                c.cliente_codigo, c.cliente_nombre, c.cliente_ci, c.cliente_direccion, 
                c.cliente_telefono, c.cliente_celular, c.cliente_foto, c.cliente_email, 
                c.cliente_nombrenegocio, c.cliente_aniversario, c.cliente_latitud, 
                c.cliente_longitud, c.cliente_nit, c.cliente_razon
            FROM
                pedido p, estado e, cliente c, usuario u

            WHERE
                p.estado_id = e.estado_id
                and p.cliente_id = c.cliente_id 
                and p.usuario_id = u.usuario_id                
            ORDER BY pedido_id DESC

            " . $limit_condition . "
        ")->result_array();

        return $pedido;
    }

    /*
     * get al pedidos por fecha
     */
    function get_pedidos($condicion)
    {

        $sql = "select 
                p.pedido_id,p.pedido_fecha,p.pedido_fechaentrega,p.pedido_glosa,
                p.pedido_horaentrega, p.pedido_latitud, p.pedido_longitud, p.estado_id,
                p.pedido_total, p.pedido_subtotal, p.pedido_descuento,
                c.cliente_id,c.tipocliente_id,c.categoriaclie_id,c.usuario_id,
                c.cliente_codigo,c.cliente_nombre,c.cliente_ci,c.cliente_direccion,c.cliente_telefono,
                c.cliente_celular,c.cliente_foto,c.cliente_email,c.cliente_nombrenegocio,
                c.cliente_aniversario,c.cliente_latitud,c.cliente_longitud,c.cliente_nit,
                c.cliente_razon,c.cliente_departamento,c.zona_id,
                e.estado_color,e.estado_descripcion, e.estado_tipo,
                u.usuario_nombre, u.usuario_email, t.tipotrans_nombre

                from pedido p
                left join cliente c on c.cliente_id = p.cliente_id
                left join estado e on e.estado_id = p.estado_id
                left join usuario u on u.usuario_id = p.usuario_id
                left join tipo_transaccion t on t.tipotrans_id = p.tipotrans_id
                where 1=1 
                 ".$condicion." 
                order by pedido_id desc";

        $pedido = $this->db->query($sql)->result_array();
        return $pedido;
        
    }
        
    /*
     * function to add new pedido
     */
    function add_pedido($params)
    {
        $this->db->insert('pedido',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pedido
     */
    function update_pedido($pedido_id,$params)
    {
        $this->db->where('pedido_id',$pedido_id);
        return $this->db->update('pedido',$params);
    }
    
    /*
     * function to delete pedido
     */
    function delete_pedido($pedido_id)
    {
        return $this->db->delete('pedido',array('pedido_id'=>$pedido_id));
    }

    /*
     * function to ejecutar consultas de seleccion
     */
    function consultar($sql)
    {        
        $result = $this->db->query($sql)->result_array();
        return $result;               
        
    }
    
    function get_mis_pedidos($usuario_id)
    {
        $sql = "select p.*,c.cliente_nombre,c.cliente_codigo,c.cliente_nombrenegocio,e.estado_descripcion,e.estado_color, 
                c.cliente_latitud, c.cliente_longitud, c.cliente_direccion, c.cliente_foto
               from pedido p, estado e, cliente c 
               where 
                p.estado_id = e.estado_id
                and p.cliente_id = c.cliente_id
                and p.estado_id = 11
                and p.usuario_id = ".$usuario_id;
        
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }    
    
    function get_mis_entregas($usuario_id)
    {
        $sql = "select p.*,c.cliente_nombre,c.cliente_codigo,c.cliente_nombrenegocio,e.estado_descripcion,e.estado_color, 
                c.cliente_latitud, c.cliente_longitud, c.cliente_direccion, c.cliente_foto
               from pedido p, estado e, cliente c 
               where 
                p.pedido_fechaentrega = date(now())
                and p.estado_id = e.estado_id
                and p.cliente_id = c.cliente_id
                and p.usuario_id = ".$usuario_id;
        
        $result = $this->db->query($sql)->result_array();
        return $result;        
    }    
    
function get_pedido_id($pedido_id)
{

    $sql = "select *
            from pedido p
            left join detalle_pedido d on d.pedido_id = p.pedido_id
            left join cliente c on c.cliente_id = p.cliente_id
            left join usuario u on u.usuario_id = p.usuario_id
            left join producto t on t.producto_id = d.producto_id
            left join zona z on z.zona_id = c.zona_id

            where p.pedido_id = ".$pedido_id;
    
    $pedido = $this->db->query($sql)->result_array();

    return $pedido;
}
}

    