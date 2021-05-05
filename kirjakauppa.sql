create database kirjakauppa;

use kirjakauppa;


create table genre (
genre_ID int primary key AUTO_INCREMENT,
genrenimi varchar(255) NOT NULL

);

create table kirja (
kirja_ID int primary key AUTO_INCREMENT,
kirjanimi varchar(255) NOT NULL,
kuvaus varchar(255),
hinta float unsigned NOT NULL,
genre int,
FOREIGN KEY(genre) REFERENCES genre(genre_ID)

);

create table arvostelu (
arvostelu_ID int primary key AUTO_INCREMENT,
arvostelu varchar(255) NOT NULL,
kirja_ID int,
FOREIGN KEY(kirja_ID) REFERENCES kirja(kirja_ID)
);

insert into genre (genrenimi) values ('fantasia'), ('sci-fi'), ('mysteeri'), ('trilleri'), ('romantiikka'), ('länkkäri'), ('tietokirjallisuus');
insert into kirja (kirjanimi, kuvaus, hinta, genre) values ('test book', 'Tämä on testikirja', 13, 1);
insert into arvostelu (arvostelu, kirja_ID) values ('Paras kirja ikinä! 5/5', 1);
insert into arvostelu (arvostelu, kirja_ID) values ('Iha ok.', 1);
insert into kirja (kirjanimi, kuvaus, hinta, genre) values ('Eeppinen kirja', 'ebin kirja', 25, 3);
insert into arvostelu (arvostelu, kirja_ID) values ('Parempaakin on tullut luettua', 2);
insert into arvostelu (arvostelu, kirja_ID) values ('4/5', 2);