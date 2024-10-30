<?php

/**
 * Logs a message or variable to the WordPress debug log.
 *
 * @param mixed $data The data to log.
 * @param string $title Optional title for the log entry.
 */
function debug_log($data, $title = 'Debug Log') {
    if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
        $output = "\n\n$title:\n" . print_r($data, true);
        error_log($output);
    }
}

/**
 * Outputs debug information to the browser's console.
 *
 * @param mixed $data The data to send to the console.
 * @param string $title Optional title for the console entry.
 */
function debug_console($data, $title = 'Console Debug') {
    echo "<script>console.log(" . json_encode($title . ': ' . print_r($data, true)) . ");</script>";
}

/**
 * Logs the backtrace of function calls.
 *
 * @param string $title Optional title for the backtrace log.
 */
function debug_backtrace_log($title = 'Function Call Backtrace') {
    if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $output = "\n\n$title:\n" . print_r($backtrace, true);
        error_log($output);
    }
}

/**
 * Logs the current memory usage.
 *
 * @param string $title Optional title for the memory usage log.
 */
function debug_memory_usage($title = 'Memory Usage') {
    $memoryUsage = memory_get_usage();
    $memoryUsageFormatted = number_format($memoryUsage / 1024, 2) . ' KB';
    debug_log("{$title}: {$memoryUsageFormatted}");
}

/**
 * Tracks the start time of a code block.
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
 * @param string $title Optional title for the execution time log.
 */
function debug_execution_time($startTime, $title = 'Execution Time') {
    $executionTime = microtime(true) - $startTime;
    debug_log("{$title}: {$executionTime} seconds");
}

/**
 * Logs information about a specific user or the current logged-in user.
 *
 * @param mixed $value Optional. User ID or email to lookup a specific user.
 * @param string $flag Optional. Set to 'email' if the $value is an email.
 */
function debug_user_info($value = null, $flag = null) {
    $user = null;

    // Check if specific user details are requested
    if ($value) {
        if ($flag === 'email') {
            $user = get_user_by('email', $value);
        } else {
            $user = get_user_by('id', $value);
        }
    } else {
        // Get current logged-in user if no parameters are provided
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
        }
    }

    if ($user && !is_wp_error($user)) {
        // Prepare user information for logging
        $userInfo = [
            'ID' => $user->ID,
            'Username' => $user->user_login,
            'Email' => $user->user_email,
            'Roles' => $user->roles
        ];
        debug_log($userInfo, 'User Info');
    } else {
        // Log message if no user is found or not logged in
        debug_log('User not found or no user is logged in', 'User Info');
    }
}


/**
 * Logs HTTP requests and response time.
 *
 * @param string $url The request URL.
 * @param array $args The request arguments.
 * @return array|WP_Error The response or error from the request.
 */
function debug_http_request($url, $args = []) {
    $start = debug_start_timer();
    $response = wp_remote_get($url, $args);

    $executionTime = microtime(true) - $start;
    $statusCode = is_wp_error($response) ? 'Error' : wp_remote_retrieve_response_code($response);
    $message = [
        'URL' => $url,
        'Status' => $statusCode,
        'Execution Time' => "{$executionTime} seconds"
    ];

    debug_log($message, 'HTTP Request Log');
    return $response;
}

/**
 * Logs the last database query executed by WordPress.
 */
function debug_query_log() {
    global $wpdb;
    $query = $wpdb->last_query;
    $queryTime = $wpdb->timer_stop();
    debug_log("Last Query: {$query}\nExecution Time: {$queryTime} seconds", 'Database Query Log');
}
