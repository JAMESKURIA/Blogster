CREATE TABLE LOGIN(
	LOGIN_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	LOGIN_EMAIL TEXT,
	LOGIN_PASSWORD TEXT
);

CREATE TABLE USERS(
	USER_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	USER_FNAME varchar(20),
	USER_LNAME varchar(20),
	USER_PROFESSION TEXT,
	USER_PHONE_NO varchar(20),
	USER_LOCATION TEXT,
    USER_LOGIN_ID INT,
	USER_JOIN_DATE DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (USER_LOGIN_ID) REFERENCES LOGIN (LOGIN_ID)
);


CREATE TABLE CATEGORIES(
	CATEGORY_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CATEGORY_ICON varchar(50),
	CATEGORY_NAME varchar(100),
	CATEGORY_DEFAULT_IMAGE varchar(100),
    CATEGORY_NO_OF_POSTS INT DEFAULT 0
);


CREATE TABLE BLOGS(
	BLOG_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    BLOG_CATEGORY TEXT,
	BLOG_TITLE TEXT,
	BLOG_POST_DATE DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
	BLOG_AUTHOR varchar(20),
    BLOG_IMAGE varchar(50),
	BLOG_CONTENT varchar(2500),
    BLOG_USER_ID INT,
    FOREIGN KEY (BLOG_USER_ID) REFERENCES USERS(USER_ID),
    BLOG_CATEGORY_ID INT,
    FOREIGN KEY (BLOG_CATEGORY_ID) REFERENCES CATEGORIES(CATEGORY_ID)
);


INSERT INTO CATEGORIES(
	CATEGORY_ICON,
	CATEGORY_NAME,
	CATEGORY_DEFAULT_IMAGE
)VALUES ('<i class="fas fa-vest-patches"></i>', 'Fashion and Lifestyle', 'default-fashion.png'),
		('<i class="fas fa-microchip"></i>', 'IT and Technology', 'default-technology.jpg'),
		('<i class="fas fa-money-check-alt"></i>', 'Business and Money', 'default-finance.jpg'),
		('<i class="fas fa-file-medical-alt"></i>', 'Health and Medicine', 'default-health.jpg'),
		('<i class="fas fa-route"></i>', 'Food and Travel', 'default-food.jpg'),
		('<i class="fas fa-sign"></i>', 'Real estate', 'default-real-estate.jpg'),
		('<i class="fas fa-music"></i>', 'Music and Entertainment', 'default-music.jpg'),
		('<i class="fas fa-asterisk"></i>', 'Other', 'default-other.jpg');