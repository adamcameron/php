<?php
$category = array(
	'A' => array('left' => 1, 'right' => 9),
	'B' => array('left' => 2, 'right' => 4),
	'C' => array('left' => 5, 'right' => 8),
	'D' => array('left' => 6, 'right' => 7),
	'E' => array('left' => 10, 'right' => 11),
);

function createTree($category, $left = 0, $right = null) {
	$tree = array();
	foreach ($category as $cat => $range) {
		if ($range['left'] == $left + 1 && (is_null($right) || $range['right'] < $right)) {
			$tree[$cat] = createTree($category, $range['left'], $range['right']);
			$left = $range['right'];
		}
	}
	return $tree;
}

$tree = createTree($category);
//print_r($tree);

function flattenTree($tree, $parent_tree = array()) {
	$out = array();
	foreach ($tree as $key => $children) {
		$new_tree = $parent_tree;
		var_dump($new_tree);
		$new_tree[] = $key;
		if (count($children)) {
			$child_trees = flattenTree($children, $new_tree);
			foreach ($child_trees as $tree) {
				$out[] = $tree;
			}
		} else {
			$out[] = $new_tree;
		}
	}
	return $out;
}

$tree = flattenTree($tree);
print_r($tree);