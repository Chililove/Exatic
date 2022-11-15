DROP DATABASE IF EXISTS ExaticDB;
CREATE DATABASE ExaticDB;
USE ExaticDB;


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
    companyDescription VARCHAR(255) NULL,
    weekdays VARCHAR(10) NOT NULL,
    weekends VARCHAR(10) NOT NULL,
    addressID INT NOT NULL,
    FOREIGN KEY (addressID) REFERENCES `Address`(addressID)
)  ENGINE=InnoDB;

CREATE TABLE `User` (
    userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL unique,
    password VARCHAR(1000) NOT NUll,
    userType INTEGER,
    imagePath VARCHAR(1000),
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
    stockQuantity INT,
    description VARCHAR(1000),
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

) ENGINE=InnoDB;



CREATE TABLE `Order` (
    orderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    dateOrdered DATETIME,
    dateDelivered INTEGER,
    status VARCHAR(200),
    userID INT NOT NULL,
    FOREIGN KEY (userID) REFERENCES `User`(userID)
) ENGINE=InnoDB;

CREATE TABLE OrderDetail (
    orderDetailID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    quantity INT,
    price DECIMAL,
    procent DECIMAL,
    orderID INT NOT NULL,
    productID INT NOT NULL,
    FOREIGN KEY (productID) REFERENCES Product(productID),
    FOREIGN KEY (orderID) REFERENCES `Order`(orderID)
) ENGINE=InnoDB;


/* Discount */
INSERT INTO Discount (discountID, eventName, description, discountProcent, startDate, endDate) VALUES (1, "None", "No discount", "0", "2022-11-24 00:00:00", "2022-11-24 00:00:00");
INSERT INTO Discount (discountID, eventName, description, discountProcent, startDate, endDate) VALUES (2, "Halloween", "Halloween Event", "20", "2022-10-12 18:55:35", "2022-10-31 23:59:59");
INSERT INTO Discount (discountID, eventName, description, discountProcent, startDate, endDate) VALUES (3, "Winter Sale", "WINTER SALE", "50", "2022-11-24 14:48:50", "2022-12-28 14:00:00");
INSERT INTO Discount (discountID, eventName, description, discountProcent, startDate, endDate) VALUES (4, "Black Friday", "BLACK FRIDAY", "70", "2022-11-25 00:00:00", "2022-11-25 23:59:59");



/* producttype */
INSERT INTO ProductType (productTypeID, typeName) VALUES (1, "Ramen");
INSERT INTO ProductType (productTypeID, typeName) VALUES (2, "Alcohol");
INSERT INTO ProductType (productTypeID, typeName) VALUES (3, "Soda");
INSERT INTO ProductType (productTypeID, typeName) VALUES (4, "Rice");
INSERT INTO ProductType (productTypeID, typeName) VALUES (5, "Frozen food");



/* product*/
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (1, 'Nong Shim Gourmet Spicy Shin Ramen, Small', 22, 74, 'One of Korea''s most legendary instant ramen. If you are a connoisseur of ramen in all its forms, Nong Shim''s Hot & Spicy Shin Ramen is an absolute must-try. Possibly the singular most popular instant ramen in all of Korea, this ramen''s secret lies in the spicy soup broth, which is made with plenty of red chilli pepper as well as savoury garlic, onion, and anchovy. ', true, 1, 'Korea', 'Nong Shim', 'Nong-Shim-1.png', '2022-03-17 13:29:03', 1, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (2, 'Sanyo Foods Pokemon Soy Sauce Ramen', 34, 83, 'For the Pokemon fan. Keep your strength up while walking around town catching Pokemon with this soy sauce flavoured instant ramen noodles. Coming with Pokemon''s iconic character Pikachu on every kamaboko fish cakes, this fun ramen noodles is the perfect snack to help you stay energised. Each packet comes with one of 20 different exclusive collectable Pokemon stickers. ', true, 2, 'Japan', 'Pokemon', 'Pokemon-1.png', '2022-03-19 19:07:44', 1, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (3, 'Nong Shim Gourmet Spicy Shin Ramen Multipack', 69, 63, 'A classic and beloved Korean ramen. If you are a connoisseur of spicy instant ramen, Nong Shim''s Hot & Spicy Shin Ramen is an absolute must-try. This ramen''s secret lies in the spicy soup broth, which is made with plenty of red chilli pepper as well as savoury garlic, onion, and anchovy. Enjoy this ramen as it is for a lighter meal, or add your favourite meat and vegetable garnishes for something more substantial.', false, 2, 'Korea', 'Nong Shim', 'Nong-Shim-2.png', '2022-02-06 06:04:19', 1, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (4, 'Gekkeikan Daiginjo Sake with Ochoko Cup', 233, 58, 'Enjoy a taste of exquisite daiginjo sake with this sample bottle. Whether you''re trying daiginjo sake for the first time or finding a great sake for one, this sake by Gekkeikan, choice brewery of the Japanese Royal Family, is sure to please the palates of beginners and experts alike. Made from rice milled to 50% of its original size, this sake has a mild fruity flavour and gentle mouthfeel, with a small amount of brewer''s alcohol added to extract more lively aromas. The cap also doubles as an ochoko sake cup to drink from!', false, 1, 'Japan', 'Gekkeikan', 'Gekkeikan.png', '2022-03-27 01:08:30', 2, 3);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (5, 'Asahi Dry Zero Alcohol-Free Beer Drink', 28, 148, 'Enjoy Japan''s bestselling beer refreshingly alcohol free. Retaining the crisp, light refreshment that made their versatile beer a go-to beverage for all drinking occasions, Asahi invites everyone to experience the exquisitely dry taste of this alcohol-free variant. Brewed with a satisfying dose of fibre and soy amino acids, this zero calorie beer keeps its wonderfully deep amber colour and depth, fizzing with a full, sweetened flavour that''s sure to provide a refreshing pick me up. Sugar free yet still wonderfully satisfying, this beer helps gives anyone access to Japan''s number one choice of relaxation. ', true, 1, 'Japan', 'Asahi', 'Asahi-1.png', '2021-12-15 01:25:27', 2, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (6, 'Shinmei Toyama Koshihikari Rice, Small', 169, 80, 'A sweeter premium rice from Toyama. Try a slightly different flavour of rice with this 1kg bag of Koshihikari white rice. Grown in Nyuzen, an area of Toyama prefecture famous for its pure and fast flowing fresh spring waters, this Japonica rice has a unique flavour slightly sweeter than other Japanese rices, as well as the slightly sticky texture typical of Koshihikari rices. Use to make sushi or serve on the side of other Japanese dishes.', false, 1, 'Japan', 'Shinmei', 'Shinmei.png', '2022-09-23 21:36:25', 4, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (7, 'Samyang Dukboki (tteokbokki)', 35, 60, 'A sweeter premium rice from Toyama. Try a slightly different flavour of rice with this 1kg bag of Koshihikari white rice.', false, 1, 'Korea', 'Shinmei', 'pinkNoodle.jpeg', '2022-09-23 21:36:25', 4, 1);
INSERT INTO Product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (8, 'Samyang Buldak', 169, 80, 'A sweeter premium noodle from Toyama. Try a slightly different flavour of rice with this 1kg bag of Koshihikari white rice.', 1, false, 'Korea', 'Korea', 'samyang-carbo.jpg', '2022-09-23 21:36:25', 2, 3);