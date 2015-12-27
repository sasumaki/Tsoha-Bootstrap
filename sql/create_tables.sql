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
name varchar(50) NOT NULL,
primaryattribute varchar(50) NOT NULL,
attacktype varchar(50) NOT NULL,
primaryrole varchar(50) NOT NULL,
damagetype varchar(50) NOT NULL,
description varchar(400)

);