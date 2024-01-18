<?php
/*
Plugin Name: Custom Shortcodes
Description: Adds custom shortcodes for displaying date, site title, and OpenStreetMap.
Plugin URI:Custom Shortcodes
Author URI:Custom Shortcodes
Author: Shehryar javed
*/


// Shortcode to display the current date
function current_date_shortcode() {
    return date('Y-m-d');
}
add_shortcode('current_date', 'current_date_shortcode');

// Shortcode to display the site title
function site_title_shortcode() {
    return get_bloginfo('name');
}
add_shortcode('site_title', 'site_title_shortcode');

// Shortcode to display OpenStreetMap of a specified location
function openstreetmap_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'latitude' => '0',
            'longitude' => '0',
            'zoom' => '10',
        ),
        $atts,
        'openstreetmap'
    );

    $map_url = "https://www.openstreetmap.org/?mlat={$atts['latitude']}&mlon={$atts['longitude']}#map={$atts['zoom']}/{$atts['latitude']}/{$atts['longitude']}";

    return "<iframe width='100%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='{$map_url}'></iframe>";
}
add_shortcode('openstreetmap', 'openstreetmap_shortcode');




