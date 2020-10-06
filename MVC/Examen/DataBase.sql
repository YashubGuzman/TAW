create database examen1;
use examen1;

create table libros(
id_libros int not null auto_increment primary key,
isbn varchar(50),
nombre varchar(50),
autor varchar(50),
editorial varchar(50),
edicion varchar(50),
anio year
);

create table usuarios(
id int not null auto_increment primary key,
usuario text,
password text,
email text

);

insert into usuarios(usuario,password,email)
value ("yashub","admin","yashubge@gmail.com");