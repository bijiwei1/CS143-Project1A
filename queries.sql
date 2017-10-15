--The names of all the actors in the movie 'Death to Smoochy'.
select concat(a.first, " ", a.last) as Name
from Actor a
where a.id = (select ma.aid
			  from MovieActor ma
			  where mid = ( select m.id 
			  				from Movie m
			  				where m.title = 'Death to Smoochy')	
			);

-- The count of all the directors who directed at least 4 movies.
select count(d.id)
from Director d
where d.id in ( select did as id
			    from MovieDirector
			    group by id
			    having count(mid) >= 4);

--The movies that have imdb rating over or equal to 90.
select m.title
from Movie m, MovieRating mr
where m.id = mr.mid and mr.imdb >= 90;

--The movie that makes most money
select distinct m.title
from Movie m 
where m.id = ( select s.mid
			   from Sales s 
			   where s.totalIncome = ( select Max(s1.totalIncome)
			   						   from Sales s1)
			 );
