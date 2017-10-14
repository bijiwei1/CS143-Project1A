CREATE TABLE Movie(
	id INT,   
	title VARCHAR(100) NOT NULL, --Every movie must have a title.
	year INT,
	rating VARCHAR(10),
	company VARCHAR(50),
	PRIMARY KEY(id) -- Primary 1: Every movie has a unique id.
); 

CREATE TABLE Actor(
	id INT, 
	last VARCHAR(20),
	first VARCHAR(20),
	sex VARCHAR(6),
	dob DATE NOT NULL, -- Every actor must have a date of birth.
	dod DATE,
	PRIMARY KEY(id) -- Primary key 2: Every actor has a unique id
);

CREATE TABLE Sales(
	mid INT,  
	ticketsSold INT,
	totalIncome INT,
	FOREIGN KEY (mid) references Movie(id)  -- Reference 1
)ENGINE=INNODB;

CREATE TABLE Director(
	id INT,
	last VARCHAR(20),
	first VARCHAR(20),
	sex VARCHAR(6),
	dob DATE,
	dod DATE,
	PRIMARY KEY(id)-- Primary key 3: Every director has a unique id 
);

CREATE TABLE MovieGenre(
	mid INT,  
	genre VARCHAR(20),
	FOREIGN KEY (mid) references Movie(id)  -- Reference 2
)ENGINE=INNODB;

CREATE TABLE MovieDirector(
	mid INT, 
	did INT, 
	FOREIGN KEY (mid) references Movie(id)  -- Reference 3
	FOREIGN KEY (did) references Director(id)  -- Reference 4
)ENGINE=INNODB;

CREATE TABLE MovieActor(
	mid INT,  
	aid INT,
	role VARCHAR(50)，
	FOREIGN KEY (mid) references Movie(id)  -- Reference 5
	FOREIGN KEY (aid) references Actor(id)  -- Reference 6
)ENGINE=INNODB;

CREATE TABLE MovieRating(
	mid INT, 
	imdb INT,
	rot INT,
	CHECK(imdb >= 0 AND rating <= 100)  --Check 1: imdb is 0 - 100
	CHECK(rot >= 0 AND rating <= 100)  --Check 2: rot is 0 - 100
);

CREATE TABLE Review(
	name VARCHAR(20),
	time TIMESTAMP,
	mid INT, 
	rating INT,
	comment VARCHAR(500)，
    CHECK(rating >= 0 AND rating <= 5)  --Check 3: rating is 0 - 5
);

CREATE TABLE MaxPersonID(
	id INT
);

CREATE TABLE MaxMovieID(
	id INT
);