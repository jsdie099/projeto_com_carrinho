create database if not exists super_rango;
use super_rango;

create table estabelecimento
(
	id int not null primary key auto_increment,
    nome varchar(100) not null,
    localizacao varchar(50) not null,
    contato varchar(50) not null
)engine='InnoDB';

create table usuario
(
	id int not null primary key auto_increment,
    nome varchar(100) not null,
    cpf varchar(20) not null,
    celular varchar(20) not null,
    email varchar(50) not null,
    rua varchar(100) not null,
    bairro varchar(50) not null,
    numero varchar(11) not null,
    complemento varchar(150),
    cidade varchar(100) not null,
    cep varchar(15) not null
)engine='InnoDB';

create table funcionario
(
	id int not null primary key auto_increment,
    id_estabelecimento int not null,
    tipo int not null,
    nome varchar(100) not null, 
    cpf varchar(20) not null,
    foreign key(id_estabelecimento) references estabelecimento(id)
)engine='InnoDB';

create table alimento
(
	id int not null primary key auto_increment,
    id_estabelecimento int not null,
    descricao varchar(100) not null,
    preco double not null,
    foreign key(id_estabelecimento) references estabelecimento(id)
)engine='InnoDB';


create table pedido
(
	id int not null primary key auto_increment,
    id_cliente int not null,
    preco double not null, 
    status int not null,
    forma varchar(20),
    foreign key(id_cliente) references usuario(id)
)engine='InnoDB';

create table itens_pedido
(
	id int not null primary key auto_increment,
    id_pedido int not null,
    id_alimento int not null,
    quantidade int not null,
    foreign key(id_pedido) references pedido(id),
    foreign key(id_alimento) references alimento(id)
)engine='InnoDB';



begin;
insert into estabelecimento(id,nome,localizacao,contato)
values(1,'Pizzaria Extremoz','Extrema-MG','3641-2034');

insert into usuario(nome,cpf,celular,email,rua,bairro,numero,complemento,cidade,cep)
values('Juliano','123','35123540293','julianopaulo.santos@hotmail.com','Avenida','Vila','120','','Extremoz','37640-000');

insert into funcionario(id_estabelecimento,tipo,nome,cpf)
values(1,2,'andre','456'),
((1,1,'juliano','123'));

insert into alimento(id_estabelecimento,descricao,preco)
values(1,'Pizza de Mussarela',37.50),
(1,'Pizza de Calabresa',35);

insert into pedido(id_cliente,preco,status)
values(1,0,1);
select * from itens_pedido;
insert into itens_pedido(id_pedido,id_alimento,quantidade)
values(1,1,1),
(1,2,1);
commit;

begin;
	insert into pedido(id_cliente,preco,status,forma)values(1,72.5,1,'entrega');
    insert into itens_pedido(id_pedido,id_alimento,quantidade)values((select max(id) from pedido p),1,1),
    ((select max(id) from pedido p),2,1);
    
commit;


select estabelecimento.nome as 'estabelecimento',funcionario.nome as 'funcionario',usuario.nome as 'cliente',count(ip.id_pedido) as 'itens',pedido.preco from pedido
inner join usuario on usuario.id=pedido.id_cliente
inner join itens_pedido as ip on ip.id_pedido=pedido.id
inner join alimento on alimento.id=ip.id_alimento
inner join estabelecimento on estabelecimento.id=alimento.id_estabelecimento
inner join funcionario on funcionario.id_estabelecimento=estabelecimento.id;

begin;
	update pedido
    set preco = (select alimento.preco from itens_pedido inner join alimento on alimento.id=itens_pedido.id_alimento where alimento.id=1)*
    (select itens_pedido.quantidade from alimento inner join itens_pedido on itens_pedido.id_alimento=alimento.id where alimento.id=1)
    where id=1;
    begin;
	update pedido
    set preco = preco+((select alimento.preco from itens_pedido inner join alimento on alimento.id=itens_pedido.id_alimento where alimento.id=2)*
    (select itens_pedido.quantidade from alimento inner join itens_pedido on itens_pedido.id_alimento=alimento.id where alimento.id=2))
    where id=1;
commit;



create or replace view vw_pedido as
select pedido.id,itens_pedido.id_alimento,itens_pedido.quantidade,usuario.rua,usuario.bairro,usuario.numero,alimento.descricao,alimento.preco from pedido
inner join usuario on usuario.id=pedido.id_cliente
inner join itens_pedido on itens_pedido.id_pedido=pedido.id
inner join alimento on itens_pedido.id_alimento=alimento.id 
where pedido.id=(select max(id) from pedido p);


select count(id) from pedido where status=1;
create or replace view vw_pedido_funcionario as
select 
	pedido.id,
    group_concat(itens_pedido.quantidade) as quantidade,
    pedido.preco,
    group_concat(pedido.forma) as forma,
    group_concat(alimento.descricao) as descricao
		from pedido
	inner join itens_pedido on itens_pedido.id_pedido=pedido.id
	inner join alimento on itens_pedido.id_alimento=alimento.id 
	where pedido.status=1
    group by pedido.id;	

call pcr_alimentos(675);

-- create or replace view vw_pedido_entregador as
select pedido.id,itens_pedido.id_alimento,itens_pedido.quantidade,usuario.rua,usuario.bairro,usuario.numero,alimento.descricao,alimento.preco from pedido
inner join usuario on usuario.id=pedido.id_cliente
inner join itens_pedido on itens_pedido.id_pedido=pedido.id
inner join alimento on itens_pedido.id_alimento=alimento.id 
where pedido.status between 2 and 3;




create or replace view vw_pedido as
select estabelecimento.nome as 'estabelecimento',funcionario.nome as 'funcionario',usuario.nome as 'cliente',alimento.descricao as 'alimento',count(ip.id_pedido) as 'itens',pedido.preco from pedido
inner join usuario on usuario.id=pedido.id_cliente
inner join itens_pedido as ip on ip.id_pedido=pedido.id
inner join alimento on alimento.id=ip.id_alimento
inner join estabelecimento on estabelecimento.id=alimento.id_estabelecimento
inner join funcionario on funcionario.id_estabelecimento=estabelecimento.id;
select * from pedido;


DELIMITER $$
create trigger trg_excluir_pedido after delete
on pedido
for each row
begin
	delete from itens_pedido where id_pedido=OLD.id;
end $$
DELIMITER ;


select pedido.id,alimento.descricao,pedido.preco,usuario.nome,pedido.status,pedido.forma,itens_pedido.quantidade from pedido
inner join itens_pedido on itens_pedido.id_pedido=pedido.id
inner join alimento on alimento.id=itens_pedido.id_alimento
inner join usuario on usuario.id=pedido.id_cliente order by id desc;

