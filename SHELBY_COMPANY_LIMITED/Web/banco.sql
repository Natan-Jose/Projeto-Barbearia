create database agendamento;

use agendamento;

create table cadastro(
    id int auto_increment,
    nome varchar(50),
    contato varchar(15),
    dia date,
    hora varchar(5),
    primary key (id)
);

select * from cadastro;
truncate table cadastro;

CREATE TABLE feedback (
    id int auto_increment,
    nome varchar(50),
    avaliacao int,
    mensagem text,
    primary key (id)
);

select * from feedback;
truncate table feedback;

