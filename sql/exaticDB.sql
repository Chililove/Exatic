DROP DATABASE IF EXISTS ExaticDB;
CREATE DATABASE ExaticDB;
USE ExaticDB;


CREATE TABLE PostalCode (
    postalCodeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cityName VARCHAR(50) NULL,
    country VARCHAR(50) NULL
) ENGINE=InnoDB;

CREATE TABLE `Address` (
    addressID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    streetName VARCHAR(255) NULL,
    streetNumber INT NULL,
    apartmentNumber VARCHAR(50),
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
    email VARCHAR(100) NOT NULL,
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
    duration DATETIME
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
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (1, "None", "No discount", "0", "2022-10-28 14:00:00");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (2, "Halloween", "Halloween Event", "20", "2022-10-28 14:00:00");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (3, "Winter Sale", "WINTER SALE", "50", "2022-11-24 14:48:50");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (4, "Black Friday", "BLACK FRIDAY", "70", "2022-11-25 23:59:59");



/* producttype */
INSERT INTO producttype (productTypeID, typeName) VALUES (1, "Ramen");
INSERT INTO producttype (productTypeID, typeName) VALUES (2, "Alcohol");
INSERT INTO producttype (productTypeID, typeName) VALUES (3, "Soda");
INSERT INTO producttype (productTypeID, typeName) VALUES (4, "Rice");
INSERT INTO producttype (productTypeID, typeName) VALUES (5, "Frozen food");



/* product*/
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (1, 'Nong Shim Gourmet Spicy Shin Ramen, Small', 22, 74, 'One of Korea''s most legendary instant ramen. If you are a connoisseur of ramen in all its forms, Nong Shim''s Hot & Spicy Shin Ramen is an absolute must-try. Possibly the singular most popular instant ramen in all of Korea, this ramen''s secret lies in the spicy soup broth, which is made with plenty of red chilli pepper as well as savoury garlic, onion, and anchovy. ', 2, 1, 'Korea', 'Nong Shim', 'Nong-Shim-Gourmet-Spicy-Shin-Ramen,-Small-Side.png', '2022-03-17 13:29:03', 1, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (2, 'Sanyo Foods Pokemon Soy Sauce Ramen', 34, 83, 'For the Pokemon fan. Keep your strength up while walking around town catching Pokemon with this soy sauce flavoured instant ramen noodles. Coming with Pokemon''s iconic character Pikachu on every kamaboko fish cakes, this fun ramen noodles is the perfect snack to help you stay energised. Each packet comes with one of 20 different exclusive collectable Pokemon stickers. ', 2, 2, 'Japan', 'Pokemon', 'Sanyo-Foods-Pokemon-Soy-Sauce-Ramen.png', '2022-03-19 19:07:44', 1, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (3, 'Nong Shim Gourmet Spicy Shin Ramen Multipack', 69, 63, 'A classic and beloved Korean ramen. If you are a connoisseur of spicy instant ramen, Nong Shim''s Hot & Spicy Shin Ramen is an absolute must-try. This ramen''s secret lies in the spicy soup broth, which is made with plenty of red chilli pepper as well as savoury garlic, onion, and anchovy. Enjoy this ramen as it is for a lighter meal, or add your favourite meat and vegetable garnishes for something more substantial.', 1, 2, 'Korea', 'Nong Shim', 'Nong-Shim-Gourmet-Spicy-Shin-Ramen-Multipack.png', '2022-02-06 06:04:19', 1, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (4, 'Gekkeikan Daiginjo Sake with Ochoko Cup', 233, 58, 'Enjoy a taste of exquisite daiginjo sake with this sample bottle. Whether you''re trying daiginjo sake for the first time or finding a great sake for one, this sake by Gekkeikan, choice brewery of the Japanese Royal Family, is sure to please the palates of beginners and experts alike. Made from rice milled to 50% of its original size, this sake has a mild fruity flavour and gentle mouthfeel, with a small amount of brewer''s alcohol added to extract more lively aromas. The cap also doubles as an ochoko sake cup to drink from!', 1, 1, 'Japan', 'Gekkeikan', 'Gekkeikan-Daiginjo-Sake-with-Ochoko-Cup.png', '2022-03-27 01:08:30', 2, 3);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (5, 'Asahi Dry Zero Alcohol-Free Beer Drink', 28, 148, 'Enjoy Japan''s bestselling beer refreshingly alcohol free. Retaining the crisp, light refreshment that made their versatile beer a go-to beverage for all drinking occasions, Asahi invites everyone to experience the exquisitely dry taste of this alcohol-free variant. Brewed with a satisfying dose of fibre and soy amino acids, this zero calorie beer keeps its wonderfully deep amber colour and depth, fizzing with a full, sweetened flavour that''s sure to provide a refreshing pick me up. Sugar free yet still wonderfully satisfying, this beer helps gives anyone access to Japan''s number one choice of relaxation. ', 1, 1, 'Japan', 'Asahi', 'Asahi-Dry-Zero-Alcoho.png', '2021-12-15 01:25:27', 2, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (6, 'Shinmei Toyama Koshihikari Rice, Small', 169, 80, 'A sweeter premium rice from Toyama. Try a slightly different flavour of rice with this 1kg bag of Koshihikari white rice. Grown in Nyuzen, an area of Toyama prefecture famous for its pure and fast flowing fresh spring waters, this Japonica rice has a unique flavour slightly sweeter than other Japanese rices, as well as the slightly sticky texture typical of Koshihikari rices. Use to make sushi or serve on the side of other Japanese dishes.', 1, 1, 'Japan', 'Shinmei', 'Shinmei-Toyama-Koshihikari-Rice-Small.png', '2022-09-23 21:36:25', 4, 1);

