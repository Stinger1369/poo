<?php
$values = [96, 68, 33, 47, 36, 36, 73, 54, 31, 88, 63, 62, 83, 53, 85, 70, 24, 34, 56, 12, 79, 68, 47, 11, 90, 69, 33, 28];
$countValues = array_count_values($values);
$multipleValues = [];

foreach ($countValues as $value => $count) {
    if ($count >= 2) {
        $multipleValues[$value] = $count;
    }
}

$result = implode('-', array_keys($multipleValues));
echo $result; // Affiche : 21-66-39-48-81-36-45-60-87-46-24
?>