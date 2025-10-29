-- SE RECOMIENDA VACIAR LA BASE DE DATOS DESDE PHP MY ADMIN MANUALMENTE (solo vacear las tablas, es suficiente para alterar la estructura para que el script de alteracion no tenga problema con registros que ya existen)
--otra opcion es borrar la bd y volverla a cargar(con la opcion de "importar" demtrp de phpmyadmin), siempre resptando el nombre de "solaria"
-- Eliminar restricciones de clave foránea que dependen de la tabla paises

alter table ventas drop foreign key fk_ventas_paises;


drop table if exists paises;

-- campo direccionEntrega a la tabla ventas
alter table ventas add column direccionEntrega VARCHAR(255) after clienteId;

alter table envios add column direccionEntrega VARCHAR(255) AFTER repartidorId;

-- los campos nombres y apellidos en la tabla de usuarios
alter table usuarios add column nombres VARCHAR(50) after username;
alter table usuarios add column apellidos VARCHAR(50) after nombres;


alter table clientes drop column nombres;
alter table clientes drop column apellidos;

alter table ventas drop column paisId;

-- volver a cear las restricciones de clave foránea 
alter table ventas add constraint fk_clientes_ventas 
foreign key (clienteId) references clientes(clienteId) on  update cascade;