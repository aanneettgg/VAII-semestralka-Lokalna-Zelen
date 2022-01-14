CREATE TABLE `user` (
                         `id` mediumint(8) unsigned NOT NULL auto_increment,
                         `username` varchar(255) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `surname` varchar(50) NOT NULL,
                         `password` varchar(255) default NULL,
                         `email` varchar(255) NOT NULL,
                         PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `user` (`id`,`username`, `name`, `surname`, `password`,`email`) VALUES (1,"sameek", "Samuel","Hamilton", "12345678","ornare@sitametante.co.uk");
INSERT INTO `user` (`id`,`username`, `name`, `surname`, `password`,`email`) VALUES (2,"aneeta", "Anet","Hamilton", "12345678","ornare@sitametante.co.uk");
INSERT INTO `user` (`id`,`username`, `name`, `surname`, `password`,`email`) VALUES (3,"aanneettgg", "Aneta","Gábrišová", "12345678","anikgabrisova@gmail.com");

CREATE TABLE `company` (
                         `id` mediumint(8) unsigned NOT NULL auto_increment,
                         `userId` mediumint(8) unsigned NOT NULL,
                         `companyName` varchar(255) NOT NULL,
                         `companyDescription` varchar(1000) NOT NULL,
                         `companyImage` varchar(1000) NOT NULL,
                         PRIMARY KEY (`id`),
                         FOREIGN KEY (userId) REFERENCES user(id)
) AUTO_INCREMENT=1;

INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (1, 1, "Yeme", "Yeme plnochutne potraviny.", "firma_yeme.jpg");
INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (2, 2, "Lyra", "Cokoladka mnam mnam.", "firma_lyra.jpg");
INSERT INTO `company` (`id`, `userId`, `companyName`, `companyDescription`, `companyImage`) VALUES (3, 3, "Slowlandia", "Lepsie ako Nutella.", "firma_slowlandia.jpg");

CREATE TABLE `product` (
                        `id` mediumint(8) unsigned NOT NULL auto_increment,
                        `companyId` mediumint(8) unsigned NOT NULL,
                        `productName` varchar(255) NOT NULL,
                        `productType` varchar(255) NOT NULL,
                        `productPrice` double(10,2) NOT NULL,
                        `productDescription` varchar(1000) NOT NULL,
                        `productImage` varchar(1000) NOT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (companyId) REFERENCES company(id)
) AUTO_INCREMENT=1;

INSERT INTO `product` (`id`, `companyId`, `productName`, `productType`, `productPrice`, `productDescription`, `productImage`) VALUES (1, 3, "Banány", "Ovocie", 1.20,  "Good for your monkey.", "banany.jpg");
INSERT INTO `product` (`id`, `companyId`, `productName`, `productType`, `productPrice`, `productDescription`, `productImage`) VALUES (2, 3, "Paradajky", "Zelenina", 2.90, "Good for your salad.", "paradajky.png");

CREATE TABLE `review` (
                        `id` mediumint(8) unsigned NOT NULL auto_increment,
                        `productId` mediumint(8) unsigned NOT NULL,
                        `reviewDescription` varchar(1000),
                        `rating` int unsigned NOT NULL,
                        `likes` int unsigned NOT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (productId) REFERENCES product(id)
) AUTO_INCREMENT=1;