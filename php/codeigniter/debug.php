<?php

/**
 * Logs debug information to CodeIgniter’s log file.
 *
 * @param mixed $data The data to log.
 * @param string $title Optional. Title for the log entry.
 */
function debug_log($data, $title = 'Debug Log') {
    log_message('debug', "{$title}:\n" . print_r($data, true));
}

/**
 * Logs a backtrace of function calls to help track the execution flow.
 *
 * @param string $title Optional. Title for the backtrace log.
 */
function debug_backtrace_log($title = 'Function Call Backtrace') {
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    log_message('debug', "{$title}:\n" . print_r($backtrace, true));
}

/**
 * Logs the current memory usage.
 *
 * @param string $title Optional. Title for the memory usage log.
 */
function debug_memory_usage($title = 'Memory Usage') {
    $memoryUsage = memory_get_usage();
    $formattedMemoryUsage = number_format($memoryUsage / 1024, 2) . ' KB';
    log_message('debug', "{$title}: {$formattedMemoryUsage}");
}

/**
 * Starts a timer to track execution time.
 *
 * @return float The start time in microseconds.
 */
function debug_start_timer() {
    return microtime(true);
}

/**
 * Logs the time taken since the start time was recorded.
 *
 * @param float $startTime The start time recorded with debug_start_timer().
 * @param string $title Optional. Title for the execution time log.
 */
function debug_execution_time($startTime, $title = 'Execution Time') {
    $executionTime = microtime(true) - $startTime;
    log_message('debug', "{$title}: {$executionTime} seconds");
}

/**
 * Logs information about the current HTTP request in CodeIgniter.
 *
 * @param CI_Controller $CI Optional. CodeIgniter instance.
 */
function debug_request_info($CI = null) {
    if (!$CI) {
        $CI =& get_instance();
    }

    $requestInfo = [
        'URL' => current_url(),
        'Method' => $CI->input->method(),
        'Headers' => $CI->input->request_headers(),
        'Input' => $CI->input->raw_input_stream
    ];
    log_message('debug', "Request Info:\n" . print_r($requestInfo, true));
}

/**
 * Logs information about the last executed SQL query.
 *
 * @param CI_DB $db Optional. Database instance.
 */
function debug_last_query($db = null) {
    if (!$db) {
        $CI =& get_instance();
        $db = $CI->db;
    }
    $lastQuery = $db->last_query();
    log_message('debug', "Last SQL Query: {$lastQuery}");
}

/**
 * Logs details of all SQL queries made during the request (requires CodeIgniter's `enable_query_strings`).
 *
 * @param CI_DB $db Optional. Database instance.
 */
function debug_query_log($db = null) {
    if (!$db) {
        $CI =& get_instance();
        $db = $CI->db;
    }

    if (empty($db->queries)) {
        log_message('debug', "No SQL queries were executed.");
    } else {
        log_message('debug', "SQL Query Log:\n" . print_r($db->queries, true));
    }
}

/**
 * Logs information about the current user’s session data.
 *
 * @param string $title Optional. Title for the session data log.
 */
function debug_session_data($title = 'Session Data') {
    $CI =& get_instance();
    $sessionData = $CI->session->all_userdata();
    log_message('debug', "{$title}:\n" . print_r($sessionData, true));
}

/**
 * Logs specific environment variables, helpful for debugging configuration issues.
 *
 * @param array $keys Optional. Array of environment variable keys to log.
 */
function debug_env_variables($keys = []) {
    $envData = [];
    foreach ($keys as $key) {
        $envData[$key] = getenv($key) ?: 'Not Set';
    }
    log_message('debug', "Environment Variables:\n" . print_r($envData, true));
}

/**
 * Logs information about the current route, such as URI and method.
 */
function debug_route_info() {
    $CI =& get_instance();
    $routeInfo = [
        'URI' => $CI->uri->uri_string(),
        'Method' => $CI->input->method()
    ];
    log_message('debug', "Route Info:\n" . print_r($routeInfo, true));
}

/**
 * Logs the last PHP error, if any.
 */
function debug_last_error() {
    $error = error_get_last();
    if ($error) {
        log_message('error', "Last PHP Error:\n" . print_r($error, true));
    } else {
        log_message('debug', "No PHP errors detected.");
    }
}
