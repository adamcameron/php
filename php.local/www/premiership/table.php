<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Coming+Soon" />
    <link rel="stylesheet" type="text/css" href="./styles.css" />
</head>
<body>
<table class="season">
    <thead>
    <tr><th>&nbsp;</th><th>&nbsp;</th><th>Team</th><th>P</th><th>W</th><th>D</th><th>L</th><th>GF</th><th>GA</th><th>GD</th><th>Pts</th></tr>
    </thead>
    <tbody>
    <?php
    $squads = [
        'BOU' => 'Bournemouth',
        'ARS' => 'Arsenal',
        'BUR' => 'Burnley',
        'CHE' => 'Chelsea',
        'CRY' => 'Crystal Palace',
        'EVE' => 'Everton',
        'HUL' => 'Hull City',
        'LEI' => 'Leicester City',
        'LIV' => 'Liverpool',
        'MCI' => 'Manchester City',
        'MUN' => 'Manchester United',
        'MID' => 'Middlesbrough',
        'SOU' => 'Southampton',
        'STO' => 'Stoke City',
        'SUN' => 'Sunderland',
        'SWA' => 'Swansea City',
        'TOT' => 'Tottenham Hotspur',
        'WAT' => 'Watford',
        'WBA' => 'West Bromwich Albion',
        'WHU' => 'West Ham'
    ];
    $i = 0;
    $squadCount = count($squads);
    foreach ($squads as $abbrev => $name) {
        $i++;
        $position = $i;
        $previous = ($squadCount+1) - $position;
        printf(
            '<tr class="%s">
                <td>%d</td>
                <td class="previous">%d</td>
                <td class="teamName">%s</td>
                <td>31</td>
                <td>29</td>
                <td>23</td>
                <td>19</td>
                <td>17</td>
                <td>13</td>
                <td>11</td>
                <td>7</td>
            <tr>',
            $abbrev,
            $position,
            $previous,
            $name
        );
    }
    ?>
    </tbody>
</table>
</body>
</html>