

create table tb_status(
	id int not null primary key auto_increment,
    status varchar(25) not null
);


create table tb_tarefas(
	id int not null primary key auto_increment,
    id_status int not null default 1,
    foreign key(id_status) references tb_status(id),
	tarefa text not null,
    data_cadastrado datetime not null default current_timestamp
);


insert into tb_status(status) values('pendente');
insert into tb_status(status) values('realizado');

select * from tb_status;
select * from tb_tarefas;

SELECT
    t.id, s.status, t.tarefa
FROM
    tb_tarefas as t
        INNER JOIN
    tb_status as s
    ON(t.id_status = s.id);

