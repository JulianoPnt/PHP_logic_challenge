<?php
require(dirname(__FILE__).'/../base_script.php');

// Flow:
// - walk through all items
// - if mod == 0 means that's an even number
function reorderOddAndEvenArray(array $array) {
    $odd = [];
    $even = [];
    foreach ($array as $value) {
        if ($value % 2 == 0) {
            $even[] = $value;
        }
        else {
            $odd[] = $value;
        }
    }
    return ['odd' => $odd, 'even' => $even];
}


// Name | Default value
$parameters_expected = [
    'Array to reorder' => [1,2,3,4,5],
];

$parameters = getParameters($parameters_expected);

echo "\n";
echo 'Reordering array '. implode(',', $parameters['Array to reorder']);

$result = reorderOddAndEvenArray($parameters['Array to reorder']);

echo "\n";
echo "Result array: \n";
print_r($result);
