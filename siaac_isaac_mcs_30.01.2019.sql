drop table if exists administrativo;

drop table if exists area_carrera;

drop table if exists area_materia;

drop table if exists aula;

drop table if exists carrera;

drop table if exists detalle_factura;

drop table if exists docente;

drop table if exists estado;

drop table if exists estado_civil;

drop table if exists estudiante;

drop table if exists factura;

drop table if exists genero;

drop table if exists gestion;

drop table if exists grupo;

drop table if exists horario;

drop table if exists inscripcion;

drop table if exists institucion;

drop table if exists kardex_academico;

drop table if exists kardex_economico;

drop table if exists materia;

drop table if exists materia_asignada;

drop table if exists matricula;

drop table if exists mensualidad;

drop table if exists nivel;

drop table if exists nota;

drop table if exists paralelo;

drop table if exists periodo;

drop table if exists plan_academico;

drop table if exists rol;

drop table if exists turno;

drop table if exists usuario;

/*==============================================================*/
/* table: administrativo                                        */
/*==============================================================*/
create table administrativo
(
   administrativo_id    int not null,
   estado_id            int,
   estadocivil_id       int,
   institucion_id       int,
   genero_id            int,
   administrativo_nombre varchar(50),
   administrativo_apellidos varchar(50),
   administrativo_fechanac date,
   administrativo_edad  int,
   administrativo_ci    varchar(50),
   administrativo_extci varchar(15),
   administrativo_codigo varchar(50),
   administrativo_direccion varchar(50),
   administrativo_telefono varchar(50),
   administrativo_celular varchar(50),
   administrativo_cargo varchar(50),
   administrativo_foto  varchar(250),
   administrativo_fechareg timestamp,
   primary key (administrativo_id)
);

/*==============================================================*/
/* table: area_carrera                                          */
/*==============================================================*/
create table area_carrera
(
   areacarrera_id       int not null,
   areacarrera_nombre   varchar(50),
   primary key (areacarrera_id)
);

/*==============================================================*/
/* table: area_materia                                          */
/*==============================================================*/
create table area_materia
(
   area_id              int not null auto_increment,
   area_nombre          varchar(100),
   area_fechareg        timestamp,
   primary key (area_id)
);

/*==============================================================*/
/* table: aula                                                  */
/*==============================================================*/
create table aula
(
   aula_id              int not null auto_increment,
   aula_nombre          varchar(150),
   aula_descripcion     varchar(250),
   aula_capacidad       int,
   aula_tipo            varchar(50),
   primary key (aula_id)
);

/*==============================================================*/
/* table: carrera                                               */
/*==============================================================*/
create table carrera
(
   carrera_id           int not null auto_increment,
   inscripcion_id       int,
   areacarrera_id       int,
   carrera_nombre       varchar(150),
   carrera_nombreinterno varchar(150),
   carrera_codigo       varchar(50),
   carrera_nivel        varchar(50),
   carrera_modalidad    varchar(50),
   carrera_plan         varchar(50),
   carrera_fechacreacion date,
   carrera_codaprod     varchar(50),
   carrera_matricula    float,
   carrera_mensualidad  float,
   carrera_nummeses     int,
   primary key (carrera_id)
);

/*==============================================================*/
/* table: detalle_factura                                       */
/*==============================================================*/
create table detalle_factura
(
   detalle_id           int not null,
   factura_id           int,
   detalle_descripcion  varchar(250),
   detalle_cantidad     float,
   detalle_precio       float,
   detalle_subtotal     float,
   detalle_descuento    float,
   detalle_totalfinal   float,
   detalle_caracteristicas text,
   primary key (detalle_id)
);

/*==============================================================*/
/* table: docente                                               */
/*==============================================================*/
create table docente
(
   docente_id           int not null auto_increment,
   estado_id            int,
   est_estado_id        int,
   genero_id            int,
   docente_nombre       varchar(50),
   docente_apellidos    varchar(50),
   docente_fechanac     date,
   docente_edad         int,
   docente_ci           varchar(50),
   docente_extci        varchar(15),
   docente_codigo       varchar(50),
   docente_direccion    varchar(50),
   docente_telefono     varchar(50),
   docente_celular      varchar(50),
   docente_titulo       varchar(50),
   docente_especialidad varchar(50),
   docente_foto         varchar(50),
   docente_email        varchar(50),
   primary key (docente_id)
);

