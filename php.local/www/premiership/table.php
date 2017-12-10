<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Coming+Soon" />
    <link rel="stylesheet" type="text/css" href="./styles.css?random=<?php echo uniqid() ?>" />
</head>
<body>
<h1>Zachary’s Hand-Football Premiership Table 17/18</h1>
<table class="season">
    <thead>
    <tr><th>M</th><th>Pos</th><th class="teamName">Club</th><th>Pl</th><th>W</th><th>D</th><th>L</th><th>GF</th><th>GA</th><th>GD</th><th>Pts</th></tr>
    </thead>
    <tbody>
    <?php
    $connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', 'localhost', 3306, 'handfootball');
    $dbConnection = new \PDO($connectionString, 'handfootball', 'handfootball');
    $table = $dbConnection->query('
        SELECT tbl.*, team.abbrev
        FROM handfootball.tableweek7 tbl
        INNER JOIN team ON tbl.name = team.name
        ORDER BY tbl.rank
    ');

    foreach ($table as $team) {
        switch ($team['rank'] <=> $team['prev']) {
            case -1 :
                $change = 'Up';
                break;
            case 1 :
                $change = 'Down';
                break;
            default :
                $change = 'Same';
        }
        printf(
            '<tr class="%s">
                <td class="change%s">&nbsp;<span class="prev">%d</span></td>
                <td class="rank">%d</td>
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
            $change,
            $team['prev'],
            $team['rank'],
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
