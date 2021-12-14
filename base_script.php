<?php

function getParameters(array $parameters_expected) {
    foreach($parameters_expected as $key => $parameter) {
        $formattedParameter = $parameter;
        if (is_array($parameter)) {
            $formattedParameter = implode(',', $parameter);
        }

        echo "Please insert the parameter ($key) ($formattedParameter): ";
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);

        if ($line !== false && !empty(trim($line))) {
            if (is_array($parameters_expected[$key])){
                $parameters_expected[$key] = explode(',', $line);
            } else {
                $parameters_expected[$key] = trim($line);
            }
        }
    }
    return $parameters_expected;
}

?>