create database agendamento;
use agendamento;
create table cadastro(
id int primary key auto_increment,
nome varchar(50),
contato varchar(15),
dia date,
hora varchar(5)
);

select * from cadastro;

describe cadastro;