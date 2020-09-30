create database practica3_bd;
use practica3_bd;

create table carreras(
id_carrera int not null auto_increment primary key,
carrera text

);

insert into carreras(carrera)
value ("Tecnologias de la Información"),
("Mecatronica"),
("PYMES"),
("Manufactura");

create table materias(
id_materia int not null auto_increment primary key,
materia text,
clave text,
id_carrera int,

foreign key (id_carrera) references carreras(id_carrera)
);

insert into materias(materia, clave, id_carrera)
value ("Algoritmos", "5162", "1"),
("Herramientas ofimaticas", "5114", "1"),
("Introducción a la TI", "5125", "1"),

("Algebra lineal", "3242", "2"),
("Quimica basica", "3245", "2"),
("Electronica", "3231", "2"),

("Introducción a las matematicas", "1165", "3"),
("Introducción a la administración", "1134", "3"),
("Introducción a la contabilidad", "1165", "3"),

("Introducción a la ingenieria en Manufactura", "1943", "4"),
("Introducción a la robotica", "1921", "4"),
("Matematicas basicas", "1978", "4");

create table usuarios(
id int not null auto_increment primary key,
usuario text,
password text,
email text,
id_carrera int,

foreign key (id_carrera) references carreras(id_carrera)
);

insert into usuarios(usuario,password,email,id_carrera)
value ("yashub","admin","yashubge@gmail.com",1);