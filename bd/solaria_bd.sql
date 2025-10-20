/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/10/2025 22:12:18                          */
/*==============================================================*/


drop table if exists categorias;

drop table if exists citas;

drop table if exists citastecnicos;

drop table if exists clientes;

drop table if exists detallesventas;

drop table if exists envios;

drop table if exists instalaciones;

drop table if exists instalacionestecnicos;

drop table if exists marcas;

drop table if exists pagos;

drop table if exists paises;

drop table if exists productos;

drop table if exists repartidores;

drop table if exists roles;

drop table if exists tecnicos;

drop table if exists usuarios;

drop table if exists ventas;

/*==============================================================*/
/* Table: categorias                                            */
/*==============================================================*/
create table categorias
(
   categoriaId          int not null auto_increment,
   nombreCat            varchar(30) not null,
   descripcion          varchar(30),
   primary key (categoriaId)
);

/*==============================================================*/
/* Table: citas                                                 */
/*==============================================================*/
create table citas
(
   citaId               int not null auto_increment,
   clienteId            int not null,
   descripcion          varchar(30),
   fechaAcordadaCita    datetime,
   fechaRegistro        datetime,
   primary key (citaId)
);

/*==============================================================*/
/* Table: citastecnicos                                         */
/*==============================================================*/
create table citastecnicos
(
   citaTecnicoId        int not null auto_increment,
   tecnicoId            int not null,
   citaId               int not null,
   primary key (citaTecnicoId)
);

/*==============================================================*/
/* Table: clientes                                              */
/*==============================================================*/
create table clientes
(
   clienteId            int not null auto_increment,
   usuarioId            int not null,
   nombres              char(25) not null,
   apellidos            char(25) not null,
   numDocumentoId       char(25) not null,
   presupuestoDisp      decimal(8,2),
   primary key (clienteId)
);

/*==============================================================*/
/* Table: detallesventas                                        */
/*==============================================================*/
create table detallesventas
(
   ventaDetallesId      int not null auto_increment,
   ventaId              int not null,
   productoId           int not null,
   precioUnit           float(8,2),
   cantidad             int not null,
   subtotal             float(8,2),
   primary key (ventaDetallesId)
);

/*==============================================================*/
/* Table: envios                                                */
/*==============================================================*/
create table envios
(
   envioId              int not null auto_increment,
   ventaId              int not null,
   repartidorId         int not null,
   costoEnvio           float(8,2),
   fechaPaqueteRecibido datetime,
   fechaPaqueteEntregado datetime,
   primary key (envioId)
);

/*==============================================================*/
/* Table: instalaciones                                         */
/*==============================================================*/
create table instalaciones
(
   instalacionId        int not null auto_increment,
   clienteId            int not null,
   fechaEstimada        date,
   ubicacionGeo         char(100),
   estado               char(25),
   primary key (instalacionId)
);

/*==============================================================*/
/* Table: instalacionestecnicos                                 */
/*==============================================================*/
create table instalacionestecnicos
(
   instalacionTecnicoId int not null auto_increment,
   tecnicoId            int not null,
   instalacionId        int not null,
   fechaInicio          date not null,
   fechaFin             date,
   primary key (instalacionTecnicoId)
);

/*==============================================================*/
/* Table: marcas                                                */
/*==============================================================*/
create table marcas
(
   marcaId              int not null auto_increment,
   nombreMarca          char(25) not null,
   primary key (marcaId)
);

/*==============================================================*/
/* Table: pagos                                                 */
/*==============================================================*/
create table pagos
(
   pagoId               int not null auto_increment,
   ventaId              int not null,
   clienteId            int not null,
   montoPago            float(8,2) not null,
   fechaPago            datetime not null,
   estadoPago           char(25),
   primary key (pagoId)
);

/*==============================================================*/
/* Table: paises                                                */
/*==============================================================*/
create table paises
(
   paisId               int not null auto_increment,
   nombrePais           char(25) not null,
   codigoIso            char(10),
   moneda               char(19),
   primary key (paisId)
);

/*==============================================================*/
/* Table: productos                                             */
/*==============================================================*/
create table productos
(
   productoId           int not null auto_increment,
   categoriaId          int not null,
   marcaId              int not null,
   precioUnitario       decimal not null,
   tiempoGarantia       varchar(30),
   fechaFab             date,
   existente            bool,
   primary key (productoId)
);