/*==============================================================*/
/* table: estado                                                */
/*==============================================================*/
create table estado
(
   estado_id            int not null,
   estado_descripcion   varchar(50),
   estado_color         varchar(15),
   estado_tipo          int,
   primary key (estado_id)
);

/*==============================================================*/
/* table: estado_civil                                          */
/*==============================================================*/
create table estado_civil
(
   estadocivil_id       int not null auto_increment,
   estadocivil_descripcion varchar(50),
   primary key (estadocivil_id)
);

/*==============================================================*/
/* table: estudiante                                            */
/*==============================================================*/
create table estudiante
(
   estudiante_id        int not null auto_increment,
   estado_id            int,
   genero_id            int,
   estadocivil_id       int,
   estudiante_nombre    varchar(50),
   estudiante_apellidos varchar(75),
   estudiante_fechanac  date,
   estudiante_edad      int,
   estudiante_ci        varchar(50),
   estudiante_extci     varchar(50),
   estudiante_direccion varchar(150),
   estudiante_telefono  varchar(50),
   estudiante_celular   varchar(50),
   estudiante_foto      varchar(250),
   estudiante_lugarnac  varchar(50),
   estudiante_nacionalidad varchar(50),
   estudiante_establecimiento varchar(150),
   estudiante_distrito  varchar(150),
   estudiante_apoderado varchar(150),
   apoderado_foto       varchar(250),
   estudiante_apodireccion varchar(150),
   estudiante_apoparentesco varchar(50),
   estudiante_apotelefono varchar(50),
   estudiante_nit       varchar(50),
   estudiante_razon     varchar(150),
   primary key (estudiante_id)
);

/*==============================================================*/
/* table: factura                                               */
/*==============================================================*/
create table factura
(
   factura_id           int not null auto_increment,
   matricula_id         int,
   mensualidad_id       int,
   primary key (factura_id)
);

/*==============================================================*/
/* table: genero                                                */
/*==============================================================*/
create table genero
(
   genero_id            int not null auto_increment,
   genero_nombre        varchar(30),
   primary key (genero_id)
);

/*==============================================================*/
/* table: gestion                                               */
/*==============================================================*/
create table gestion
(
   gestion_id           int not null auto_increment,
   estado_id            int,
   gestion_descripcion  int,
   gestion_semestre     int,
   gestion_inicio       date,
   gestion_fin          date,
   gestion_estado       varchar(50),
   primary key (gestion_id)
);

/*==============================================================*/
/* table: grupo                                                 */
/*==============================================================*/
create table grupo
(
   grupo_id             int not null auto_increment,
   horario_id           int,
   docente_id           int,
   gestion_id           int,
   usuario_id           int,
   aula_id              int,
   materia_id           int,
   grupo_nombre         varchar(150),
   grupo_descripcion    varchar(150),
   grupo_horanicio      time,
   grupo_horafin        time,
   primary key (grupo_id)
);

/*==============================================================*/
/* table: horario                                               */
/*==============================================================*/
create table horario
(
   horario_id           int not null auto_increment,
   estado_id            int,
   periodo_id           int,
   horario_desde        time,
   horario_hasta        time,
   primary key (horario_id)
);

/*==============================================================*/
/* table: inscripcion                                           */
/*==============================================================*/
create table inscripcion
(
   inscripcion_id       int not null auto_increment,
   usuario_id           int,
   gestion_id           int,
   estudiante_id        int,
   paralelo_id          int,
   nivel_id             int,
   turno_id             int,
   inscripcion_fecha    date,
   inscripcion_hora     time,
   inscripcion_fechainicio date,
   primary key (inscripcion_id)
);

/*==============================================================*/
/* table: institucion                                           */
/*==============================================================*/
create table institucion
(
   institucion_id       int not null,
   institucion_nombre   varchar(250),
   institucion_direccion varchar(250),
   institucion_telefono varchar(50),
   institucion_fechacreacion date,
   institucion_logo     varchar(150),
   institucion_ubicacion varchar(150),
   institucion_distrito varchar(150),
   institucion_zona     varchar(50),
   institucion_slogan   varchar(250),
   institucion_departamento varchar(150),
   institucion_codigo   varchar(20),
   primary key (institucion_id)
);

