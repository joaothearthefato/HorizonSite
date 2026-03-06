use horizon_db;


create table usuarios (
id int not null auto_increment primary key,
nome varchar(255) NOT NULL,
email varchar(255) not null unique,
senha varchar(255) not null
)

select * from usuarios;