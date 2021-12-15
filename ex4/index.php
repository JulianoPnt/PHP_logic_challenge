<?php
require(dirname(__FILE__).'/../base_script.php');

// Because of sorting we don't need to validate all items
function countPossibleTriangles($array) {
    $n = count($array);

    sort($array);

    $count = 0;
    $possibilities = [];
    for ($i = $n - 1; $i >= 1; $i--) {
        $left = 0;
        $right = $i - 1;
        while ($left < $right) {
            if ($array[$left] + $array[$right] > $array[$i]) {
                $count += $right - $left;

                $first_possibilitie =[$array[$left], $array[$i], $array[$right]];
                // If it's possible for $a[l] + $a[r] > $a[i] is also possible for $a[l+1] + $a[r-1] > $a[i]
                $second_possibilitie = [$array[$left + 1], $array[$i], $array[$right - 1]];

                sort($first_possibilitie);
                sort($second_possibilitie);

                $possibilities[] = $first_possibilitie;
                $possibilities[] = $second_possibilitie;

                $possibilities = array_unique($possibilities, SORT_REGULAR);

                $right--;
            } else {
                $left++;
            }
        }
    }
    return ['count' => $count, 'possibilities' => $possibilities];
}

// Name | Default value
$parameters_expected = [
    'Array Sizes' => [1,2,3,4,5,6],
];

$parameters = getParameters($parameters_expected);

$triangles = countPossibleTriangles($parameters['Array Sizes']);

echo("\n");
print_r($triangles);
?>