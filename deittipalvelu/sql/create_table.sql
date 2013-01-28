CREATE TABLE users(
user_id serial PRIMARY KEY,
user_name VARCHAR(255) UNIQUE CHECK (char_length(user_name) > 2),
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
phone_number BIGINT(10),
email VARCHAR(255)
);

CREATE TABLE sites(
site_id serial PRIMARY KEY,
user_id  INT FOREIGN KEY,
secret BOOLEAN DEFAULT true,
date_created DATETIME()
);

CREATE TABLE messages(
message_id serial PRIMARY KEY,
from_user_id INT FOREIGN KEY,
to_user_id INT FOREIGN KEY,
date_sent TIMESTAMP(),
subject VARCHAR(255),
message TEXT
);

CREATE TABLE contacts(
contact_id serial PRIMARY KEY,
user_id INT FOREIGN KEY,
role_code INT FOREIGN KEY,
date_contact_from DATE(),
contact_email VARCHAR(255),
contact_name VARCHAR(255),
contact_phone BIGINT()
);

CREATE TABLE role(
role_code serial PRIMARY KEY,
description VARCHAR(255)
);
