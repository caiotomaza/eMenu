--CREATE DATABASE emenu;

DROP SCHEMA public;
CREATE SCHEMA usuario;
CREATE SCHEMA itens;
CREATE SCHEMA pedidos;

CREATE TABLE usuario.cliente(
    id serial not null primary key,
    nome varchar(40) not null,
    email varchar(40) not null,
    senha varchar(40) not null
);

CREATE TABLE usuario.garcom(
    id serial not null primary key,
    nome varchar(40) not null,
    email varchar(40) not null,
    senha varchar(40) not null
);

CREATE TABLE usuario.cozinheiro(
    id serial not null primary key,
    nome varchar(40) not null,
    email varchar(40) not null,
    senha varchar(40) not null
);

CREATE TABLE usuario.admin(
    id serial not null primary key,
    nome varchar(40) not null,
    email varchar(40) not null,
    senha varchar(40) not null
);

CREATE TABLE itens.iten(
    id serial not null primary key,
    nome varchar(40),
    peso numeric(5,2), -- em kg
    litros numeric(3,2), -- em lt
    descricao varchar(400),
    valro numeric(5,2)
);

create table pedidos.pedido(
    id serial not null primary key,
    id_cliente integer,
    id_iten integer,
    quantidade integer,
    status varchar(20),
	foreign key(id_cliente) references usuario.cliente(id),
	foreign key(id_iten) references itens.iten(id)
);