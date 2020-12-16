drop database
if exists Empreitadas_do_Bernardo;
create database  Empreitadas_do_Bernardo;
use  Empreitadas_do_Bernardo;

create table empreiteiros
(

    Nome_do_Peão varchar
    (50) not null,
    Especialidades varchar
    (50) not null,
    primary key
    (Nome_do_Peão)

);

create table empreitadas
(
    Nome_do_Projeto varchar(30) not null,
    Descrição_do_Projeto varchar(150) not null,
    Endereço varchar(80) not null,
    Data_Inicio varchar(10) not null,
    Data_Prevista_para_Conclusão varchar(10) not null,
    Nome_do_Peão varchar(50) not null,
    CONSTRAINT fk_pea_emp FOREIGN key (Nome_do_Peão)
    references empreiteiros(Nome_do_Peão)
        on
delete cascade
);

insert into empreitadas
values
    ("Reforma na casa do Robertão", "O Plano é reformar o banheiro",
        "Rua: Aleixo Puggina", "04/03/2021", "30/03/2021", "Adilson Bahiano")
;
insert into empreiteiros
values
    ("Reinaldo Cabeça", "Pedreiro Chefe"),
    ("Josias Gaguinho", "Servente"),
    ("Arnaldo Fumaça", "Servente"),
    ("Marcio Perneta", "Eletricista"),
    ("Adilson Bahiano", "Encanador")
;


select *
from empreiteiros;