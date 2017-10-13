select concat(a.first, " ", a.last)
from Actor a
where a.id = (select ma.aid
			  from MovieActor ma
			  where mid = ( select m.id 
			  				from Movie m
			  				where m.title = 'Death to Smoochy')	
			)


