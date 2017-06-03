INSERT INTO `match` (
	round, datePlayed, homeTeam, awayTeam, homeGoals, awayGoals
VALUES
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Swansea City'), (SELECT id FROM team WHERE name = 'West Ham'), 3, 0),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Middlesbrough'), (SELECT id FROM team WHERE name = 'Tottenham Hotspur'), 1, 5),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Hull City'), (SELECT id FROM team WHERE name = 'Chelsea'), 4, 2),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Tottenham Hotspur'), (SELECT id FROM team WHERE name = 'Crystal Palace'), 5, 1),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Arsenal'), (SELECT id FROM team WHERE name = 'Burnley'), 5, 2),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Manchester United'), (SELECT id FROM team WHERE name = 'Sunderland'), 4, 2),
(6, '2017-04-14', (SELECT id FROM team WHERE name = 'Liverpool'), (SELECT id FROM team WHERE name = 'Everton'), 4, 2),
(6, '2017-04-15', (SELECT id FROM team WHERE name = 'Manchester City'), (SELECT id FROM team WHERE name = 'Bournemouth'), 4, 2),
(6, '2017-04-15', (SELECT id FROM team WHERE name = 'Southampton'), (SELECT id FROM team WHERE name = 'West Bromwich Albion'), 3, 1)
;