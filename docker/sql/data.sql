CREATE TABLE `user` (
                         `id` mediumint(8) unsigned NOT NULL auto_increment,
                         `username` varchar(255) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `surname` varchar(50) NOT NULL,
                         `password` varchar(255) default NULL,
                         `email` varchar(255) NOT NULL,
                         PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `user` (`id`,`username`, `name`, `surname`, `password`,`email`) VALUES (1,"aanneettgg", "Aneta","Gábrišová", "$2y$10$FhClIlZMhlCaLp7qCzerXuf1CpyTBNc7sHk1ZaCg.EymKONW5acCK","anikgabrisova@gmail.com");

CREATE TABLE `company` (
                         `id` mediumint(8) unsigned NOT NULL auto_increment,
                         `userId` mediumint(8) unsigned NOT NULL,
                         `companyName` varchar(255) NOT NULL,
                         `companyDescription` varchar(1000) NOT NULL,
                         `companyImage` varchar(1000) NOT NULL,
                         PRIMARY KEY (`id`),
                         CONSTRAINT `FK_company_user` FOREIGN KEY (userId) REFERENCES user(id) ON DELETE CASCADE
) AUTO_INCREMENT=1;

INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (1, 1, "Yeme", "Yeme plnochutne potraviny.", "firma_yeme.jpg");
INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (2, 1, "Lyra", "Cokoladka mnam mnam.", "firma_lyra.jpg");
INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (3, 1, "Slowlandia", "Lepsie ako Nutella.", "firma_slowlandia.jpg");

CREATE TABLE `product` (
                        `id` mediumint(8) unsigned NOT NULL auto_increment,
                        `companyId` mediumint(8) unsigned NOT NULL,
                        `productName` varchar(255) NOT NULL,
                        `productType` varchar(255) NOT NULL,
                        `productPrice` double(10,2) NOT NULL,
                        `productDescription` varchar(1000) NOT NULL,
                        `productImage` varchar(1000) NOT NULL,
                        PRIMARY KEY (`id`),
                        CONSTRAINT `FK_product_company` FOREIGN KEY (companyId) REFERENCES company(id) ON DELETE CASCADE
) AUTO_INCREMENT=1;

INSERT INTO `product` (`id`, `companyId`, `productName`, `productType`, `productPrice`, `productDescription`, `productImage`) VALUES (1, 1, "Banány", "Potraviny", 1.20,  "Banány obsahujú veľa draslíku, ktorý je zdravý.", "banany.jpg");
INSERT INTO `product` (`id`, `companyId`, `productName`, `productType`, `productPrice`, `productDescription`, `productImage`) VALUES (2, 1, "Paradajky", "Potraviny", 2.90, "Plody paradajky patria medzi najvydarenejšie produkty prírody.", "paradajky.png");

CREATE TABLE `review` (
                        `id` mediumint(8) unsigned NOT NULL auto_increment,
                        `productId` mediumint(8) unsigned NOT NULL,
                        `reviewDescription` varchar(1000),
                        `rating` int unsigned NOT NULL,
                        PRIMARY KEY (`id`),
                        CONSTRAINT `FK_review_product` FOREIGN KEY (productId) REFERENCES product(id) ON DELETE CASCADE
) AUTO_INCREMENT=1;

INSERT INTO `review` (`id`, `productId`, `reviewDescription`, `rating`) VALUES (1, 1, "Veľmi chutné a plné vitamínov", 5);