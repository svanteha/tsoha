CREATE TABLE kayttajat(
id serial PRIMARY KEY,
tunnus varchar UNIQUE CHECK (char_length(tunnus) > 2),
salasana varchar CHECK (char_length(salasana) > 5),
banned boolean DEFAULT false,
admin boolean DEFAULT false
);
