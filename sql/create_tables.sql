CREATE TABLE Kayttaja(
id SERIAL PRIMARY KEY,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL
);

CREATE TABLE Draft(
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
laatija_id INTEGER REFERENCES Kayttaja(id),
hero1 varchar(50) NOT NULL,
hero2 varchar(50) NOT NULL,
hero3 varchar(50) NOT NULL,
hero4 varchar(50) NOT NULL,
hero5 varchar(50) NOT NULL,
suunnitelma varchar(400),
vaikeus varchar(50)
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

CREATE TABLE Yhteys (
    hero_id INTEGER NOT NULL,
    FOREIGN KEY(hero_id) REFERENCES HERO(id),
    draft_id INTEGER NOT NULL,
    FOREIGN KEY(draft_id) REFERENCES Draft(id),
    PRIMARY KEY (hero_id, draft_id)
);