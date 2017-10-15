INSERT INTO Movie
	VALUES(\N, "killa kill", 2018, "R", "Warner Sisters"); --It violates the primary key constraint that it cannot be null

INSERT INTO Actor
	VALUES(\N, "Wang", "Haoran", "Male", 1995-03-23, \N); --It violated the primary key constraint that it cannot be null

INSERT INTO Sales
	VALUES(\N, 400000, 9000000000); --It violates the constraint that movie id cannot be null

INSERT INTO Director
	VALUES(\N, "Wang", "Haoran", "Male", 1995-03-23, \N); --It violates the constraint that director id cannot be null

INSERT INTO MovieGenre
	VALUES(\N, "drama"); --It violates the constraint that the movie id cannot be null

INSERT INTO MovieDirector
	VALUES(\N, 3496); --It violates the constraint that the movie id cannot be null

INSERT INTO MovieActor
	VALUES(\N, 234122, "Hero"); --It violates the constraint that the movie id cannot be null

INSERT INTO MovieRating
	VALUES(2341234, 200, 99); --It violates the check that imdb has to be between 0 and 100

INSERT INTO Review
	VALUES("WOW", 2017-10-15 10:10:10, 283423, 10, "wow"); --It voilates the check that the rating has to be between 0 and 5