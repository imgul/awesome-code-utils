// validationUtils.js

/**
 * Checks if a string is a valid email.
 * 
 * @param {string} email - The email string to validate.
 * @returns {boolean} - True if valid, false otherwise.
 */
export function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

/**
 * Checks if a string is a valid URL.
 * 
 * @param {string} url - The URL string to validate.
 * @returns {boolean} - True if valid, false otherwise.
 */
export function isValidURL(url) {
    const urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
    return urlPattern.test(url);
}

/**
 * Checks if a password meets complexity requirements.
 * 
 * @param {string} password - The password string to validate.
 * @returns {boolean} - True if valid, false otherwise.
 */
export function isValidPassword(password) {
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return passwordPattern.test(password);
}

/**
 * Checks if a value is a positive integer.
 * 
 * @param {number} value - The value to check.
 * @returns {boolean} - True if the value is a positive integer, false otherwise.
 */
export function isPositiveInteger(value) {
    return Number.isInteger(value) && value > 0;
}