/*==============================================================*/
/* Table: repartidores                                          */
/*==============================================================*/
create table repartidores
(
   repartidorId         int not null auto_increment,
   nombreRepartidor     char(25) not null,
   costoEntrega         float(8,2),
   telefono             char(15),
   primary key (repartidorId)
);

/*==============================================================*/
/* Table: roles                                                 */
/*==============================================================*/
create table roles
(
   rolId                int not null auto_increment,
   rolName              char(15) not null,
   rolDesc              char(50),
   primary key (rolId)
);

/*==============================================================*/
/* Table: tecnicos                                              */
/*==============================================================*/
create table tecnicos
(
   tecnicoId            int not null auto_increment,
   usuarioId            int not null,
   especialidad         char(25),
   nivelCategoria       char(25),
   fechaContratacion    date,
   fechaFinContrato     date,
   primary key (tecnicoId)
);

/*==============================================================*/
/* Table: usuarios                                              */
/*==============================================================*/
create table usuarios
(
   usuarioId            int not null auto_increment,
   rolId                int not null,
   username             char(15) not null,
   pass                 char(64) not null,
   email                char(25) not null,
   telefonoContacto     char(25),
   primary key (usuarioId)
);

/*==============================================================*/
/* Table: ventas                                                */
/*==============================================================*/
create table ventas
(
   ventaId              int not null auto_increment,
   paisId               int not null,
   clienteId            int not null,
   fechaVenta           date not null,
   fechaEntregaEstimada date,
   fechaEnvio           date,
   total                float(8,2),
   primary key (ventaId)
);

alter table citas add constraint fk_clientes_citas foreign key (clienteId)
      references clientes (clienteId) on delete restrict on update cascade;

alter table citastecnicos add constraint fk_citastecnicos_citas foreign key (citaId)
      references citas (citaId) on delete restrict on update cascade;

alter table citastecnicos add constraint fk_citastenicos_tecnicos foreign key (tecnicoId)
      references tecnicos (tecnicoId) on delete restrict on update cascade;

alter table clientes add constraint fk_clientes_usuarios foreign key (usuarioId)
      references usuarios (usuarioId) on delete restrict on update cascade;

alter table detallesventas add constraint fk_detallesventas_productos foreign key (productoId)
      references productos (productoId) on delete restrict on update cascade;

alter table detallesventas add constraint fk_detallesventas_ventas foreign key (ventaId)
      references ventas (ventaId) on delete restrict on update cascade;

alter table envios add constraint fk_envios_ventas foreign key (ventaId)
      references ventas (ventaId) on delete restrict on update cascade;

alter table envios add constraint fk_repartidor_envios foreign key (repartidorId)
      references repartidores (repartidorId) on delete restrict on update cascade;

alter table instalaciones add constraint fk_instalaciones_clientes foreign key (clienteId)
      references clientes (clienteId) on delete restrict on update cascade;

alter table instalacionestecnicos add constraint fk_instalacionestecnicos_instalaciones foreign key (instalacionId)
      references instalaciones (instalacionId) on delete restrict on update cascade;

alter table instalacionestecnicos add constraint fk_instalacionestecnicos_tecnicos foreign key (tecnicoId)
      references tecnicos (tecnicoId) on delete restrict on update cascade;

alter table pagos add constraint fk_clientes_pagos foreign key (clienteId)
      references clientes (clienteId) on delete restrict on update cascade;

alter table pagos add constraint fk_ventas_pagos foreign key (ventaId)
      references ventas (ventaId) on delete restrict on update cascade;

alter table productos add constraint fk_productos_categorias foreign key (categoriaId)
      references categorias (categoriaId) on delete restrict on update cascade;

alter table productos add constraint fk_productos_marcas foreign key (marcaId)
      references marcas (marcaId) on delete restrict on update cascade;

alter table tecnicos add constraint fk_tecnicos_usuarios foreign key (usuarioId)
      references usuarios (usuarioId) on delete restrict on update cascade;

alter table usuarios add constraint fk_usuarios_roles foreign key (rolId)
      references roles (rolId) on delete restrict on update cascade;

alter table ventas add constraint fk_clientes_ventas foreign key (clienteId)
      references clientes (clienteId) on delete restrict on update cascade;

alter table ventas add constraint fk_ventas_paises foreign key (paisId)
      references paises (paisId) on delete restrict on update cascade;
