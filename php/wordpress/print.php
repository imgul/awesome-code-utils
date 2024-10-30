<?php

/**
 * Prints an array or object in a readable format with a title.
 *
 * @param mixed $data The data to print.
 * @param string $title The title for the data output.
 */
function print_better($data, $title = 'Data is') {
    echo "<br><br><h2>$title</h2>";
    echo "<pre style='background: #f7f7f7; padding: 10px; border: 1px solid #ddd;'>";
    print_r($data);
    echo "</pre><br><br>";
}

/**
 * Prints an associative array as an HTML table with an optional title.
 *
 * @param array $data The data to display in table format.
 * @param string $title The title for the table.
 */
function print_table($data, $title = 'Table') {
    if (empty($data) || !is_array($data) || !isset($data[0]) || !is_array($data[0])) {
        echo "<p>No data available to display in table format.</p>";
        return;
    }

    echo "<br><br><h2>$title</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%; text-align: left;'>";
    echo "<thead><tr>";
    
    // Print header row
    foreach (array_keys($data[0]) as $header) {
        echo "<th style='background: #f0f0f0;'>$header</th>";
    }
    echo "</tr></thead><tbody>";
    
    // Print data rows
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table><br><br>";
}

/**
 * Prints JSON data in a readable format with an optional title.
 *
 * @param mixed $data The data to encode as JSON and display.
 * @param string $title The title for the JSON output.
 */
function print_json($data, $title = 'JSON Data') {
    echo "<br><br><h2>$title</h2>";
    echo "<pre style='background: #f7f7f7; padding: 10px; border: 1px solid #ddd;'>";
    echo json_encode($data, JSON_PRETTY_PRINT);
    echo "</pre><br><br>";
}

/**
 * Prints an array as an HTML unordered list.
 *
 * @param array $data The data to display as a list.
 * @param string $title The title for the list.
 */
function print_html_list($data, $title = 'List') {
    if (empty($data) || !is_array($data)) {
        echo "<p>No data available to display as list.</p>";
        return;
    }

    echo "<br><br><h2>$title</h2>";
    echo "<ul style='padding-left: 20px;'>";
    foreach ($data as $item) {
        echo "<li>" . htmlspecialchars($item) . "</li>";
    }
    echo "</ul><br><br>";
}

/**
 * Prints detailed debug information about a variable.
 *
 * @param mixed $data The variable to debug.
 * @param string $title The title for the debug output.
 */
function print_debug($data, $title = 'Debug Information') {
    echo "<br><br><h2>$title</h2>";
    echo "<pre style='background: #f0f0f0; padding: 10px; border: 1px solid #ddd;'>";
    echo "Type: " . gettype($data) . "\n";
    
    if (is_string($data) || is_array($data) || is_countable($data)) {
        echo "Length: " . (is_array($data) ? count($data) : strlen($data)) . "\n";
    }

    print_r($data);
    echo "</pre><br><br>";
}

/**
 * Prints an associative array as a list of key-value pairs.
 *
 * @param array $data The associative array to display.
 * @param string $title The title for the output.
 */
function print_associative_list($data, $title = 'Key-Value List') {
    if (empty($data) || !is_array($data)) {
        echo "<p>No data available to display as key-value list.</p>";
        return;
    }

    echo "<br><br><h2>$title</h2>";
    echo "<ul style='padding-left: 20px;'>";
    foreach ($data as $key => $value) {
        echo "<li><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
    }
    echo "</ul><br><br>";
}

/**
 * Prints an alert box with a message.
 *
 * @param string $message The message to display in the alert box.
 * @param string $type The type of alert ('info', 'success', 'warning', 'error').
 */
function print_alert($message, $type = 'info') {
    $colors = [
        'info' => '#d9edf7',
        'success' => '#dff0d8',
        'warning' => '#fcf8e3',
        'error' => '#f2dede'
    ];
    $borderColor = isset($colors[$type]) ? $colors[$type] : $colors['info'];

    echo "<div style='background-color: $borderColor; padding: 10px; border: 1px solid darken($borderColor, 10%); margin: 15px 0; border-radius: 4px;'>";
    echo "<strong>" . ucfirst($type) . ":</strong> " . htmlspecialchars($message);
    echo "</div>";
}

/**
 * Prints a detailed var_dump of a variable in a readable format.
 *
 * @param mixed $data The variable to output.
 * @param string $title The title for the var_dump output.
 */
function print_var_dump($data, $title = 'Var Dump') {
    echo "<br><br><h2>$title</h2>";
    echo "<pre style='background: #f7f7f7; padding: 10px; border: 1px solid #ddd;'>";
    var_dump($data);
    echo "</pre><br><br>";
}
