DROP DATABASE IF EXISTS 'ExaticDB';
CREATE DATABASE 'ExaticDB';
USE 'ExaticDB';

CREATE TABLE PostalCode (
    postalCodeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cityName VARCHAR(50) NULL,
    Country VARCHAR(50) NULL
);

CREATE TABLE 'Address' (
    addressID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    streetName VARCHAR(255) NULL,
    streetName INT NULL,
    apartmentNumber VARCHAR(50),
    postalCodeID int,
    FOREIGN KEY (postalCodeID) REFERENCES PostalCode(postalCodeID)
);

CREATE TABLE CompanyInfo (
    companyInfoID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    companyDescription VARCHAR(255) NULL,
    Weekdays VARCHAR(10) NOT NULL,
    Weekends VARCHAR(10) NOT NULL,
    addressID int,
    FOREIGN KEY (addressID) REFERENCES 'Address'(addressID)
);

CREATE TABLE User (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(1000) NOT NUll,
    userType INT,
    imagePath: VARCHAR(6000),
    addressID int,
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
    brands VARCHAR(50),
    countries VARCHAR(50),
    categories VARCHAR(50)
);

CREATE TABLE Product (
    productID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title: VARCHAR(100),
    price DECIMAL,
    stockQuantity: INT,
    description VARCHAR(500),
    isNew BOOLEAN,
    isDailySpecial BOOLEAN,
    country VARCHAR(50),
    productImage VARCHAR(1000),
    timestamp TIMESTAMP,
    productTypeID int,
    discountID int,
    FOREIGN KEY (productTypeID) REFERENCES ProductType(productTypeID),
    FOREIGN KEY (discountID) REFERENCES Discount(discountID)
    
);

CREATE TABLE OrderDetail (
    orderDetailID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    quantity: INT,
    price DECIMAL,
    procent: DECIMAL,
    productID int,
    orderID int,
    CONSTRAINT  PK_OrderDetail PRIMARY KEY (productID,orderID)

);

CREATE TABLE Order (
    orderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    delivered: INT
);
