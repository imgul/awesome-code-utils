<?php

/**
 * Prints data in a readable format with optional title.
 *
 * @param mixed $data The data to display.
 * @param string $title Optional. Title for the output.
 */
function print_pre($data, $title = 'Data Output') {
    echo "<br><h2>$title</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r($data);
    echo "</pre><br>";
}

/**
 * Prints JSON data in a formatted way.
 *
 * @param mixed $data The data to be encoded as JSON.
 * @param string $title Optional. Title for the JSON output.
 */
function print_json_pretty($data, $title = 'JSON Output') {
    echo "<br><h2>$title</h2>";
    echo "<pre style='background: #f1f3f5; padding: 10px; border: 1px solid #adb5bd;'>";
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo "</pre><br>";
}

/**
 * Prints a 2D array as a basic HTML table.
 *
 * @param array $data The 2D array to display.
 * @param string $title Optional. Title for the table.
 */
function print_table_basic($data, $title = 'Table') {
    if (empty($data) || !is_array($data) || !isset($data[0])) {
        echo "<p>No data available to display in table format.</p>";
        return;
    }

    echo "<br><h2>$title</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    foreach (array_keys($data[0]) as $header) {
        echo "<th style='background: #e9ecef;'>$header</th>";
    }
    echo "</tr>";
    
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}

/**
 * Prints an associative array as a key-value list.
 *
 * @param array $data The associative array to display.
 * @param string $title Optional. Title for the list.
 */
function print_associative_list($data, $title = 'Key-Value List') {
    if (empty($data) || !is_array($data)) {
        echo "<p>No data available to display as list.</p>";
        return;
    }

    echo "<br><h2>$title</h2>";
    echo "<ul>";
    foreach ($data as $key => $value) {
        echo "<li><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
    }
    echo "</ul><br>";
}

/**
 * Displays an alert box with a message.
 *
 * @param string $message The message to display in the alert box.
 * @param string $type Optional. Type of alert ('info', 'success', 'warning', 'error').
 */
function print_alert_box($message, $type = 'info') {
    $colors = [
        'info' => '#cce5ff',
        'success' => '#d4edda',
        'warning' => '#fff3cd',
        'error' => '#f8d7da'
    ];
    $color = isset($colors[$type]) ? $colors[$type] : $colors['info'];

    echo "<div style='background-color: $color; padding: 15px; border-radius: 5px; margin: 15px 0;'>";
    echo "<strong>" . ucfirst($type) . ":</strong> " . htmlspecialchars($message);
    echo "</div>";
}

/**
 * Prints a detailed var_dump of a variable with styling.
 *
 * @param mixed $data The variable to output.
 * @param string $title Optional. Title for the var_dump output.
 */
function print_var_dump_pre($data, $title = 'Var Dump Output') {
    echo "<br><h2>$title</h2>";
    echo "<pre style='background: #f1f3f5; padding: 10px; border: 1px solid #adb5bd;'>";
    var_dump($data);
    echo "</pre><br>";
}

/**
 * Prints a horizontal separator line.
 *
 * @param string $title Optional. Title to display above the separator.
 */
function print_separator($title = '') {
    if ($title) {
        echo "<br><h2>$title</h2>";
    }
    echo "<hr style='border: 1px solid #ddd; margin: 20px 0;'>";
}

/**
 * Prints a horizontal separator line with a message.
 *
 * @param string $message The message to display above the separator.
 */
function print_separator_with_message($message) {
    echo "<br><p>$message</p>";
    echo "<hr style='border: 1px solid #ddd; margin: 20px 0;'>";
}