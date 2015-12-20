CREATE TABLE Kayttaja(
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
password varchar(50) NOT NULL
);

CREATE TABLE Draft(
id SERIAL PRIMARY KEY,
laatija_id INTEGER REFERENCES Kayttaja(id),
suunnitelma varchar(400) NOT NULL,
vaikeus varchar(50) NOT NULL
published DATE
);

CREATE TABLE HERO(
id SERIAL PRIMARY KEY,
draft_id INTEGER REFERENCES Draft(id),
name varchar(50) NOT NULL,
primary_attribute varchar(50) NOT NULL,
attack_type varchar(50) NOT NULL,
primary_role varchar(50) NOT NULL,
damage_type varchar(50) NOT NULL,
description varchar(400)

);