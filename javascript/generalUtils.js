// generalUtils.js

/**
 * Formats a date to a specified string format.
 * 
 * @param {Date} date - The date to format.
 * @param {string} format - The format string (e.g., "YYYY-MM-DD").
 * @returns {string} - The formatted date string.
 */
export function formatDate(date, format = 'YYYY-MM-DD') {
    const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit'
    };
    return new Intl.DateTimeFormat('en-GB', options).format(date);
}

/**
 * Generates a random integer between min and max.
 * 
 * @param {number} min - The minimum integer.
 * @param {number} max - The maximum integer.
 * @returns {number} - A random integer between min and max.
 */
export function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Checks if a value is empty (null, undefined, empty array, or empty object).
 * 
 * @param {any} value - The value to check.
 * @returns {boolean} - True if the value is empty, false otherwise.
 */
export function isEmpty(value) {
    return (
        value === null || 
        value === undefined || 
        (Array.isArray(value) && value.length === 0) ||
        (typeof value === 'object' && Object.keys(value).length === 0)
    );
}

/**
 * Debounces a function to limit how often it can execute.
 * 
 * @param {Function} func - The function to debounce.
 * @param {number} wait - The number of milliseconds to wait.
 * @returns {Function} - A debounced function.
 */
export function debounce(func, wait) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}