/*==============================================================*/
/* table: kardex_academico                                      */
/*==============================================================*/
create table kardex_academico
(
   kardexacad_id        int not null auto_increment,
   inscripcion_id       int,
   kardexacad_notfinal1 int,
   kardexacad_notfinal2 int,
   kardexacad_notfinal3 int,
   kardexacad_notfinal4 int,
   kardexacad_notfinal5 int,
   kardexacad_notfinal  int,
   kardexacad_estado    varchar(20),
   primary key (kardexacad_id)
);

/*==============================================================*/
/* table: kardex_economico                                      */
/*==============================================================*/
create table kardex_economico
(
   kardexeco_id         int not null auto_increment,
   inscripcion_id       int,
   estado_id            int,
   kardexeco_matricula  float,
   kardexeco_mensualidad float,
   kardexeco_nummens    int,
   kardexeco_observacion varchar(250),
   kardexeco_fecha      date,
   kardexeco_hora       time,
   primary key (kardexeco_id)
);

/*==============================================================*/
/* table: materia                                               */
/*==============================================================*/
create table materia
(
   materia_id           int not null auto_increment,
   area_id              int,
   nivel_id             int,
   mat_materia_id       int,
   estado_id            int,
   materia_nombre       varchar(100),
   materia_alias        varchar(100),
   materia_codigo       varchar(50),
   materia_hp           int,
   materia_ht           int,
   materia_th           int,
   materia_cyp          int,
   materia_cys          int,
   materia_vtt          int,
   materia_ctp          int,
   materia_estapa1      int,
   materia_estapa2      int,
   materia_estapa3      int,
   materia_estapa4      int,
   materia_numareas     int,
   materia_notainstancia int,
   materia_notaaprobado int,
   materia_maxima       int,
   materia_calificacion1 varchar(20),
   materia_ponderado1   int,
   materia_calificacion2 varchar(20),
   materia_ponderado2   int,
   materia_calificacion3 varchar(20),
   materia_ponderado3   int,
   materia_calificacion4 varchar(20),
   materia_ponderado4   int,
   materia_ponderado5   varchar(20),
   materia_calificacion5 int,
   materia_calificacion6 varchar(20),
   materia_ponderado6   int,
   materia_calificacion7 varchar(20),
   materia_ponderado7   int,
   primary key (materia_id)
);

/*==============================================================*/
/* table: materia_asignada                                      */
/*==============================================================*/
create table materia_asignada
(
   materiaasig_id       int not null auto_increment,
   estado_id            int,
   kardexacad_id        int,
   materiaasig_nombre   varchar(150),
   materiaasig_codigo   varchar(50),
   primary key (materiaasig_id)
);

/*==============================================================*/
/* table: matricula                                             */
/*==============================================================*/
create table matricula
(
   matricula_id         int not null auto_increment,
   inscripcion_id       int,
   matricula_fechapago  date,
   matricula_horapago   time,
   matricula_fechalimite date,
   matricula_monto      float,
   matricula_descuento  float,
   matricula_total      float,
   primary key (matricula_id)
);

/*==============================================================*/
/* table: mensualidad                                           */
/*==============================================================*/
create table mensualidad
(
   mensualidad_id       int not null auto_increment,
   estado_id            int,
   kardexeco_id         int,
   usuario_id           int,
   mensualidad_numero   int,
   mensualidad_montoparcial float,
   mensualidad_descuento float,
   mensualidad_montototal float,
   mensualidad_fechalimite date,
   mensualidad_mora     int,
   mensualidad_fechapago date,
   mensualidad_horapago time,
   mensualidad_nombre   varchar(150),
   mensualidad_ci       varchar(50),
   mensualidad_glosa    varchar(150),
   primary key (mensualidad_id)
);

/*==============================================================*/
/* table: nivel                                                 */
/*==============================================================*/
create table nivel
(
   nivel_id             int not null auto_increment,
   plan_academico_id    int,
   nivel_descripcion    varchar(150),
   primary key (nivel_id)
);

