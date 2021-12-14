<?php
require(dirname(__FILE__).'/../base_script.php');

// Flow:
// - store last item
// - go descending to all items and moving it one position up
// - add last item to first item
function rotateArray(array $array, $k) {
    for ($i = 0; $i < $k; $i++) {
        $array_size = count($array)-1;
        $last_item = $array[$array_size];

        for ($j = $array_size; $j > 0; $j--) {
            $array[$j] = $array[$j-1];
        }
        $array[0] = $last_item;
    }
    return $array;
}

// Name | Default value
$parameters_expected = [
    'Array to rotate' => [1,2,3,4,5],
    'k' => 2,
];

$parameters = getParameters($parameters_expected);

echo "\n";
echo 'Rotating array '. implode(',', $parameters['Array to rotate']) . ' in ' . $parameters['k'] . ' positions';

$rotated_array = rotateArray($parameters['Array to rotate'], $parameters['k']);

echo "\n";
echo "Rotated array: \n";
print_r($rotated_array);

?>