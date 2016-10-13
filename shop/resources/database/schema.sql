CREATE TABLE article
(
    article_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    article_id_parent INT(11),
    category_id INT(11),
    manufacturer_id INT(11),
    ordernumber VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DOUBLE,
    pseudoprice DOUBLE,
    descrtiption VARCHAR(255),
    description_long TEXT,
    image TEXT,
    isAlone TINYINT(1) NOT NULL,
    CONSTRAINT article_category_category_id_fk FOREIGN KEY (category_id) REFERENCES category (category_id),
    CONSTRAINT article_manufacturer_manufacturer_id_fk FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (manufacturer_id)
);
CREATE INDEX article_category_category_id_fk ON article (category_id);
CREATE INDEX article_manufacturer_manufacturer_id_fk ON article (manufacturer_id);
CREATE TABLE category
(
    category_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    category_id_parent INT(11),
    name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL,
    description TEXT,
    image TEXT,
    sortkey INT(11) NOT NULL,
    CONSTRAINT category_category_category_id_fk FOREIGN KEY (category_id_parent) REFERENCES category (category_id)
);
CREATE INDEX category_category_category_id_fk ON category (category_id_parent);
CREATE TABLE attribute
(
    attribute_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE manufacturer
(
    manufacturer_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image TEXT
);
CREATE TABLE `option`
(
    option_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);
CREATE TABLE option_article
(
    option_article_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    article_id INT(11) NOT NULL,
    option_id INT(11) NOT NULL,
    value VARCHAR(255) NOT NULL,
    CONSTRAINT option_article_article_article_id_fk FOREIGN KEY (article_id) REFERENCES article (article_id),
    CONSTRAINT option_article_option_option_id_fk FOREIGN KEY (option_id) REFERENCES `option` (option_id)
);
CREATE INDEX option_article_article_article_id_fk ON option_article (article_id);
CREATE INDEX option_article_option_option_id_fk ON option_article (option_id);
CREATE TABLE attribute_article
(
    attribute_article_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    article_id INT(11) NOT NULL,
    attribute_id INT(11) NOT NULL,
    value VARCHAR(255) NOT NULL,
    CONSTRAINT attribute_article_article_article_id_fk FOREIGN KEY (article_id) REFERENCES article (article_id),
    CONSTRAINT attribute_article_attribute_attribute_id_fk FOREIGN KEY (attribute_id) REFERENCES attribute (attribute_id)
);
CREATE INDEX attribute_article_article_article_id_fk ON attribute_article (article_id);
CREATE INDEX attribute_article_attribute_attribute_id_fk ON attribute_article (attribute_id);