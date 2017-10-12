CREATE TABLE Movie(
	id INT primary key,   -- Each movie has its own id
	title VARCHAR(100),
	year INT,
	rating VARCHAR(10),
	company VARCHAR(50)
) 

CREATE TABLE Actor(
	id INT primary key, -- Each movie has its own id
	last VARCHAR(20),
	first VARCHAR(20),
	sex VARCHAR(6),
	dob DATE,
	dod DATE
)

CREATE TABLE Sales(
	mid INT primary key, -- Each movie has its own id
	ticketsSold INT,
	totalIncome INT
)

CREATE TABLE Director(
	id INT primary key, -- Each movie has its own id
	last VARCHAR(20),
	first VARCHAR(20),
	sex VARCHAR(6),
	dob DATE,
	dod DATE 
)

CREATE TABLE MovieGenre(
	mid INT primary key, -- Each movie has its own id
	genre VARCHAR(20)
)

CREATE TABLE MovieGeMovieDirectornre(
	mid INT primary key, -- Each movie has its own id
	did INT
)

CREATE TABLE MovieActor(
	mid INT primary key, -- Each movie has its own id
	aid INT,
	role VARCHAR(50)
)

CREATE TABLE MovieRating(
	mid INT primary key, -- Each movie has its own id
	imdb INT,
	rot INT
)

CREATE TABLE Review(
	name VARCHAR(20),
	time TIMESTAMP,
	mid INT primary key, -- Each movie has its own id
	rating INT,
	comment VARCHAR(500)
)

CREATE TABLE MaxPersonID(
	id INT
)

CREATE TABLE MaxMovieID(
	id INT
)