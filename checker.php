$userValue = '{
    "name": "John",
    "age": 30,
    "isStudent": true,
    "phone_number": "8 (707) 288-56-23"
}';

$parsedUserValue = json_decode($userValue);

if ($parsedUserValue === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Invalid JSON data\n";
} else {
    // Check the data types of the fields
    if (isset($parsedUserValue->name) && is_string($parsedUserValue->name)) {
        echo "name is a string\n";
    }

    if (isset($parsedUserValue->age) && is_int($parsedUserValue->age)) {
        echo "age is an integer\n";
    }

    if (isset($parsedUserValue->isStudent) && is_bool($parsedUserValue->isStudent)) {
        echo "isStudent is a boolean\n";
    }

    // Check if the "phone_number" field exists and is a string
    if (isset($parsedUserValue->phone_number) && is_string($parsedUserValue->phone_number)) {
        $phoneNumber = $parsedUserValue->phone_number;

        // Remove non-numeric characters and spaces
        $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);

        if (strlen($phoneNumber) == 11) {
            $formattedNumber = "8 (" . substr($phoneNumber, 1, 3) . ") " . substr($phoneNumber, 4, 3) . "-" . substr($phoneNumber, 7, 2) . "-" . substr($phoneNumber, 9, 2);
            echo "Formatted phone number: $formattedNumber\n";
        } else {
            echo "Invalid phone number format\n";
        }
    } else {
        echo "No valid phone number field found in the JSON\n";
    }
}
