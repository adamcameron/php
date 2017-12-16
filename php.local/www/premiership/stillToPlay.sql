SELECT
	allMatches.home, GROUP_CONCAT(allMatches.away SEPARATOR '     ') as remainingGames
FROM (
	SELECT
		home.name AS team, away.name AS opponent
	FROM
		`match` m
		INNER JOIN team home ON m.homeTeam = home.id
		INNER JOIN team away ON m.awayTeam = away.id
	UNION

	SELECT
		away.name AS team, home.name AS opponent
	FROM
		`match` m
		INNER JOIN team home ON m.homeTeam = home.id
		INNER JOIN team away ON m.awayTeam = away.id
) teamMatches
RIGHT JOIN (
	SELECT h.name AS home, a.name AS away
    FROM team h CROSS JOIN team a
    WHERE h.current = TRUE
    AND a.current = TRUE
    AND h.id != a.id
) allMatches
ON teamMatches.team = allMatches.home
AND teamMatches.opponent = allMatches.away
WHERE
	teamMatches.opponent IS NULL
GROUP BY
	allMatches.home    
ORDER BY
	allMatches.home

 	