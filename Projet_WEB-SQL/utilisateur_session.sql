DROP TABLE IF EXISTS session;
DROP TABLE IF EXISTS utilisateur;

CREATE TABLE IF NOT EXISTS utilisateur ( 
id_utilisateur int(10) not null auto_increment primary key, 
login varchar(20),
motdepasse varchar(20),
email varchar(50),
droit varchar(5)
);

insert into utilisateur values (NULL, 'admin', 'admin','', 'DROITadmin');
insert into utilisateur values (NULL, 'invite', 'invite','', 'DROITinvite');

CREATE TABLE IF NOT EXISTS session ( 
idsession int(10) not null auto_increment primary key, 
sid_session varchar(32), 
login_session varchar(20), 
date_fin_session int(11) 
);

SELECT * FROM utilisateur;
SELECT * FROM session;
