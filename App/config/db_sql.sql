DROP table users ;
CREATE Table users (
    id INT  PRIMARY KEY AUTO_INCREMENT ,
    email VARCHAR (55),
    password VARCHAR (60),
    role VARCHAR (12)
);
Drop table customers;
CREATE TABLE customers (
    idCustomer INT  PRIMARY KEY ,
    Fname VARCHAR  (55),
    Lname VARCHAR  (55),
    nbrPhone VARCHAR  (13),
    gender VARCHAR (55),
    address1 VARCHAR (255),
    address2 VARCHAR (255),
    FOREIGN KEY (idCustomer) REFERENCES users(id)
)