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





/*test data*/
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (1, 'Foam Espresso Cup Plain White', 110, 26, 1.08, 2, 1, 'Ireland', 'Gran Sport', 'http://dummyimage.com/110x100.png/5fa2dd/ffffff', '2022-02-05 03:32:40', 1, 1);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (2, 'Veal - Ground', 225, 87, -1.44, 2, 1, 'China', 'GX', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', '2022-07-18 13:13:38', 2, 2);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (3, 'Sugar - Monocystal / Rock', 269, 42, -0.67, 2, 1, 'Czech Republic', 'XJ', 'http://dummyimage.com/185x100.png/cc0000/ffffff', '2022-07-25 00:35:45', 3, 3);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (4, 'Tamarind Paste', 300, 83, -0.3, 2, 1, 'Madagascar', 'Corvette', 'http://dummyimage.com/153x100.png/ff4444/ffffff', '2021-12-27 04:31:43', 4, 4);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (5, 'Wine - Crozes Hermitage E.', 17, 33, 0.02, 2, 1, 'China', 'Century', 'http://dummyimage.com/154x100.png/ff4444/ffffff', '2022-03-14 20:30:36', 5, 5);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (6, 'Cheese - Goat With Herbs', 176, 13, -0.46, 1, 2, 'China', 'A4', 'http://dummyimage.com/103x100.png/5fa2dd/ffffff', '2022-03-12 10:42:31', 6, 6);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (7, 'Wine - Magnotta, White', 8, 99, -0.42, 2, 2, 'China', 'Highlander', 'http://dummyimage.com/138x100.png/ff4444/ffffff', '2022-03-03 20:36:00', 7, 7);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (8, 'Spinach - Spinach Leaf', 146, 9, -0.31, 1, 1, 'Vietnam', 'Escort', 'http://dummyimage.com/161x100.png/5fa2dd/ffffff', '2022-06-23 05:31:30', 8, 8);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (9, 'Oil - Macadamia', 200, 45, 1.53, 1, 1, 'Palestinian Territory', 'CR-V', 'http://dummyimage.com/137x100.png/5fa2dd/ffffff', '2022-05-29 17:56:52', 9, 9);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (10, 'Lychee - Canned', 190, 81, 1.56, 2, 1, 'Japan', 'Th!nk', 'http://dummyimage.com/146x100.png/5fa2dd/ffffff', '2021-12-18 02:29:29', 10, 10);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (11, 'Chervil - Fresh', 43, 76, 0.45, 2, 2, 'Sweden', 'Grand Prix', 'http://dummyimage.com/113x100.png/ff4444/ffffff', '2022-10-21 11:52:43', 11, 11);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (12, 'Beef - Ox Tongue, Pickled', 179, 88, 1.63, 2, 1, 'Philippines', '9000', 'http://dummyimage.com/197x100.png/dddddd/000000', '2022-05-02 16:03:21', 12, 12);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (13, 'Cookies - Oreo, 4 Pack', 222, 95, 2.51, 1, 1, 'Vietnam', 'Ciera', 'http://dummyimage.com/217x100.png/ff4444/ffffff', '2022-05-29 21:25:11', 13, 13);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (14, 'Ecolab - Lime - A - Way 4/4 L', 153, 77, 0.4, 1, 1, 'China', 'V8', 'http://dummyimage.com/206x100.png/dddddd/000000', '2022-04-20 07:23:06', 14, 14);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (15, 'Wine - Red, Pelee Island Merlot', 140, 17, 1.22, 2, 1, 'Peru', 'tC', 'http://dummyimage.com/226x100.png/5fa2dd/ffffff', '2022-06-10 22:54:32', 15, 15);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (16, 'Soup - Campbells Mushroom', 94, 52, 0.7, 1, 2, 'Russia', 'Elantra', 'http://dummyimage.com/214x100.png/ff4444/ffffff', '2022-03-07 00:41:28', 16, 16);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (17, 'Beef - Texas Style Burger', 256, 17, 0.09, 1, 1, 'Brazil', 'LS', 'http://dummyimage.com/136x100.png/dddddd/000000', '2022-02-14 23:00:11', 17, 17);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (18, 'Petit Baguette', 107, 68, -0.6, 1, 2, 'Indonesia', 'Q5', 'http://dummyimage.com/198x100.png/dddddd/000000', '2022-07-17 07:13:02', 18, 18);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (19, 'Sloe Gin - Mcguinness', 73, 100, -0.15, 1, 1, 'Russia', 'Boxster', 'http://dummyimage.com/188x100.png/cc0000/ffffff', '2022-09-14 23:31:36', 19, 19);
insert into product (productID, title, price, stockQuantity, description, isNew, isDailySpecial, country, brand, productImage, timestamp, productTypeID, discountID) values (20, 'Cake Slab', 110, 47, -0.49, 1, 2, 'Ukraine', 'Azera', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', '2022-11-02 22:54:20', 20, 20);