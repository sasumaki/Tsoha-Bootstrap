INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Sven', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Crystal Maiden', 'Intelligence','Ranged','Support','Magical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Meepo', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Abaddon', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Visage', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Elder Titan', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Anti Mage', 'Strength','Melee','Core','Physical');
INSERT INTO Hero (name, primaryattribute, attacktype,primaryrole, damagetype) VALUES ('Sniper', 'Strength','Melee','Core','Physical');
INSERT INTO Kayttaja (username, password) VALUES ('admin', 'admin');

INSERT INTO Draft (name,hero1,hero2,hero3,hero4,hero5,vaikeus, suunnitelma) VALUES ('Kappadraft','Sven' ,'Crystal Maiden','Meepo','Abaddon','Visage', 'Helppo','Tapa kaikki');
INSERT INTO Draft (name,hero1,hero2,hero3,hero4,hero5,vaikeus, suunnitelma) VALUES ('Uberdraft','Sven' ,'Crystal Maiden','Elder Titan','Anti Mage','Sniper', 'Helppo','Tapa kaikki');

INSERT INTO Yhteys (hero_id, draft_id) VALUES ('1','1');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('2','1');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('3','1');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('4','1');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('5','1');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('1','2');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('2','2');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('6','2');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('7','2');
INSERT INTO Yhteys (hero_id, draft_id) VALUES ('8','2');