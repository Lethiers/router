create database ticket;
use ticket;
create table vendeur(
id_vendeur int auto_increment primary key not null,
nom_vendeur varchar(50),
prenom_vendeur varchar(50)
);
create table article(
id_article int auto_increment primary key not null,
nom_article varchar(50),
prix_article float
);
create table ticket(
id_ticket int auto_increment primary key not null,
date_ticket date,
id_vendeur int
);
create table utilisateur(
id_util int auto_increment primary key not null,
nom_util varchar(50),
prenom_util varchar(50),
mail_util varchar(50),
password_util varchar(100)

);

create table ajouter(
id_ticket int,
id_article int,
qtx int,

primary key(id_ticket, id_article)
);
alter table ticket
add constraint fk_posseder_vendeur
foreign key(id_vendeur)
references vendeur(id_vendeur);
alter table ajouter
add constraint fk_ajouter_article
foreign key(id_article)
references article(id_article);
alter table ajouter
add constraint fk_ajouter_ticket
foreign key(id_ticket)
references ticket(id_ticket);