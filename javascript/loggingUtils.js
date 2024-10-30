// loggingUtils.js

/**
 * Logs data to the console with an optional title.
 * 
 * @param {any} data - The data to log.
 * @param {string} title - Optional title for the log entry.
 */
export function logData(data, title = 'Log') {
    console.log(`%c${title}:`, 'font-weight: bold; color: #007acc;', data);
}

/**
 * Logs a warning message to the console.
 * 
 * @param {string} message - The warning message to log.
 */
export function logWarning(message) {
    console.warn(`%cWarning: ${message}`, 'color: #e67e22; font-weight: bold;');
}

/**
 * Logs an error message to the console.
 * 
 * @param {string} message - The error message to log.
 */
export function logError(message) {
    console.error(`%cError: ${message}`, 'color: #e74c3c; font-weight: bold;');
}

/**
 * Logs information to the console with a blue color.
 * 
 * @param {string} message - The informational message to log.
 */
export function logInfo(message) {
    console.info(`%cInfo: ${message}`, 'color: #3498db; font-weight: bold;');
}
