--The names of all the actors in the movie 'Death to Smoochy'.
select concat(a.first, " ", a.last)
from Actor a
where a.id = (select ma.aid
			  from MovieActor ma
			  where mid = ( select m.id 
			  				from Movie m
			  				where m.title = 'Death to Smoochy')	
			);

-- The count of all the directors who directed at least 4 movies

