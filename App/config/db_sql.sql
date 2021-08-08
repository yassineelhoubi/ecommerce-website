DROP table users ;
CREATE Table users (
    id INT  PRIMARY KEY AUTO_INCREMENT ,
    email VARCHAR (55),
    password VARCHAR (60),
    role VARCHAR (12),
    token varchar(255)
);
Drop table admin ;
CREATE table admin (
    idAdmin INT PRIMARY KEY ,
    Fname VARCHAR (55),
    Lname VARCHAR (55),
    FOREIGN KEY (idAdmin) REFERENCES users(id)
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
);

Drop Table categories;
CREATE Table categories (
    idCategory int PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR (55)
);

DROP Table products;
CREATE TABLE products(
    idProduct INT PRIMARY KEY AUTO_INCREMENT,
    idCategory int,
    name VARCHAR(255),
    quantity INT,
    price INT(4),
    descreption TEXT,
    img VARCHAR(55),
    FOREIGN KEY (idCategory) REFERENCES categories(idCategory)ON UPDATE CASCADE ON DELETE CASCADE

);

DROP table orders ; 
CREATE Table orders(
    idOrder INT AUTO_INCREMENT PRIMARY KEY , 
    idCustomer INT,
    date DATE ,
    status  VARCHAR(55),
    totalPrice INT(4),
    FOREIGN KEY (idCustomer) REFERENCES customers(idCustomer)
);

DROP table line_cmd;
CREATE table line_cmd(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idOrder INT ,
    idProduct INT,
    quantity INT(4) ,
    totalPrice INT(4),
    FOREIGN KEY (idProduct) REFERENCES products(idProduct),
    FOREIGN key (idOrder) REFERENCES orders(idOrder)
);
