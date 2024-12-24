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

if(!function_exists('getTemplatePositions')) {

    function getTemplatePositions($templateId, $layout, $name) {
       $getPositions = \App\Models\TemplateLayoutPositions::where('template_id', $templateId)
           ->where('layout_id', $layout)
           ->where('field_name', $name)
           ->first();

       if($getPositions)
       {
           $outDetails = [
               'left' => $getPositions->positions['left'],
               'top' => $getPositions->positions['top'],
               'scaleX' =>  $getPositions->positions['scaleX'] ?? 1,
               'scaleY' =>  $getPositions->positions['scaleY'] ?? 1,
               'text' => $getPositions->positions['text'] ?? 1,
               'angle' => $getPositions->positions['angle'] ?? 0,
               'stroke' => $getPositions->positions['stroke'] ?? null
           ];

       }else{
           $outDetails = [
             'left' => 100,
             'top' => 100,
             'scaleX' => 1,
             'scaleY' => 1,
             'text' => 'Default Text',
             'angle' => 0,
             'stroke' => null
           ];
       }


       return $outDetails;
    }
}


if(!function_exists('getSettings')) {

    function getSetting($settingSlug) {

    }
}

