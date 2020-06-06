drop database if exists gestion_stag;
create database if not exists gestion_stag;
use gestion_stag;

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    photo varchar(100),
    idFiliere int(4)
);

create table filiere(
    idFiliere int(4) auto_increment primary key,
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
);

Alter table stagiaire add constraint 
    foreign key(idFiliere) references filiere(idFiliere);

INSERT INTO filiere(nomFiliere,niveau) VALUES
	('TSDI','TS'),
	('TSGE','TS'),
	('TGI','T'),
	('TSRI','TS'),
	('TCE','T');	
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	

INSERT INTO stagiaire(nom,prenom,civilite,photo,idFiliere) VALUES
    ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),
    
     ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3),

    ('SAADAOUI','MOHAMMED','M','Chrysantheme.jpg',1),
	('CHAABI','OMAR','M','Desert.jpg',2),
	('SALIM','RACHIDA','F','Hortensias.jpg',3),
	('FAOUZI','NABILA','F','Meduses.jpg',1),
	('ETTAOUSSI','KAMAL','M','Penguins.jpg',2),
	('EZZAKI','ABDELKARIM','M','Tulipes.jpg',3);
  

select * from filiere;
select * from stagiaire;
select * from utilisateur;


