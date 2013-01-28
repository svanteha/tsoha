CREATE TABLE Users(
user_id serial PRIMARY KEY,
username VARCHAR(255) UNIQUE CHECK (char_length(username) > 2),
password VARCHAR(255) CHECK (char_length(password) > 5),
banned BOOLEAN DEFAULT false,
admin BOOLEAN DEFAULT false,
age INT CHECK (age>18),
gender VARCHAR(255),
country VARCHAR(255),
city VARCHAR(255),
description VARCHAR(255),
first_name VARCHAR(255),
last_name VARCHAR(255),
phone_number BIGINT,
email VARCHAR(255)
);

CREATE TABLE Sites(
site_id serial PRIMARY KEY,
user_id  INT NOT NULL,
secret BOOLEAN DEFAULT true,
date_created DATE,
FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Messages(
message_id serial PRIMARY KEY,
from_user_id INT,
to_user_id INT,
date_sent TIMESTAMP,
subject VARCHAR(255),
message TEXT,
FOREIGN KEY (from_user_id) REFERENCES Users(user_id),
FOREIGN KEY (to_user_id) REFERENCES Users(user_id)
);

CREATE TABLE Contacts(
contact_id serial PRIMARY KEY,
user_id INT,
role_code INT,
date_contact_from DATE,
contact_email VARCHAR(255),
contact_name VARCHAR(255),
contact_phone BIGINT,
FOREIGN KEY (user_id) REFERENCES Users(user_id),
FOREIGN KEY (role_code) REFERENCES Roles(role_code)
);

CREATE TABLE Roles(
role_code serial PRIMARY KEY,
description VARCHAR(255)
);
