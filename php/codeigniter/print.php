<?php

/**
 * Prints data in a readable format with an optional title.
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
 * Prints a 2D array as an HTML table.
 *
 * @param array $data The data to display in table format.
 * @param string $title Optional. Title for the table.
 */
function print_table($data, $title = 'Table') {
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
 * Displays a styled alert box with a message.
 *
 * @param string $message The message to display in the alert box.
 * @param string $type Optional. The type of alert ('info', 'success', 'warning', 'error').
 */
function print_alert($message, $type = 'info') {
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
 * Prints environment variables in a key-value list.
 *
 * @param array $keys Optional. Specific environment keys to display.
 */
function print_env($keys = []) {
    echo "<h2>Environment Variables</h2><ul>";
    foreach ($keys as $key) {
        echo "<li><strong>$key:</strong> " . getenv($key) . "</li>";
    }
    echo "</ul><br>";
}

/**
 * Prints information about the current HTTP request in CodeIgniter.
 *
 * @param CI_Controller $CI Optional. CodeIgniter instance.
 */
function print_request_info($CI = null) {
    if (!$CI) {
        $CI =& get_instance();
    }

    echo "<h2>Request Information</h2>";
    echo "<ul>";
    echo "<li><strong>URL:</strong> " . current_url() . "</li>";
    echo "<li><strong>Method:</strong> " . $CI->input->method() . "</li>";
    echo "<li><strong>Headers:</strong> <pre>" . print_r($CI->input->request_headers(), true) . "</pre></li>";
    echo "</ul><br>";
}

/**
 * Prints a CodeIgniter query result as a table.
 *
 * @param CI_DB_result $query The query result object.
 * @param string $title Optional. Title for the table.
 */
function print_query_table($query, $title = 'Database Query Result') {
    if (!$query || !$query instanceof CI_DB_result) {
        echo "<p>Invalid query result.</p>";
        return;
    }

    $result = $query->result_array();

    echo "<br><h2>$title</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    foreach (array_keys($result[0]) as $header) {
        echo "<th style='background: #e9ecef;'>$header</th>";
    }
    echo "</tr>";
    
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}

/**
 * Prints a CI session data in a readable format.
 *
 * @param string $title Optional. Title for the session data output.
 */
function print_session_data($title = 'Session Data') {
    $CI =& get_instance();
    $sessionData = $CI->session->all_userdata();

    echo "<br><h2>$title</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r($sessionData);
    echo "</pre><br>";
}

/**
 * Prints the configuration settings in a readable format.
 *
 * @param array $keys Optional. Specific config keys to display.
 */
function print_config($keys = []) {
    $CI =& get_instance();
    echo "<h2>Configuration Settings</h2><ul>";
    foreach ($keys as $key) {
        echo "<li><strong>$key:</strong> " . $CI->config->item($key) . "</li>";
    }
    echo "</ul><br>";
}
