<?php
require(dirname(__FILE__).'/../base_script.php');

// Flow:
// - if current year need to be considered (is after february)
// - We add to the calculation the number of leap years

// After some research i got that leap years are divisible by 4 or 400 but not for 100;
// Then to get the number of leap years i get all the years that are divisible by 4,
// removed the ones that are also divisible by 100 and added the ones that are devisible for 400
function countLeapYears($date) {
    $years = $date[2];

    if ($date[1] <= 2) {
        $years--;
    }

    return ($years / 4) - ($years / 100) + ($years / 400);
}

// Flow:
// - Multiply year by 365 and add days to that account
// - Add number of days of each month
// - Sum number of leap years because foreach year we add one day
function calculateDaysFromDate($date) {
    $month_days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    $days_passed = $date[2] * 365 + $date[0];
    for ($i = 0; $i < ($date[1] - 1); $i++) {
        $days_passed += $month_days[$i];
    }

    $days_passed += countLeapYears($date);
    return $days_passed;
}

// Flow:
// - Transform string into arrays
// - Get the difference of days between the end_date and the initial_date
function calculateTimeInDays(string $end_date, string $initial_date) {
    $initial_date = explode('/', $initial_date);
    $end_date = explode('/', $end_date);

    $initial_days_passed = calculateDaysFromDate($initial_date);
    $end_days_passed = calculateDaysFromDate($end_date);

    return floor($end_days_passed - $initial_days_passed);
}


// Name | Default value
$parameters_expected = [
    'Initial date' => "12/12/2021",
    'End date' => "05/01/2022",
];

$parameters = getParameters($parameters_expected);

echo "\nCalculating days between " . $parameters_expected['End date'] . ' and ' . $parameters_expected['Initial date'];

$result = calculateTimeInDays($parameters['End date'], $parameters['Initial date']);

echo "\nNumber of days: $result";
?>