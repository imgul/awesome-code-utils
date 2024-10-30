# AwesomeCodeUtils

A set of utility functions for PHP, JavaScript, and CSS to streamline debugging, logging, data manipulation, and DOM manipulation.

## PHP Utilities

### Usage
1. Copy the URL of the raw Gist file:
    ```php
    $gist_url = "https://gist.githubusercontent.com/username/gist_id/raw/filename.php";
    ```

2. Fetch the content of the Gist and evaluate it
    ```php
    eval("?>" . file_get_contents($gist_url));
    ```

## JavaScript Utilities

### Usage
1. Copy the URLs of the raw Gist files for each JavaScript utility file:
    ```js
    const loggingUtilsUrl = "https://gist.githubusercontent.com/username/gist_id/raw/loggingUtils.js";
    const arrayUtilsUrl = "https://gist.githubusercontent.com/username/gist_id/raw/arrayUtils.js";
    const domUtilsUrl = "https://gist.githubusercontent.com/username/gist_id/raw/domUtils.js";
    const generalUtilsUrl = "https://gist.githubusercontent.com/username/gist_id/raw/generalUtils.js";
    const validationUtilsUrl = "https://gist.githubusercontent.com/username/gist_id/raw/validationUtils.js";
    ```

2. Fetch and dynamically import each utility file using JavaScript:
    ```js
    async function loadUtils() {
        const loggingUtils = await import(loggingUtilsUrl);
        const arrayUtils = await import(arrayUtilsUrl);
        const domUtils = await import(domUtilsUrl);
        const generalUtils = await import(generalUtilsUrl);
        const validationUtils = await import(validationUtilsUrl);

        // Example usage
        loggingUtils.logData("This is a test log", "Test Log");
        console.log(arrayUtils.removeDuplicates([1, 2, 2, 3]));
        // Use other utility functions as needed
    }

    loadUtils();
    ```

## CSS Utilities

### Usage
1. Copy the URL of the raw Gist file for the CSS utility file:
    ```css
    /* Example Gist URL */
    @import url("https://gist.githubusercontent.com/username/gist_id/raw/debugUtils.css");
    ```

2. Add the URL to your CSS or HTML file:
    #### In CSS File:
    ```css
    /* Place this line at the top of your CSS file */
    @import url("https://gist.githubusercontent.com/username/gist_id/raw/debugUtils.css");
    ```

    #### In HTML File:
    ```html
        <!-- Place this inside the <head> tag of your HTML file -->
        <link rel="stylesheet" href="https://gist.githubusercontent.com/username/gist_id/raw/debugUtils.css">
    ```

    #### Example
    ```html
    <div class="debug-border debug-bg-yellow debug-font-bold">Debugging Element</div>
    ```