/*==============================================================*/
/* table: nota                                                  */
/*==============================================================*/
create table nota
(
   nota_id              int not null auto_increment,
   estado_id            int,
   materiaasig_id       int,
   nota_aistencia       int,
   nota_trabinv         int,
   nota_dps             int,
   nota_pruebprac       int,
   nota_pruebbim        int,
   nota_puntajetot      int,
   nota_numbimestre     int,
   nota_pond1_mat       int,
   nota_pond2_mat       int,
   nota_pond3_mat       int,
   nota_pond4_mat       int,
   nota_pond5_mat       int,
   nota_pond6_mat       int,
   nota_pond7_ma        int,
   nota_fec_registrada  timestamp,
   nota_bimestre        int,
   nota_notafinal       int,
   primary key (nota_id)
);

/*==============================================================*/
/* table: paralelo                                              */
/*==============================================================*/
create table paralelo
(
   paralelo_id          int not null auto_increment,
   estado_id            int,
   paralelo_descripcion varchar(50),
   primary key (paralelo_id)
);

/*==============================================================*/
/* table: periodo                                               */
/*==============================================================*/
create table periodo
(
   periodo_id           int not null auto_increment,
   periodo_nombre       varchar(100),
   periodo_horainicio   time,
   periodo_horafin      time,
   primary key (periodo_id)
);

/*==============================================================*/
/* table: plan_academico                                        */
/*==============================================================*/
create table plan_academico
(
   plan_academico_id    int not null auto_increment,
   estado_id            int,
   carrera_id           int,
   plan_academico_nombre varchar(100),
   plan_academico_feccreacion date,
   plan_academico_codigo varchar(100),
   plan_academico_titmodalidad varchar(50),
   plan_academico_cantgestion int,
   primary key (plan_academico_id)
);

/*==============================================================*/
/* table: rol                                                   */
/*==============================================================*/
create table rol
(
   rol_id               int not null auto_increment,
   estado_id            int,
   rol_nombre           varchar(250),
   rol_descripcion      varchar(250),
   primary key (rol_id)
);

/*==============================================================*/
/* table: turno                                                 */
/*==============================================================*/
create table turno
(
   turno_id             int not null auto_increment,
   estado_id            int,
   turno_nombre         varchar(100),
   primary key (turno_id)
);

/*==============================================================*/
/* table: usuario                                               */
/*==============================================================*/
create table usuario
(
   usuario_id           int not null auto_increment,
   usuario_nombre       varchar(50),
   usuario_email        varchar(50),
   usuario_login        varchar(50),
   usuario_clave        date,
   usuario_imagen       longblob,
   primary key (usuario_id)
);

alter table administrativo add constraint fk_estadocivil_administrativo foreign key (estadocivil_id)
      references estado_civil (estadocivil_id) on delete restrict;

alter table administrativo add constraint fk_estado_administrativo foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table administrativo add constraint fk_genero_administrativo foreign key (genero_id)
      references genero (genero_id) on delete restrict;

alter table administrativo add constraint fk_institucion foreign key (institucion_id)
      references institucion (institucion_id) on delete restrict;

alter table carrera add constraint fk_area_carrera foreign key (areacarrera_id)
      references area_carrera (areacarrera_id) on delete restrict;

alter table carrera add constraint fk_carrera_inscripcion foreign key (inscripcion_id)
      references inscripcion (inscripcion_id) on delete restrict;

alter table detalle_factura add constraint fk_detalle_factura foreign key (factura_id)
      references factura (factura_id) on delete restrict;

alter table docente add constraint fk_estado_docente foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table docente add constraint fk_genero_docente foreign key (genero_id)
      references genero (genero_id) on delete restrict;

alter table docente add constraint fk_relationship_38 foreign key (est_estado_id)
      references estado (estado_id) on delete restrict;

alter table estudiante add constraint fk_estadocivil_estudiante foreign key (estadocivil_id)
      references estado_civil (estadocivil_id) on delete restrict;

alter table estudiante add constraint fk_estado_estudiante foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table estudiante add constraint fk_genero_estudiante foreign key (genero_id)
      references genero (genero_id) on delete restrict;

alter table factura add constraint fk_factura_matricula foreign key (matricula_id)
      references matricula (matricula_id) on delete restrict;

