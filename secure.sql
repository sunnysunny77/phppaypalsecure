CREATE DATABASE secure;

USE secure;

CREATE TABLE login ( user varchar(255) NOT NULL, pass CHAR(60) NOT NULL , PRIMARY KEY (user) ); 

INSERT INTO login (user, pass) VALUES ("Dan","$2y$15$tdVMkPif5c9YAzq7nmAzkep3ch/qxE2uXwcohYmWGCtQyVUIT6FT2");
