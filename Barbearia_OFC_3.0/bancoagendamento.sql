create database agendamento;
use agendamento;
create table cadastro(
id int primary key auto_increment,
nome varchar(120),
contato varchar(12),
dia date,
hora varchar(12)
);

select * from cadastro;

