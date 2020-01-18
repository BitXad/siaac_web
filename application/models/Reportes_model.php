<?php/*  * Generated by CRUDigniter v3.2  * www.crudigniter.com */class Reportes_model extends CI_Model{    function __construct()    {        parent::__construct();    }        function get_reportes($fecha1, $fecha2, $usuario_id){    if($usuario_id == 0){      $cadusuario1 = "";      $cadusuario2 = "";      $cadusuario3 = "";      $cadusuario4 = "";    }else{        $cadusuario1 = " and i.usuario_id = ".$usuario_id." ";        $cadusuario2 = " and m.usuario_id = ".$usuario_id." ";        $cadusuario3 = " and ip.usuario_id = ".$usuario_id." ";        $cadusuario4 = " and e.usuario_id = ".$usuario_id." ";    }        $ingresos = $this->db->query("        (select            i.ingreso_id as id, i.ingreso_fecha as fecha, concat(i.ingreso_nombre, ', ', i.ingreso_concepto) as detalle,            i.ingreso_monto as ingreso, 0 as egreso,            0 as utilidad, 1 as tipo      from            ingresos i      where            date(i.ingreso_fecha) >= '".$fecha1."'            and date(i.ingreso_fecha) <= '".$fecha2."'            ".$cadusuario1."      order by i.ingreso_fecha desc)      UNION      (select            m.mensualidad_id as id, m.mensualidad_fechapago as fecha, concat('COBRO DE MENSUALIDAD Nro.: ', m.mensualidad_numero, ', SEÑOR(A):', m.mensualidad_nombre, ', ', m.mensualidad_mes, ', ', m.mensualidad_glosa) as detalle,            m.mensualidad_montocancelado as ingreso, 0 as egreso,            0 as utilidad, 2 as tipo      from            mensualidad m      where            date(m.mensualidad_fechapago) >= '".$fecha1."'            and date(m.mensualidad_fechapago) <= '".$fecha2."'            ".$cadusuario2."      order by m.mensualidad_fechapago desc)      UNION      (select            ma.matricula_id as id, ma.matricula_fechapago as fecha, concat('DESCUENTO: ', ma.matricula_descuento) as detalle,            ma.matricula_monto as ingreso, 0 as egreso,            0 as utilidad, 3 as tipo      from            matricula ma, inscripcion ip      where            date(ma.matricula_fechapago) >= '".$fecha1."'            and date(ma.matricula_fechapago) <= '".$fecha2."'            ".$cadusuario3."      order by ma.matricula_fechapago desc)      UNION      (select             e.egreso_id as id, e.egreso_fecha as fecha, concat(e.egreso_nombre, ', ', e.egreso_concepto) as detalle,            0 as ingreso, e.egreso_monto as egreso,            0 as utilidad, 4 as tipo      from            egresos e      where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario4."             order by e.egreso_fecha desc)        ")->result_array();        return $ingresos;    }                                    function get_reportesANTERIORBORRAR($fecha1, $fecha2, $usuario_id){    if($usuario_id == 0){      $cadusuario1 = "";      $cadusuario2 = "";      $cadusuario3 = "";      $cadusuario4 = "";      $cadusuario5 = "";      $cadusuario6 = "";      $cadusuario10 = "";      $cadusuario11 = "";      $cadusuario12 = "";    }else{      $cadusuario1 = " and v.usuario_id = ".$usuario_id." ";      $cadusuario2 = " and c.usuario_id = ".$usuario_id." ";      $cadusuario3 = " and i.usuario_id = ".$usuario_id." ";      $cadusuario4 = " and e.usuario_id = ".$usuario_id." ";      $cadusuario5 = " and c.usuario_id = ".$usuario_id." ";      $cadusuario6 = " and c.usuario_id = ".$usuario_id." ";      $cadusuario10 = " and op.usuario_id2 = ".$usuario_id." ";      $cadusuario11 = " and d.usuario_id = ".$usuario_id." ";      $cadusuario12 = " and d.usuariopsaldo_id = ".$usuario_id." ";    }        $ingresos = $this->db->query("      (select            i.ingreso_id as id, i.ingreso_fecha as fecha, concat(i.ingreso_nombre, ', ', i.ingreso_concepto) as detalle,            i.ingreso_monto as ingreso, 0 as egreso,            0 as utilidad, 1 as tipo      from            ingresos i      where            date(i.ingreso_fecha) >= '".$fecha1."'            and date(i.ingreso_fecha) <= '".$fecha2."'            ".$cadusuario3."      order by i.ingreso_fecha desc)      /*UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 2 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 1            and v.tipotrans_id = 1            and v.estado_id = 1            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc )                  UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 21 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 2            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 22 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 3            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 23 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 4            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 24 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 5            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 7 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.tipotrans_id = 2            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 8 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.tipotrans_id = 3            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)      UNION      (select             v.venta_id as id, concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 9 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.tipotrans_id = 4            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc)            */      UNION      (select             cuota_id as id, concat(c.cuota_fecha, ' ', c.cuota_hora) as fecha, concat('Cliente: ', cl.cliente_nombre,', Cobro por credito N°: ', c.credito_id,', ', c.cuota_glosa) as detalle,            c.cuota_cancelado as ingreso, 0 as egreso,            c.cuota_interes as utilidad, 3 as tipo      from            cuota c, credito cr, cliente cl, venta v      where            date(c.cuota_fecha) >= '".$fecha1."'            and date(c.cuota_fecha) <= '".$fecha2."'            and c.credito_id = cr.credito_id            and cr.venta_id = v.venta_id            and cl.cliente_id = v.cliente_id            and c.estado_id = 9            and (cr.venta_id > 0 or cr.venta_id is not null )            ".$cadusuario6."            order by c.cuota_fecha desc, c.cuota_hora desc)      UNION      (select             e.egreso_id as id, e.egreso_fecha as fecha, concat(e.egreso_nombre, ', ', e.egreso_concepto) as detalle,            0 as ingreso, e.egreso_monto as egreso,            0 as utilidad, 4 as tipo      from            egresos e      where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario4."             order by e.egreso_fecha desc)      UNION      (select             c.compra_id as id, concat(c.compra_fecha, ' ', c.compra_hora) as fecha, concat('Proveedor: ', pv.proveedor_nombre) as detalle,            0 as ingreso, ifnull(c.compra_totalfinal, 0) as egreso,            0 as utilidad, 5 as tipo      from            compra c, proveedor pv      where            date(c.compra_fecha) >= '".$fecha1."'            and date(c.compra_fecha) <= '".$fecha2."'            and c.compra_caja = 1            and c.tipotrans_id = 1            and c.proveedor_id = pv.proveedor_id            ".$cadusuario2."             order by c.compra_fecha desc, c.compra_hora desc)      UNION      (select             c.cuota_id as id, concat(c.cuota_fecha, ' ', c.cuota_hora) as fecha, concat('Proveedor: ',p.proveedor_nombre,', Pago por credito N°: ', c.credito_id,', ', c.cuota_glosa) as detalle,            0 as ingreso, c.cuota_cancelado as egreso,            0 as utilidad, 6 as tipo      from            cuota c, credito cr, proveedor p, compra co      where            date(c.cuota_fecha) >= '".$fecha1."'            and date(c.cuota_fecha) <= '".$fecha2."'            and c.credito_id = cr.credito_id            and c.estado_id = 9            and cr.compra_id = co.compra_id            and p.proveedor_id = co.proveedor_id            and (c.cuota_ordenpago = 0 or c.cuota_ordenpago is null)            and (cr.compra_id > 0 or cr.compra_id  <> null )            ".$cadusuario5."            order by c.cuota_fecha desc, c.cuota_hora desc)                       UNION      (select             op.orden_id as id, concat(op.orden_fechapago, ' ', op.orden_horapago) as fecha, concat(op.orden_motivo, ', Empresa:', op.orden_destinatario,', Cobrado por: ', op.orden_cobradapor, ' C.I.:', op.orden_ci) as detalle,            0 as ingreso, op.orden_cancelado as egreso,            0 as utilidad, 10 as tipo      from            orden_pago op      where            date(op.orden_fechapago) >= '".$fecha1."'            and date(op.orden_fechapago) <= '".$fecha2."'            and op.estado_id = 9            ".$cadusuario10."            order by op.orden_fechapago desc, op.orden_horapago desc)        UNION        (SELECT                d.detalleserv_id as id,                concat(s.servicio_fecharecepcion, ' ', s.servicio_horarecepcion) as fecha,                 concat('Cliente: ', c.cliente_nombre, ', ',  d.detalleserv_descripcion, ', A.C.:', d.detalleserv_acuenta ) as detalle,                d.detalleserv_acuenta as ingreso,                0 as egreso,  0 as utilidad, 11 as tipo                        FROM                detalle_serv d            LEFT JOIN servicio s on d.servicio_id = s.servicio_id            LEFT JOIN cliente c on s.cliente_id = c.cliente_id            LEFT JOIN estado e on s.estado_id = e.estado_id           WHERE                date(s.servicio_fecharecepcion) >= '".$fecha1."'                and date(s.servicio_fecharecepcion) <= '".$fecha2."' ".$cadusuario11."                order by s.servicio_fecharecepcion desc, s.servicio_horarecepcion desc)        UNION        (SELECT                d.detalleserv_id as id,                concat(d.detalleserv_fechaentregado, ' ', d.detalleserv_horaentregado) as fecha,                 concat('Cliente: ', c.cliente_nombre, ', ',  d.detalleserv_descripcion, ', SALDO:', d.detalleserv_saldo) as detalle,                d.detalleserv_saldo as ingreso,                0 as egreso, (select                       (d.detalleserv_total-sum(dv.detalleven_total)-d.detalleserv_acuenta) as total_insumo                  from                       detalle_venta dv, producto p                 where                       dv.producto_id = p.producto_id                       and dv.detalleserv_id = d.detalleserv_id) as utilidad, 12 as tipo                        FROM                detalle_serv d            LEFT JOIN servicio s on d.servicio_id = s.servicio_id            LEFT JOIN cliente c on s.cliente_id = c.cliente_id            LEFT JOIN estado e on s.estado_id = e.estado_id           WHERE                date(d.detalleserv_fechaentregado) >= '".$fecha1."'                and date(d.detalleserv_fechaentregado) <= '".$fecha2."' ".$cadusuario12."                order by d.detalleserv_fechaentregado desc, d.detalleserv_horaentregado desc)               ")->result_array();        return $ingresos;    }        function get_reptotaling_efectivo($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and i.usuario_id = ".$usuario_id." ";        }        $ingresos = $this->db->query("          select                 SUM(i.ingreso_monto) as total          from                ingresos i          where                date(i.ingreso_fecha) >= '".$fecha1."'                and date(i.ingreso_fecha) <= '".$fecha2."'                ".$cadusuario."          order by i.ingreso_fecha desc        ")->row_array();                return $ingresos['total'];    }        /* *******************Obtiene la sumatoria de las ventas************************ */    function get_reptotal_ventas($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and i.usuario_id = ".$usuario_id." ";        }        $ingresos = $this->db->query("          select                SUM(d.detalleven_total) as total      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 1            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario."             order by v.venta_fecha desc, v.venta_hora desc        ")->row_array();                return $ingresos['total'];    }        /* *******************Obtiene la sumatoria de los cobros a Credito************************ */    function get_reptotal_cobroscredito($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and i.usuario_id = ".$usuario_id." ";        }        $ingresos = $this->db->query("          select                SUM(c.cuota_cancelado) as total      from            cuota c, credito cr      where            date(c.cuota_fecha) >= '".$fecha1."'            and date(c.cuota_fecha) <= '".$fecha2."'            and c.credito_id = cr.credito_id            and c.estado_id = 9            and (cr.venta_id > 0 or cr.venta_id <>null )            ".$cadusuario."      order by c.cuota_fecha desc, c.cuota_hora desc        ")->row_array();                return $ingresos['total'];    }    /* ********************Obtiene la suma total de reporte de egreso ******************************************* */    function get_reptotalegr_efectivo($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and i.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("          select                 SUM(e.egreso_monto) as total          from                egresos e          where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario."             order by e.egreso_fecha desc        ")->row_array();                return $egresos['total'];    }    /* ********************Obtiene la suma total de reporte de compras ******************************************* */    function get_reptotalegr_compras($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and i.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("          select                SUM(c.compra_totalfinal) as total          from                compra c, proveedor pv          where            date(c.compra_fecha) >= '".$fecha1."'            and date(c.compra_fecha) <= '".$fecha2."'            and c.compra_caja = 1            and c.tipotrans_id = 1            and c.proveedor_id = pv.proveedor_id            ".$cadusuario."             order by c.compra_fecha desc, c.compra_hora desc        ")->row_array();                return $egresos['total'];    }        /* ********************Obtiene los reportes de Ventas por tarjeta de debito ******************************************* */    function get_repdebito_ventas($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and v.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("         select             concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 22 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 2            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario."             order by v.venta_fecha desc, v.venta_hora desc        ")->result_array();                return $egresos;    }        /* ********************Obtiene los reportes de Ventas por transaccion bancaria ******************************************* */    function get_reptransban_ventas($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and v.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("         select             concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 22 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 3            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario."             order by v.venta_fecha desc, v.venta_hora desc        ")->result_array();                return $egresos;    }        /* ********************Obtiene los reportes de Ventas por tarjetas de credito ******************************************* */    function get_reptarjcredito_ventas($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and v.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("         select             concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 22 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 4            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario."             order by v.venta_fecha desc, v.venta_hora desc        ")->result_array();                return $egresos;    }        /* ********************Obtiene los reportes de Ventas por transaccion bancaria ******************************************* */    function get_repcheque_ventas($fecha1, $fecha2, $usuario_id)    {        if($usuario_id == 0){          $cadusuario = "";        }else{          $cadusuario = " and v.usuario_id = ".$usuario_id." ";        }        $egresos = $this->db->query("         select             concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 22 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 5            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario."             order by v.venta_fecha desc, v.venta_hora desc        ")->result_array();                return $egresos;    }        function get_egresoreportes($fecha1, $fecha2, $usuario_id)    {        $cadusuario2  = " and c.usuario_id = ".$usuario_id." ";        $cadusuario4  = " and e.usuario_id = ".$usuario_id." ";        $cadusuario5  = " and c.usuario_id = ".$usuario_id." ";        $cadusuario10 = " and op.usuario_id2 = ".$usuario_id." ";        $egresos = $this->db->query("            (select             e.egreso_fecha as fecha, concat(e.egreso_nombre, ', ', e.egreso_concepto) as detalle,            0 as ingreso, e.egreso_monto as egreso,            0 as utilidad, 4 as tipo      from            egresos e      where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario4."             order by e.egreso_fecha desc)      UNION      (select             concat(c.compra_fecha, ' ', c.compra_hora) as fecha, concat('Proveedor: ', pv.proveedor_nombre) as detalle,            0 as ingreso, ifnull(c.compra_totalfinal, 0) as egreso,            0 as utilidad, 5 as tipo      from            compra c, proveedor pv      where            date(c.compra_fecha) >= '".$fecha1."'            and date(c.compra_fecha) <= '".$fecha2."'            and c.compra_caja = 1            and c.tipotrans_id = 1            and c.proveedor_id = pv.proveedor_id            ".$cadusuario2."             order by c.compra_fecha desc, c.compra_hora desc)      UNION      (select             concat(c.cuota_fecha, ' ', c.cuota_hora) as fecha, concat('Pago por credito N°: ', c.credito_id) as detalle,            0 as ingreso, c.cuota_cancelado as egreso,            0 as utilidad, 6 as tipo      from            cuota c, credito cr      where            date(c.cuota_fecha) >= '".$fecha1."'            and date(c.cuota_fecha) <= '".$fecha2."'            and c.credito_id = cr.credito_id            and c.estado_id = 9            and (cr.compra_id > 0 or cr.compra_id <>null )            ".$cadusuario5."            order by c.cuota_fecha desc, c.cuota_hora desc)        UNION      (select             concat(op.orden_fechapago, ' ', op.orden_horapago) as fecha, concat(op.orden_motivo, ', Empresa:', op.orden_destinatario,', Cobrado por: ', op.orden_cobradapor, ' C.I.:', op.orden_ci) as detalle,            0 as ingreso, op.orden_cancelado as egreso,            0 as utilidad, 10 as tipo      from            orden_pago op      where            date(op.orden_fechapago) >= '".$fecha1."'            and date(op.orden_fechapago) <= '".$fecha2."'            and op.estado_id = 9            ".$cadusuario10."            order by op.orden_fechapago desc, op.orden_horapago desc)           ")->result_array();        return $egresos;    }        function get_ingresoreportes($fecha1, $fecha2, $usuario_id)    {      $cadusuario1 = " and v.usuario_id = ".$usuario_id." ";      $cadusuario3 = " and i.usuario_id = ".$usuario_id." ";      $cadusuario6 = " and c.usuario_id = ".$usuario_id." ";        $ingresos = $this->db->query("           (select             i.ingreso_fecha as fecha, concat(i.ingreso_nombre, ', ', i.ingreso_concepto) as detalle,            i.ingreso_monto as ingreso, 0 as egreso,            0 as utilidad, 1 as tipo      from            ingresos i      where            date(i.ingreso_fecha) >= '".$fecha1."'            and date(i.ingreso_fecha) <= '".$fecha2."'            ".$cadusuario3."      order by i.ingreso_fecha desc)      UNION      (select             concat(v.venta_fecha, ' ', v.venta_hora) as fecha, p.producto_nombre as detalle,            d.detalleven_total as ingreso, 0 as egreso,            d.detalleven_total-(d.detalleven_costo * d.detalleven_cantidad) as utilidad, 2 as tipo      from            venta v, detalle_venta d, producto p      where            date(v.venta_fecha) >= '".$fecha1."'            and date(v.venta_fecha) <= '".$fecha2."'            and v.forma_id = 1            and v.tipotrans_id = 1            and v.estado_id = 1            and v.venta_id = d.venta_id            and d.producto_id = p.producto_id             ".$cadusuario1."             order by v.venta_fecha desc, v.venta_hora desc )      UNION      (select             concat(c.cuota_fecha, ' ', c.cuota_hora) as fecha, concat('Cuota credito N°: ', c.credito_id) as detalle,            c.cuota_cancelado as ingreso, 0 as egreso,            c.cuota_interes as utilidad, 3 as tipo      from            cuota c, credito cr      where            date(c.cuota_fecha) >= '".$fecha1."'            and date(c.cuota_fecha) <= '".$fecha2."'            and c.credito_id = cr.credito_id            and c.estado_id = 9            and (cr.venta_id > 0 or cr.venta_id <>null )            ".$cadusuario6."      order by c.cuota_fecha desc, c.cuota_hora desc)        ")->result_array();        return $ingresos;    }    }?>