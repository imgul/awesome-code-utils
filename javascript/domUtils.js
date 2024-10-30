// domUtils.js

/**
 * Selects a single DOM element by a CSS selector.
 * 
 * @param {string} selector - The CSS selector.
 * @returns {Element|null} - The selected DOM element or null if not found.
 */
export function select(selector) {
    return document.querySelector(selector);
}

/**
 * Selects all DOM elements matching a CSS selector.
 * 
 * @param {string} selector - The CSS selector.
 * @returns {NodeList} - A NodeList of matched elements.
 */
export function selectAll(selector) {
    return document.querySelectorAll(selector);
}

/**
 * Adds a class to a DOM element.
 * 
 * @param {Element} element - The DOM element.
 * @param {string} className - The class to add.
 */
export function addClass(element, className) {
    if (element) element.classList.add(className);
}

/**
 * Removes a class from a DOM element.
 * 
 * @param {Element} element - The DOM element.
 * @param {string} className - The class to remove.
 */
export function removeClass(element, className) {
    if (element) element.classList.remove(className);
}

/**
 * Toggles a class on a DOM element.
 * 
 * @param {Element} element - The DOM element.
 * @param {string} className - The class to toggle.
 */
export function toggleClass(element, className) {
    if (element) element.classList.toggle(className);
}
