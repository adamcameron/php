<?php

foreach ($resultSet as $row) {
	printf('ID: %s: English: %s, Maori: %s%s', $row['id'], $row['en'], $row['mi'], PHP_EOL);
}