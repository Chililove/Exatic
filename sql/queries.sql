/* Profile */
SELECT
    u.firstName,
    u.lastName,
    u.email,
    u.imagePath,
    a.streetName,
    a.streetNumber,
    a.streetNumber,
    pc.cityName,
    pc.country
FROM user u, address a, postalcode pc
WHERE u.addressID = a.addressID
  AND a.postalCodeID = pc.postalCodeID



/* Discount */
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (1, "None", "No discount", "0", "2022-10-28 14:00:00");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (2, "Halloween", "Halloween Event", "20", "2022-10-28 14:00:00");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (3, "Winter Sale", "WINTER SALE", "50", "2022-11-24 14:48:50");
INSERT INTO discount (discountID, eventName, description, discountProcent, duration) VALUES (4, "Black Friday", "BLACK FRIDAY", "70", "2022-11-25 23:59:59");



/* producttype */
INSERT INTO producttype (productTypeID, typeName) VALUES (1, "Food");
INSERT INTO producttype (productTypeID, typeName) VALUES (2, "Drink");
INSERT INTO producttype (productTypeID, typeName) VALUES (3, "Candy");
INSERT INTO producttype (productTypeID, typeName) VALUES (4, "Fish");
INSERT INTO producttype (productTypeID, typeName) VALUES (5, "Frozen food");



/* product*/
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (1, 'Bread - Crusty Italian Poly', 147, 74, 'cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget', 2, 1, 'Indonesia', 'C-Class', 'http://dummyimage.com/115x100.png/ff4444/ffffff', '2022-03-17 13:29:03', 1, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (2, 'Pie Shells 10', 291, 83, 'pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris', 2, 2, 'China', 'Mustang', 'http://dummyimage.com/142x100.png/dddddd/000000', '2022-03-19 19:07:44', 2, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (3, 'The Pop Shoppe - Root Beer', 7, 63, 'nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras', 1, 2, 'Poland', 'Cooper', 'http://dummyimage.com/243x100.png/ff4444/ffffff', '2022-02-06 06:04:19', 3, 3);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (4, 'Pastry - Chocolate Marble Tea', 233, 58, 'nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo', 1, 1, 'China', 'Equinox', 'http://dummyimage.com/178x100.png/ff4444/ffffff', '2022-03-27 01:08:30', 4, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (5, 'Kiwi Gold Zespri', 182, 14, 'interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at', 1, 1, 'Thailand', 'Suburban 1500', 'http://dummyimage.com/130x100.png/dddddd/000000', '2021-12-15 01:25:27', 5, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (6, 'Ham - Smoked, Bone - In', 169, 80, 'curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum', 1, 1, 'Portugal', 'Cougar', 'http://dummyimage.com/206x100.png/ff4444/ffffff', '2022-09-23 21:36:25', 2, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (7, 'Chicken - Leg / Back Attach', 63, 45, 'cum sociis natoque penatibus et magnis dis parturient montes nascetur', 2, 2, 'Sweden', 'S10', 'http://dummyimage.com/147x100.png/5fa2dd/ffffff', '2021-11-07 02:17:35', 2, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (8, 'Cheese - Pont Couvert', 103, 40, 'felis donec semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan', 1, 2, 'Indonesia', 'Crossfire', 'http://dummyimage.com/181x100.png/ff4444/ffffff', '2022-08-26 09:22:20', 1, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (9, 'Tuna - Salad Premix', 129, 100, 'nulla nunc purus phasellus in felis donec semper sapien a libero nam dui proin', 2, 1, 'Peru', 'Regal', 'http://dummyimage.com/163x100.png/5fa2dd/ffffff', '2022-04-21 11:02:12', 4, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (10, 'Swiss Chard', 76, 24, 'sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu', 1, 2, 'China', 'Elantra', 'http://dummyimage.com/234x100.png/cc0000/ffffff', '2022-03-18 12:08:58', 4, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (11, 'Miso - Soy Bean Paste', 72, 7, 'ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci', 2, 1, 'France', 'M-Class', 'http://dummyimage.com/230x100.png/dddddd/000000', '2022-07-15 09:19:30', 1, 3);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (12, 'Apron', 262, 40, 'vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend', 2, 1, 'Peru', 'Dakota', 'http://dummyimage.com/243x100.png/ff4444/ffffff', '2022-10-08 15:46:59', 3, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (13, 'Ice Cream - Fudge Bars', 123, 61, 'sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at', 1, 2, 'Brazil', 'R-Class', 'http://dummyimage.com/241x100.png/ff4444/ffffff', '2022-04-08 11:57:15', 2, 3);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (14, 'Chilli Paste, Ginger Garlic', 149, 75, 'vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula', 1, 1, 'Russia', 'Quantum', 'http://dummyimage.com/247x100.png/5fa2dd/ffffff', '2021-11-27 01:02:55', 2, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (15, 'Thyme - Fresh', 163, 12, 'curae duis faucibus accumsan odio curabitur convallis duis consequat dui', 1, 1, 'China', 'SC', 'http://dummyimage.com/202x100.png/5fa2dd/ffffff', '2021-12-21 11:27:34', 3, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (16, 'Cheese - Brick With Onion', 85, 7, 'vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum', 1, 1, 'Czech Republic', 'Grand Prix', 'http://dummyimage.com/250x100.png/dddddd/000000', '2022-11-06 17:04:54', 1, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (17, 'Beef - Top Sirloin', 123, 29, 'pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in', 1, 2, 'Nigeria', 'Grand Am', 'http://dummyimage.com/230x100.png/5fa2dd/ffffff', '2022-11-06 05:10:13', 4, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (18, 'Pepper - White, Ground', 295, 22, 'ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris', 2, 1, 'Zimbabwe', 'Gallardo', 'http://dummyimage.com/167x100.png/ff4444/ffffff', '2022-08-09 18:21:02', 2, 1);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (19, 'Cream - 35%', 106, 17, 'fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a', 2, 2, 'Thailand', 'Crown Victoria', 'http://dummyimage.com/170x100.png/5fa2dd/ffffff', '2021-11-07 04:05:09', 3, 2);
INSERT INTO product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (20, 'Cattail Hearts', 75, 20, 'fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed', 2, 2, 'Portugal', 'Savana 2500', 'http://dummyimage.com/250x100.png/ff4444/ffffff', '2022-06-10 20:00:29', 1, 1);