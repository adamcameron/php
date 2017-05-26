CREATE TABLE `tableWeek6` (
  `rank` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rank`),
  UNIQUE KEY `id_UNIQUE` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
SELECT
	prev.rank as prev,
	t.name,
	COUNT(t.name) AS p,
	SUM(r.w) AS w,
	SUM(r.d) AS d,
	SUM(r.l) AS l,
	SUM(r.gf) AS gf,
	SUM(r.ga) AS ga,
	SUM(r.gf - r.ga) AS gd,
	SUM(r.w * 3 + r.d) AS pts
FROM (
	SELECT homeTeam AS team, homeGoals AS gf, awayGoals AS ga, IF(homeGoals > awayGoals, 1, 0) AS w, IF(homeGoals = awayGoals, 1, 0) AS d, IF(homeGoals < awayGoals, 1, 0) AS l  
	FROM `match`
	UNION ALL
	SELECT awayTeam AS team, awayGoals AS gf, homeGoals AS ga, IF(homeGoals < awayGoals, 1, 0) AS w, IF(homeGoals = awayGoals, 1, 0) AS d, IF(homeGoals > awayGoals, 1, 0) AS l  
	FROM `match`
) r
INNER JOIN team t ON r.team = t.id
INNER JOIN tableWeek5 prev ON t.name = prev.name
GROUP BY t.name
ORDER BY pts DESC, gd DESC, ga ASC

;
