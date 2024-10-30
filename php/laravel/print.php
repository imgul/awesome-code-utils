<?php

/**
 * Prints data in a readable format with optional title.
 *
 * @param mixed $data The data to print.
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
 * Prints a 2D array or Collection as an HTML table.
 *
 * @param array|\Illuminate\Support\Collection $data The data to display in table format.
 * @param string $title Optional. Title for the table.
 */
function print_table($data, $title = 'Table') {
    if ($data instanceof \Illuminate\Support\Collection) {
        $data = $data->toArray();
    }
    
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
        echo "<li><strong>$key:</strong> " . env($key) . "</li>";
    }
    echo "</ul><br>";
}

/**
 * Prints information about the current HTTP request.
 *
 * @param \Illuminate\Http\Request|null $request The request instance, defaults to current request.
 */
function print_request_info($request = null) {
    $request = $request ?: request();
    echo "<h2>Request Information</h2>";
    echo "<ul>";
    echo "<li><strong>URL:</strong> " . $request->fullUrl() . "</li>";
    echo "<li><strong>Method:</strong> " . $request->method() . "</li>";
    echo "<li><strong>Headers:</strong> <pre>" . print_r($request->headers->all(), true) . "</pre></li>";
    echo "</ul><br>";
}

/**
 * Prints information about the current route.
 */
function print_route_info() {
    $route = request()->route();
    
    if ($route) {
        echo "<h2>Route Information</h2>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . $route->getName() . "</li>";
        echo "<li><strong>URI:</strong> " . $route->uri() . "</li>";
        echo "<li><strong>Action:</strong> " . $route->getActionName() . "</li>";
        echo "<li><strong>Middleware:</strong> <pre>" . print_r($route->middleware(), true) . "</pre></li>";
        echo "</ul><br>";
    } else {
        echo "<p>No route information available.</p>";
    }
}

/**
 * Prints a Laravel Collection in a readable format.
 *
 * @param \Illuminate\Support\Collection $collection The collection to display.
 * @param string $title Optional. Title for the output.
 */
function print_collection($collection, $title = 'Collection Data') {
    echo "<h2>$title</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r($collection->toArray());
    echo "</pre><br>";
}

/**
 * Prints the attributes of a Laravel model instance.
 *
 * @param \Illuminate\Database\Eloquent\Model $model The model instance to display.
 * @param string $title Optional. Title for the output.
 */
function print_model_attributes($model, $title = 'Model Attributes') {
    echo "<h2>$title</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r($model->getAttributes());
    echo "</pre><br>";
}

/**
 * Prints the SQL queries executed during the request.
 */
function print_sql_queries() {
    $queries = DB::getQueryLog();
    
    if (empty($queries)) {
        echo "<p>No SQL queries executed during this request.</p>";
        return;
    }

    echo "<h2>SQL Queries</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    foreach ($queries as $query) {
        echo $query['query'] . ";\n\n";
    }
    echo "</pre><br>";
}

/**
 * Prints the contents of the Laravel session.
 */
function print_session_data() {
    echo "<h2>Session Data</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r(session()->all());
    echo "</pre><br>";
}

/**
 * Prints the contents of the Laravel cache.
 */
function print_cache_data() {
    echo "<h2>Cache Data</h2>";
    echo "<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ced4da;'>";
    print_r(Cache::getStore()->getCache()->getStats());
    echo "</pre><br>";
}