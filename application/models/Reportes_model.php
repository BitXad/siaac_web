<?php/*  * Generated by CRUDigniter v3.2  * www.crudigniter.com */class Reportes_model extends CI_Model{    function __construct()    {        parent::__construct();    }        function get_reportes($fecha1, $fecha2, $usuario_id)    {    if($usuario_id == 0){      $cadusuario1 = "";      $cadusuario2 = "";      $cadusuario3 = "";      $cadusuario4 = "";    }else{        $cadusuario1 = " and i.usuario_id = ".$usuario_id." ";        $cadusuario2 = " and m.usuario_id = ".$usuario_id." ";        $cadusuario3 = " and ip.usuario_id = ".$usuario_id." ";        $cadusuario4 = " and e.usuario_id = ".$usuario_id." ";    }        $ingresos = $this->db->query("        (select            i.ingreso_id as id, i.ingreso_fecha as fecha, concat(i.ingreso_nombre, ', ', i.ingreso_concepto) as detalle,            i.ingreso_monto as ingreso, 0 as egreso,            0 as utilidad, 1 as tipo      from            ingresos i      where            date(i.ingreso_fecha) >= '".$fecha1."'            and date(i.ingreso_fecha) <= '".$fecha2."'            ".$cadusuario1."      order by i.ingreso_fecha desc)      UNION      (select            m.mensualidad_id as id, m.mensualidad_fechapago as fecha, concat('COBRO DE MENSUALIDAD Nro.: ', m.mensualidad_numero, ', SEÑOR(A):', m.mensualidad_nombre, ', ', m.mensualidad_mes, ', ', m.mensualidad_glosa) as detalle,            m.mensualidad_montocancelado as ingreso, 0 as egreso,            0 as utilidad, 2 as tipo      from            mensualidad m      where            date(m.mensualidad_fechapago) >= '".$fecha1."'            and date(m.mensualidad_fechapago) <= '".$fecha2."'            ".$cadusuario2."      order by m.mensualidad_fechapago desc)      UNION      (select            ma.matricula_id as id, ma.matricula_fechapago as fecha, concat('INSCRIPCION ') as detalle,            ma.matricula_monto as ingreso, 0 as egreso,            0 as utilidad, 3 as tipo      from            matricula ma, inscripcion ip      where            date(ma.matricula_fechapago) >= '".$fecha1."'            and date(ma.matricula_fechapago) <= '".$fecha2."'            ".$cadusuario3."      order by ma.matricula_fechapago desc)      UNION      (select             e.egreso_id as id, e.egreso_fecha as fecha, concat(e.egreso_nombre, ', ', e.egreso_concepto) as detalle,            0 as ingreso, e.egreso_monto as egreso,            0 as utilidad, 4 as tipo      from            egresos e      where            date(e.egreso_fecha) >= '".$fecha1."'            and date(e.egreso_fecha) <= '".$fecha2."'            ".$cadusuario4."             order by e.egreso_fecha desc)        ")->result_array();        return $ingresos;    }        function get_inscritos($fecha1, $fecha2, $usuario_id, $gestion_id, $filtro)    {        if($usuario_id == 0){            $cadusuario1 = "";        }else{            $cadusuario1 = " and c.usuario_id = ".$usuario_id." ";        }        if($filtro == ""){            $porfechas = " and date(c.inscripcion_fecha) >= '".$fecha1."'                           and date(c.inscripcion_fecha) <= '".$fecha2."' ";        }else{            $porfechas = $filtro;        }        $inscritos = $this->db->query("        select c.*        from             consinscripcion c        where             c.gestion_id = $gestion_id             ".$porfechas."             ".$cadusuario1."        order by c.inscripcion_fecha desc        ")->result_array();        return $inscritos;    }}?>