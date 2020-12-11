drop  database
if exists Mercadorias_do_Arnaldo;
create database Mercadorias_do_Arnaldo;
use Mercadorias_do_Arnaldo;

create table produto
(
    id_prod integer not null auto_increment, 

    nome_prod varchar(40) not null,

    quantidade integer(4)
        not null,

    datac varchar (10) not null,

    preco_de_compra_unitario  DECIMAL(4,2)not null,

    preco_de_compra_total  DECIMAL(10,2) as (preco_de_compra_unitario * quantidade),

    preco_de_venda_unitario   DECIMAL(4,2) not null,
    
    preco_de_venda_total  DECIMAL(10,2) as (preco_de_venda_unitario * quantidade),
    
    primary key (id_prod)
);

insert into produto (nome_prod, quantidade, datac, preco_de_compra_unitario, preco_de_venda_unitario)
values 
    ("Conjunto de tapuer", "10", "15/11/2035", "4.00", "8.00"),
    ("DVDs piratas de jogos ps2", "50", "06/06/2040", "2.50",  "5.00"),
    ("DVDs piratas de filmes", "50", "05/06/2040", "2.50", "5.00");

select *
from produto;

INSERT INTO produto (nome_prod, quantidade, datac, preco_de_compra_unitario, preco_de_venda_unitario)
			VALUES ("Controle remoto universal", "10", "09/12/2020", "15", "30");

    		SELECT * FROM produto WHERE id_prod = 3;

INSERT INTO produto VALUES('Capinha_de_celular',
'24',
'04/05/2020',
'2.50',
'5.00');

INSERT INTO produto (nome_prod,
quantidade,
datac,
preco_de_compra_unitario,
preco_de_venda_unitario) VALUES('Capinha_de_celular',
'24',
'04/05/2020',
'2.50',
'5.00');

UPDATE produto SET nome_prod='a',
quantidade='3',
datac='6',
preco_de_compra_unitario='4.00',
preco_de_venda_unitario='40.00' WHERE id_prod = 9;