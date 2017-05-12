<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Coming+Soon" />
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>
<body>
<h1>Zachary’s Hand-Football Premiership Points Table 2017</h1>
<table class="season">
    <thead>
    <tr><th>&nbsp;</th><th class="teamName">Team</th><th>P</th><th>W</th><th>D</th><th>L</th><th>GF</th><th>GA</th><th>GD</th><th>Pts</th></tr>
    </thead>
    <tbody>
    <?php
    $connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', 'localhost', 3306, 'handFootball');
    $dbConnection = new \PDO($connectionString, 'handFootball', 'handFootball');
    $table = $dbConnection->query('
        SELECT tbl.*, team.abbrev
        FROM handFootball.tableWeek5 tbl
        INNER JOIN team ON tbl.name = team.name
        ORDER BY tbl.rank
    ');

    foreach ($table as $team) {
        printf(
            '<tr class="%s">
                <td class="rank">%d<span class="prev">(%d)</span></td>
                <td class="teamName">%s</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
                <td>%d</td>
            <tr>',
            $team['abbrev'],
            $team['rank'],
            $team['prev'],
            $team['name'],
            $team['p'],
            $team['w'],
            $team['d'],
            $team['l'],
            $team['gf'],
            $team['ga'],
            $team['gd'],
            $team['pts']
        );
    }
    ?>
    </tbody>
</table>
</body>
</html>
<?php
$html = ob_get_clean();
echo $html;
file_put_contents('C:\temp\table.html', $html);
