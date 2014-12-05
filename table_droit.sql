drop table droit;

create table droit ( 
id int(10) not null primary key, 
libelle varchar(20) 
); 
insert into droit values (1,"administrateur"); 
insert into droit values (2,"membre"); 
insert into droit values (3,"invite");