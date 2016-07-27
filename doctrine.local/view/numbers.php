<?php

foreach ($numbers as $row) {
	printf('%s: English: %s, Maori: %s%s', $row['id'], $row['en'], $row['mi'], PHP_EOL);
}