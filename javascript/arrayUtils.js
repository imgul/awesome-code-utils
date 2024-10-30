// arrayUtils.js

/**
 * Removes duplicates from an array.
 * 
 * @param {Array} arr - The array to remove duplicates from.
 * @returns {Array} - A new array without duplicates.
 */
export function removeDuplicates(arr) {
    return [...new Set(arr)];
}

/**
 * Finds the intersection of two arrays.
 * 
 * @param {Array} arr1 - The first array.
 * @param {Array} arr2 - The second array.
 * @returns {Array} - An array with common elements.
 */
export function arrayIntersection(arr1, arr2) {
    return arr1.filter(item => arr2.includes(item));
}

/**
 * Finds the difference between two arrays.
 * 
 * @param {Array} arr1 - The first array.
 * @param {Array} arr2 - The second array.
 * @returns {Array} - An array of elements in arr1 that are not in arr2.
 */
export function arrayDifference(arr1, arr2) {
    return arr1.filter(item => !arr2.includes(item));
}

/**
 * Shuffles an array in random order.
 * 
 * @param {Array} arr - The array to shuffle.
 * @returns {Array} - A new array with elements shuffled.
 */
export function shuffleArray(arr) {
    return arr.slice().sort(() => Math.random() - 0.5);
}
