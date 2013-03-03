CREATE TABLE Users(
user_id serial PRIMARY KEY,
username VARCHAR(255) UNIQUE CHECK (char_length(username) > 2),
password VARCHAR(255) CHECK (char_length(password) > 5),
banned BOOLEAN DEFAULT false,
admin BOOLEAN DEFAULT false,
sex_pref VARCHAR(255),
relationship_type VARCHAR(255),
age INT CHECK (age > 17),
gender VARCHAR(255),
country VARCHAR(255),
city VARCHAR(255),
description VARCHAR(255),
first_name VARCHAR(255),
last_name VARCHAR(255),
phone_number VARCHAR(255) CHECK (char_length(phone_number) = 10),
email VARCHAR(255)
);

CREATE TABLE Messages(
message_id serial PRIMARY KEY,
from_user_id INT,
to_user_id INT,
date_sent TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
subject VARCHAR(255),
message TEXT,
FOREIGN KEY (from_user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
FOREIGN KEY (to_user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

CREATE TABLE Contacts(
contact_id serial PRIMARY KEY,
this_user_id INT,
contact_user_id INT,
date_contact_from TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (this_user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
FOREIGN KEY (contact_user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

CREATE TABLE Pending_requests(
request_id serial PRIMARY KEY,
to_user_id INT,
from_user_id INT,
date_sent TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (to_user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
FOREIGN KEY (from_user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
