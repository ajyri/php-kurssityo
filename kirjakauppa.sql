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

insert into genre (genrenimi) values ('fantasia'), ('sci-fi'), ('mysteeri'), ('trilleri'), ('romantiikka'), ('länkkäri'), ('tietokirjallisuus');
insert into kirja (kirjanimi, kuvaus, hinta, genre) values ('test book', 'Tämä on testikirja', 13.37, 1);