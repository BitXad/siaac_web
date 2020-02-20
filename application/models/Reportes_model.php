<?php/*  * Generated by CRUDigniter v3.2  * www.crudigniter.com */class Reportes_model extends CI_Model{    function __construct()    {        parent::__construct();    }        function get_reportes($fecha1, $fecha2, $usuario_id)    {    if($usuario_id == 0){      $cadusuario1 = "";      $cadusuario2 = "";      $cadusuario3 = "";      $cadusuario4 = "";      $cadusuario5 = "";      $cadusuario6 = "";    }else{        $cadusuario1 = " and i.usuario_id = ".$usuario_id." ";        $cadusuario2 = " and m.usuario_id = ".$usuario_id." ";        $cadusuario3 = " and ip.usuario_id = ".$usuario_id." ";        $cadusuario4 = " and v.usuario_id = ".$usuario_id." ";        $cadusuario5 = " and e.usuario_id = ".$usuario_id." ";        $cadusuario6 = " and e.usuario_id = ".$usuario_id." ";    }        $ingresos = $this->db->query("        (select            i.ingreso_id as id, i.ingreso_fecha as fecha, i.ingreso_numero as recibo, if(f.factura_numero>0, f.factura_numero,'-') as esfactura,            concat('INGRESO N° ', i.ingreso_id, ', ', i.ingreso_nombre, ', ', i.ingreso_categoria) as detalle,            i.ingreso_monto as ingreso, 0 as egreso, 0 as utilidad, 1 as tipo, f.estado_id      from            ingresos i            left join factura f on i.ingreso_id = f.ingreso_id      where            date(i.ingreso_fecha) >= '".$fecha1."'            and date(i.ingreso_fecha) <= '".$fecha2."'            ".$cadusuario1."      order by i.ingreso_fecha desc)      UNION      (select            m.mensualidad_id as id, m.mensualidad_fechapago as fecha, m.mensualidad_numrec as recibo, if(f.factura_numero>0, f.factura_numero,'-') as esfactura,            concat('MENSUALIDAD N° ', m.mensualidad_id, ', ', concat(estudiante_nombre,' ',estudiante_apellidos), ', ',c.carrera_nombre) as detalle,            m.mensualidad_montocancelado as ingreso, 0 as egreso,0 as utilidad, 2 as tipo, f.estado_id      from            mensualidad m      left join kardex_economico k on m.kardexeco_id = k.kardexeco_id      left join inscripcion i on k.inscripcion_id = i.inscripcion_id      left join estudiante e on i.estudiante_id = e.estudiante_id      left join carrera c on i.carrera_id = c.carrera_id      left join factura f on m.mensualidad_id = f.mensualidad_id      where            date(m.mensualidad_fechapago) >= '".$fecha1."'            and date(m.mensualidad_fechapago) <= '".$fecha2."'            and (m.mensualidad_inscripcionpago is null or m.mensualidad_inscripcionpago = 0)            ".$cadusuario2."      group by m.mensualidad_id      ORDER BY m.mensualidad_numrec DESC )      UNION      (select            ip.inscripcion_id as id, ip.inscripcion_fecha as fecha, ip.inscripcion_numrecibo as recibo, if(f.factura_numero>0, f.factura_numero,'-') as esfactura,            concat('INSCRIPCION N° ', ip.inscripcion_id, ', ', concat(e.estudiante_nombre,' ',e.estudiante_apellidos), ', ',c.carrera_nombre, ', MATRIC.: ',k.kardexeco_matriculapagada, ', MENS.: ', k.kardexeco_mensualidadpagada) as detalle,            (sum(k.kardexeco_matriculapagada) + sum(k.kardexeco_mensualidadpagada)) as ingreso, 0 as egreso, 0 as utilidad, 3 as tipo, f.estado_id      from             inscripcion ip      left join kardex_economico k on ip.inscripcion_id = k.inscripcion_id      left join matricula m on ip.inscripcion_id = m.inscripcion_id      left join estudiante e on ip.estudiante_id = e.estudiante_id      left join carrera c on ip.carrera_id = c.carrera_id      left join factura f on ip.inscripcion_id = f.inscripcion_id      where            date(ip.inscripcion_fecha) >= '".$fecha1."'            and date(ip.inscripcion_fecha) <= '".$fecha2."'            ".$cadusuario3."      GROUP BY ip.inscripcion_id      order by ip.inscripcion_fecha desc)      UNION      (select            v.venta_id as id, v.venta_fecha as fecha, v.venta_numeroventa as recibo, if(f.factura_numero>0, f.factura_numero,'-') as esfactura,            concat('VENTA N° ', v.venta_id, ', ', c.cliente_nombre) as detalle,            v.venta_total as ingreso, 0 as egreso, 0 as utilidad, 4 as tipo, f.estado_id      from             venta v      left join cliente c on v.cliente_id = c.cliente_id      left join factura f on v.venta_id = f.venta_id      where            DATE(v.venta_fecha) >= '".$fecha1."'            and DATE(v.venta_fecha) <= '".$fecha2."'            ".$cadusuario4."      GROUP BY v.venta_id      order BY v.venta_fecha desc)      UNION      (select             e.egreso_id as id, e.egreso_fecha as fecha, e.egreso_numero as recibo, '-' as esfactura,            CONCAT('EGRESO N° ', e.egreso_id, ', ', e.egreso_nombre, ', ', e.egreso_categoria) as detalle,            0 as ingreso, e.egreso_monto as egreso, 0 as utilidad, 6 as tipo, 0 as estado_id      from            egresos e      where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario6."             order by e.egreso_fecha desc)        ")->result_array();        return $ingresos;    }        function get_inscritos($fecha1, $fecha2, $usuario_id, $gestion_id, $filtro)    {        if($usuario_id == 0){            $cadusuario1 = "";        }else{            $cadusuario1 = " and c.usuario_id = ".$usuario_id." ";        }        if($filtro == ""){            $porfechas = " and date(c.inscripcion_fecha) >= '".$fecha1."'                           and date(c.inscripcion_fecha) <= '".$fecha2."' ";        }else{            $porfechas = $filtro;        }        $inscritos = $this->db->query("        select c.*        from             consinscripcion c        where             c.gestion_id = $gestion_id             ".$porfechas."             ".$cadusuario1."        order by c.inscripcion_fecha desc        ")->result_array();        return $inscritos;    }}?>