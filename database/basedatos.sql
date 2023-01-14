drop database if exists restaurant;
create database restaurant;

use restaurant;

create table mesas( idmesa integer auto_increment,
                    estado tinyint(4),
                    primary Key (idmesa)
                );

create table clientes(dni varchar(8),
                    nombres varchar(50),
                    telefono varchar(9),
                    tipo varchar(15),
                    direccion varchar(100),
                    estado tinyint(4),
                    primary key(dni)
);


create table categorias(idcategoria integer auto_increment,
                        categoria varchar(40),
                        primary key(idcategoria));

insert into categorias values (1,'Entrada'),(2,'Principal'),(3,'Postre'),(4,'Bebida');

create table plato(idplato integer auto_increment,
                    nombreplato varchar(50),
                    imagen varchar(50),
                    descripcion varchar(50),
                    precio double,
                    estado tinyint,
                    idcategoria integer,
                    primary key(idplato),
                    foreign key(idcategoria) references categorias(idcategoria)
);

create table pedidos(idpedido integer auto_increment,
                     fecha date,
                     dni varchar(8),
                     idmesa integer,
                     total float,
                     estado varchar(15),
                     primary key(idpedido),
                     foreign key(dni) references clientes(dni),
                     foreign key(idmesa) references mesas(idmesa)
);

create table detalles(iddetalle integer auto_increment,
                     idpedido integer,
                     idplato integer,
                     precio float,
                     cantidad integer,
                     especificacion varchar(100),
                     subtotal float,
                     primary key(iddetalle),
                     foreign key(idpedido) references pedidos(idpedido),
                     foreign key(idplato) references plato(idplato)
);

create table orden(idorden integer auto_increment,
                    fecha varchar(50),
                    encargado varchar(60),
                    estado tinyint,
                    primary key(idorden)
);

create table detalleorden(iddetalle integer auto_increment,
                      idorden integer,
                      producto varchar(50),
                      unidad varchar(15),
                      cantidad int,
                      primary key(iddetalle),
                      foreign key(idorden) references orden(idorden)
);
