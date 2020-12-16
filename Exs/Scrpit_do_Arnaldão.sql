drop  database
if exists Mercadorias_do_Arnaldo;
create database Mercadorias_do_Arnaldo;
use Mercadorias_do_Arnaldo;

create table comprado
(
    nome_prod varchar(40) not null,

    quantidade integer(4)
        not null,

    data varchar (10) not null,

    preço_de_compra_total varchar(6) not null,

    preço_de_compra_unitario varchar(5) not null,

    preço_de_venda_total varchar (6) not null,

    preço_de_venda_unitario varchar(5) not null

);
insert into comprado
values
    ("Conjunto de tapuer", "10", "15/11/2035", "40,00", "4,00", "80,00", "8,00"),
    ("DVDs piratas de jogos ps2", "50", "06/06/2040", "125,00", "2,50", "150,00", "5,00"),
    ("DVDs piratas de filmes", "50", "05/06/2040", "125,00", "2,50", "150,00", "5,00");

select *
from comprado;