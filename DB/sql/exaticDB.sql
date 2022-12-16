DROP DATABASE IF EXISTS exatic_storeexaticdb;
CREATE DATABASE exatic_storeexaticdb;
USE exatic_storeexaticdb;


CREATE TABLE PostalCode (
    postalCodeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    postNumber INT (10) NOT NULL,
    cityName VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `Address` (
    addressID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    streetName VARCHAR(255) NULL,
    streetNumber INT NULL,
    postalCodeID INT NOT NULL,
    FOREIGN KEY (postalCodeID) REFERENCES PostalCode(postalCodeID)
) ENGINE=InnoDB;

CREATE TABLE CompanyInfo (
    companyInfoID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    companyDescription VARCHAR(1000) NULL,
    weekdays VARCHAR(50) NOT NULL,
    weekends VARCHAR(50) NOT NULL,
    openingHours VARCHAR(100) NOT NULL,
    weekendHours VARCHAR(100) NOT NULL,
    addressID INT NOT NULL,
    FOREIGN KEY (addressID) REFERENCES `Address`(addressID)
)  ENGINE=InnoDB;

CREATE TABLE `User` (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL unique,
    password VARCHAR(150) NOT NUll,
    userType INTEGER,
    imagePath VARCHAR(150),
    addressID INT NOT NULL,
    FOREIGN KEY (addressID) REFERENCES `Address`(addressID)
) ENGINE=InnoDB;

CREATE TABLE Discount (
    discountID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    eventName VARCHAR(30),
    description VARCHAR(500),
    discountProcent DECIMAL,
    startDate DATETIME,
    endDate DATETIME
) ENGINE=InnoDB;

CREATE TABLE ProductType (
    productTypeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    typeName VARCHAR(200)
) ENGINE=InnoDB;

CREATE TABLE Product (
    productID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(100),
    price DECIMAL,
    stockQuantity INT(255),
    description VARCHAR(1000),
    isDailySpecial BOOLEAN,
    country VARCHAR(50),
    brand VARCHAR(100),
    productImage VARCHAR(1000),
    productTypeID INT NOT NULL,
    discountID INT NOT NULL,
    FOREIGN KEY (productTypeID) REFERENCES ProductType(productTypeID),
    FOREIGN KEY (discountID) REFERENCES Discount(discountID)

) ENGINE=InnoDB;

CREATE TABLE `Order` (
    orderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    dateOrdered DATETIME,
    dateDelivered DATETIME,
    status VARCHAR(200),
    userID INT NOT NULL,
    FOREIGN KEY (userID) REFERENCES `User`(userID)
) ENGINE=InnoDB;

CREATE TABLE OrderDetail (
    orderDetailID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(1000),
    priceOne DECIMAL,
    quantity INT,
    price DECIMAL,
    procent DECIMAL,
    orderID INT NOT NULL,
    productID INT NOT NULL,
    FOREIGN KEY (productID) REFERENCES Product(productID),
    FOREIGN KEY (orderID) REFERENCES `Order`(orderID)
) ENGINE=InnoDB;



/* Views */

CREATE VIEW adminproductlist AS SELECT p.productID, p.title, p.price, p.stockQuantity, p.description, p.isDailySpecial, p.country, p.brand, p.productImage, pt.productTypeID, pt.typeName, d.discountID, d.eventName, d.discountProcent
                         FROM Product p, ProductType pt, Discount d WHERE p.productTypeID = pt.productTypeID AND p.discountID = d.discountID
                         ORDER BY p.productID DESC;



CREATE VIEW countryproductcount AS SELECT country, COUNT(country),
                                SUM(stockQuantity) AS totalQuantity
                                FROM Product
                                GROUP BY country
                                HAVING COUNT(country) > 0;


/* Triggers */

DELIMITER //
CREATE TRIGGER StockAfterPurchase AFTER INSERT ON OrderDetail
FOR EACH ROW
BEGIN
UPDATE Product p 
SET p.stockQuantity = p.stockQuantity - NEW.quantity
WHERE p.ProductID = NEW.ProductID;
END




