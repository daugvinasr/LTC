
CREATE TABLE Users
(
	email varchar (255) NOT NULL,
	password varchar (255) NOT NULL,
	firstLastName varchar (255) NOT NULL,
	createdAt timestamp NOT NULL,
	role ENUM('doctor', 'patient', 'analyst') NOT NULL,
	id_user integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_user)
);

CREATE TABLE Visits
(
	isActive boolean,
	registrationDate date NOT NULL,
	visitDate timestamp NOT NULL,
	analysisRequestedByPatient boolean,
	analysisStatus boolean,
	id_visit integer NOT NULL AUTO_INCREMENT,
	fk_userid integer NOT NULL,
	PRIMARY KEY(id_visit),
	FOREIGN KEY(fk_userid) REFERENCES Users (id_user)
);

CREATE TABLE Comments
(
	message varchar (255) NOT NULL,
	createdAt timestamp NOT NULL,
	author varchar (255) NOT NULL,
	id_comment integer NOT NULL AUTO_INCREMENT,
	fk_visit integer NOT NULL,
	fk_userid integer NOT NULL,
	PRIMARY KEY(id_comment),
	FOREIGN KEY(fk_visit) REFERENCES Visits (id_visit),
	FOREIGN KEY(fk_userid) REFERENCES Users (id_user)
);
