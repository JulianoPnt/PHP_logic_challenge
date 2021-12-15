<?php
require(dirname(__FILE__).'/../base_script.php');

function getRectangleArea($lb, $rt) {
    return abs($lb[0] - $rt[0]) * abs($lb[1] - $rt[1]);
}

// If the x_dist or y_dist is negative, then the two rectangles do not intersect. In that case, overlapping area is 0.
function calculateOverlapArea($rect1_lb, $rect1_rt, $rect2_lb, $rect2_rt) {
    $x = 0;
    $y = 1;

    $rect1_area = getRectangleArea($rect1_lb, $rect1_rt);
    $rect2_area = getRectangleArea($rect2_lb, $rect2_rt);

    $x_dist = min($rect1_rt[$x], $rect2_rt[$x]) - max($rect1_lb[$x], $rect2_lb[$x]);
    $y_dist = min($rect1_rt[$y], $rect2_rt[$y]) - max($rect1_lb[$y], $rect2_lb[$y]);

    $intersect_area = 0;
    if($x_dist > 0 && $y_dist > 0) {
        $intersect_area = $x_dist * $y_dist;
    }
    return $intersect_area;
}

// Name | Default value
$parameters_expected = [
    // Using 4 points for 2 rectangles instead of 8 points as in the example, because it's make more sense in a cartesian plain.
    '1 Rectangle Left Bottom Point' => [1,1],
    '1 Rectangle Right Top Point' => [2,2],

    '2 Rectangle Left Bottom Point' => [1,1],
    '2 Rectangle Right Top Point' => [3,3],
];

$parameters = getParameters($parameters_expected);

$overlap = calculateOverlapArea(
    $parameters['1 Rectangle Left Bottom Point'],
    $parameters['1 Rectangle Right Top Point'],

    $parameters['2 Rectangle Left Bottom Point'],
    $parameters['2 Rectangle Right Top Point']
);

echo("\nIntersecting area: $overlap");
?>