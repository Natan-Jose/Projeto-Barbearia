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

truncate table cadastro;



CREATE TABLE feedback (
    id int auto_increment primary key,
    nome varchar(50),
    email varchar(255),
    avaliacao int,
    mensagem varchar(300)
);

select * from feedback;

truncate table feedback;