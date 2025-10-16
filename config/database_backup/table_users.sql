CREATE TABLE users(
	id BIGSERIAL PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	mobile_number VARCHAR(30) NOT NULL,
	ide_number VARCHAR(30) NULL,
	adress TEXT NULL,
	birthday DATE NULL,
	email VARCHAR(200) NOT NULL UNIQUE,
	password TEXT NOT NULL,
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	deleted_at TIMESTAMPTZ NULL
);

INSERT INTO users (
	firstname,
	lastname,
	mobile_number,
	email,
	password
)
VALUES(
	'Karloz',
	'Craxker',
	'3207996294',
	'karloz.craxker@gmail.com',
	'1234567'
) 

CREATE TABLE countries(
	id BIGSERIAL PRIMARY KEY,
	countryname VARCHAR(30) NOT NULL,
	countryabbreviation VARCHAR(30) NOT NULL,
	countrycode VARCHAR(30) NOT NULL,
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	deleted_at TIMESTAMPTZ NULL
);

INSERT INTO countries (
	countryname,
	countryabbreviation,
	countrycode,
)
VALUES(
	'Colombia',
	'col',
	'57',
) 