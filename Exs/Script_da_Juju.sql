drop  database
if exists Estacionamento_da_Juliana;
create database  Estacionamento_da_Juliana;
use  Estacionamento_da_Juliana;


create table estacionamento
(
    Placa_do_Automóvel varchar (7) not null,
    Tipo_do_Automóvel varchar (10) not null,
    Data varchar(10) not null,
    Hora_da_Chegada varchar(5) not null,
    Hora_da_Saida varchar(5) not null,
    Cobrado varchar(6) not null
);

insert into estacionamento
values
    ("JAO6421", "Moto", "02/12/2020", "12:19", "15:20", "23,99"),
    ("TIA3480", "Caminhão", "03/02/2020", "15:39", "19:00", "19,00"),
    ("BUG6666", "Carro", "01/12/2020", "15:39", "19:00", "19,00");

select *
from estacionamento;