alter table factura add constraint fk_relationship_34 foreign key (mensualidad_id)
      references mensualidad (mensualidad_id) on delete restrict;

alter table gestion add constraint fk_estado_gestion foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table grupo add constraint fk_aula_grupo foreign key (aula_id)
      references aula (aula_id) on delete restrict;

alter table grupo add constraint fk_docente_grupo foreign key (docente_id)
      references docente (docente_id) on delete restrict;

alter table grupo add constraint fk_grupo_gestion foreign key (gestion_id)
      references gestion (gestion_id) on delete restrict;

alter table grupo add constraint fk_grupo_materia foreign key (materia_id)
      references materia (materia_id) on delete restrict;

alter table grupo add constraint fk_horario_grupo foreign key (horario_id)
      references horario (horario_id) on delete restrict;

alter table grupo add constraint fk_usuario_grupo foreign key (usuario_id)
      references usuario (usuario_id) on delete restrict;

alter table horario add constraint fk_estado_horario foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table horario add constraint fk_periodo_horario foreign key (periodo_id)
      references periodo (periodo_id) on delete restrict;

alter table inscripcion add constraint fk_estudiante_inscripcion foreign key (estudiante_id)
      references estudiante (estudiante_id) on delete restrict;

alter table inscripcion add constraint fk_gestion_inscripcion foreign key (gestion_id)
      references gestion (gestion_id) on delete restrict;

alter table inscripcion add constraint fk_nivel_inscripcion foreign key (nivel_id)
      references nivel (nivel_id) on delete restrict;

alter table inscripcion add constraint fk_paralelo_inscripcion foreign key (paralelo_id)
      references paralelo (paralelo_id) on delete restrict;

alter table inscripcion add constraint fk_turno_inscripcion foreign key (turno_id)
      references turno (turno_id) on delete restrict;

alter table inscripcion add constraint fk_usuario_incripcion foreign key (usuario_id)
      references usuario (usuario_id) on delete restrict;

alter table kardex_academico add constraint fk_cardexacad_inscripcion foreign key (inscripcion_id)
      references inscripcion (inscripcion_id) on delete restrict;

alter table kardex_economico add constraint fk_cardexeco_inscripcion foreign key (inscripcion_id)
      references inscripcion (inscripcion_id) on delete restrict;

alter table kardex_economico add constraint fk_estado_kardex foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table materia add constraint fk_area_materia foreign key (area_id)
      references area_materia (area_id) on delete restrict;

alter table materia add constraint fk_estado_materia foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table materia add constraint fk_nivel_materia foreign key (nivel_id)
      references nivel (nivel_id) on delete restrict;

alter table materia add constraint fk_requisito_materia foreign key (mat_materia_id)
      references materia (materia_id) on delete restrict;

alter table materia_asignada add constraint fk_estado_materiaasig foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table materia_asignada add constraint fk_kardex_materia foreign key (kardexacad_id)
      references kardex_academico (kardexacad_id) on delete restrict;

alter table matricula add constraint fk_matricula_inscripcion foreign key (inscripcion_id)
      references inscripcion (inscripcion_id) on delete restrict;

alter table mensualidad add constraint fk_estado_mensualidad foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table mensualidad add constraint fk_kardexacad_mensualidad foreign key (kardexeco_id)
      references kardex_economico (kardexeco_id) on delete restrict;

alter table mensualidad add constraint fk_usuario_mensualidad foreign key (usuario_id)
      references usuario (usuario_id) on delete restrict;

alter table nivel add constraint fk_plan_nivel foreign key (plan_academico_id)
      references plan_academico (plan_academico_id) on delete restrict;

alter table nota add constraint fk_estado_nota foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table nota add constraint fk_nota_materia foreign key (materiaasig_id)
      references materia_asignada (materiaasig_id) on delete restrict;

alter table paralelo add constraint fk_estado_paralelo foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table plan_academico add constraint fk_estado_plan foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table plan_academico add constraint fk_plan_carrera foreign key (carrera_id)
      references carrera (carrera_id) on delete restrict;

alter table rol add constraint fk_estado_rol foreign key (estado_id)
      references estado (estado_id) on delete restrict;

alter table turno add constraint fk_estado_turno foreign key (estado_id)
      references estado (estado_id) on delete restrict;
