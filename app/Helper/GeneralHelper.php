<?php

if (!function_exists('format_price')) {
    /**
     * Format a number as a currency string.
     *
     * @param  float  $amount
     * @return string
     */
    function format_price($amount)
    {
        return '$' . number_format($amount, 2);
    }
}

if (!function_exists('greet_user')) {
    /**
     * Return a greeting message.
     *
     * @param  string  $name
     * @return string
     */
    function greet_user($name)
    {
        return "Hello, {$name}!";
    }
}

if (!function_exists('str_slug')) {
    /**
     * Return the URL to the user's avatar.
     *
     * @param  string  $email
     * @return string
     */
    function str_slug($string)
    {
        return str_replace(' ', '-', strtolower($string));
    }
}

if(!function_exists('removeUnderscores')) {
    /**
     * Remove all underscores from a string.
     *
     * @param  string  $string
     * @return string
     */
    function removeUnderscores($string) {
        // Replace all underscores with an empty string
        $strime = str_replace('-', '', $string);
        return $strime;
    }
}
