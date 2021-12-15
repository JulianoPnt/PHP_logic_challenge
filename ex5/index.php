<?php
require(dirname(__FILE__).'/../base_script.php');

// The idea is to run a loop from the start to end for every index possible ( stringSize - subStringSize )
// We don't need to check index after this range because it won't be possible to contain substring
function checkSubstring($sub, $string) {
    $sub_size = strlen($sub);
    $string_size = strlen($string);

    for ($i = 0; $i <= $string_size - $sub_size; $i++)
    {
        $j = 0;

        for (; $j < $sub_size; $j++)
            if ($string[$i + $j] != $sub[$j])
                break;

        if ($j == $sub_size)
            return $i;
    }

    return -1;
}

// Name | Default value
$parameters_expected = [
    'Text' => "I don't know what to write here",
    'Substring' => "what",
];

$parameters = getParameters($parameters_expected);

echo("\nChecking if " . $parameters['Substring'] . " is part of " . $parameters['Text']);

$sub_string_index = checkSubstring($parameters['Substring'], $parameters['Text']);

if ($sub_string_index == -1) {
    echo("\n\"" . $parameters['Substring'] . "\" is not present inside \"" . $parameters['Text'] . "\"");
} else {
    echo("\n \"" . $parameters['Substring'] . "\" is present inside \"" . $parameters['Text'] . "\" starting at index " . $sub_string_index);
}

?>