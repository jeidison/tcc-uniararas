CREATE TABLE users (
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(30) NOT NULL,
	document VARCHAR(11) UNIQUE NOT NULL,
	sex VARCHAR(1) NOT NULL CHECK (sex = 'F' or sex = 'M'),
	date_birth DATE NOT NULL,
	phone VARCHAR(11),
	email VARCHAR,
	status VARCHAR(7) NOT NULL CHECK (status = 'ATIVO' or status = 'INATIVO')
);
