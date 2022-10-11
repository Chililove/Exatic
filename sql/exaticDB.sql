DROP DATABASE IF EXISTS 'ExaticDB';
CREATE DATABASE 'ExaticDB';
USE 'ExaticDB';

CREATE TABLE PostalCode (
    postalCodeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cityName VARCHAR(50) NULL,
    country VARCHAR(50) NULL
);

CREATE TABLE 'Address' (
    addressID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    streetName VARCHAR(255) NULL,
    streetNumber INT NULL,
    apartmentNumber VARCHAR(50),
    postalCodeID INT NOT NULL,
    FOREIGN KEY (postalCodeID) REFERENCES PostalCode(postalCodeID)
);

CREATE TABLE CompanyInfo (
    companyInfoID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    companyDescription VARCHAR(255) NULL,
    weekdays VARCHAR(10) NOT NULL,
    weekends VARCHAR(10) NOT NULL,
    addressID INT NOT NULL,
    FOREIGN KEY (addressID) REFERENCES 'Address'(addressID)
);

CREATE TABLE User (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(1000) NOT NUll,
    userType INTEGER,
    imagePath: VARCHAR(6000),
    addressID INT NOT NULL,
    FOREIGN KEY (addressID) REFERENCES 'Address'(addressID)
);

CREATE TABLE Discount (
    discountID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    eventName VARCHAR(30),
    description VARCHAR(500),
    discountProcent DECIMAL,
    duration DATETIME
);

CREATE TABLE ProductType (
    productTypeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    typeName VARCHAR(200)
);

CREATE TABLE Product (
    productID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(100),
    price DECIMAL,
    stockQuantity INT,
    description VARCHAR(500),
    isNew BOOLEAN,
    isDailySpecial BOOLEAN,
    country VARCHAR(50),
    brand VARCHAR(100),
    productImage VARCHAR(1000),
    timestamp TIMESTAMP,
    productTypeID INT NOT NULL,
    discountID INT NOT NULL,
    FOREIGN KEY (productTypeID) REFERENCES ProductType(productTypeID),
    FOREIGN KEY (discountID) REFERENCES Discount(discountID)
    
);

CREATE TABLE OrderDetail (
    orderDetailID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    quantity INT,
    price DECIMAL,
    procent DECIMAL,
    productID INT NOT NULL,
    orderID INT NOT NULL,
    CONSTRAINT  PK_OrderDetail PRIMARY KEY (productID,orderID)

);

CREATE TABLE Order (
    orderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    dateOrdered DATETIME,
    dateDelivered INTEGER,
    status VARCHAR(200),
    orderDetailID INT NOT NULL,
    userID INT NOT NULL
);
