<?php
require __DIR__ . '/vendor/autoload.php';
require(dirname(__FILE__).'/../base_script.php');

use \Ds\Set;

class Exercise7 {
    private $max_points = 7;
    // A = 1 ... G = 7
    private $map = [
        1 => [2, 4],
        2 => [1, 3, 4, 5],
        3 => [2, 5],
        4 => [1, 2, 5, 6],
        5 => [2, 3, 4, 6, 7],
        6 => [4, 5, 7],
        7 => [5, 6],
    ];

    function validateThroughPoints($next, &$visited_positions, $desired_position) {
        foreach ($this->map[$next] as $point) {
            if (!$visited_positions->contains($point)) {
                $visited_positions->add($point);

                if ($point == $desired_position) {
                    $final_path = $visited_positions->toArray();
                    $visited_positions->clear();
                    return $final_path;
                }
                return $this->validateThroughPoints($point, $visited_positions, $desired_position);
            }
        }
    }

    function getPossiblePaths($initial_position, $desired_position) {
        $possible_paths = [];

        foreach ($this->map[$initial_position] as $path) {
            $visited_positions = new Set();
            $possible_paths[] = $this->validateThroughPoints($path, $visited_positions, $desired_position);
        }
        return $possible_paths;
    }

    function init() {
        // Name | Default value
        $parameters_expected = [
            'Initial Position' => 1,
            'Final Position' => 5,
        ];

        $parameters = getParameters($parameters_expected);

        if ($parameters['Initial Position'] < 1 || $parameters['Final Position'] > $this->max_points) {
            throw new Exception("\nInvalid Parameters (min 1, max 7)");
        }
        $possible_paths = array_filter($this->getPossiblePaths($parameters['Initial Position'], $parameters['Final Position']));

        echo("\n");
        print_r($possible_paths);
    }
}

$exercise = new Exercise7();
$exercise->init();

?>