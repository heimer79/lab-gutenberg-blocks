<?php
/*
Plugin Name: Lab Gutenberg Blocks
Plugin URI: http://www.ejemplo.com/mi-primer-plugin
Description: Lab of multiple plugins
Version: 1.0.0
Author: Heimer Martinez
Author URI: https://www.linkedin.com/in/wordpress-dev-tech-seo-heimer-martinez/
License: GPL2
*/

/*
Copyright YEAR Tu Nombre (email@ejemplo.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/* Register blocks and enqueue CSS */

/**
 * Function to register Gutenberg blocks
 */
function register_blocks() {
    // If Gutenberg is not available, do nothing
    if (!function_exists('register_block_type')) {
        return;
    }

    // Register block type for current register_blocks

    wp_register_script(
        'lab-editor-script', // Handle for the block script
        plugins_url('build/index.js', __FILE__), // Path to the script
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), // Dependencies
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js') // Version based on file modification time
    );

    // Editor Styles

    wp_register_style('lab-editor-styles', plugins_url('build/editor.css', __FILE__), array('wp-edit-block'), filemtime(plugin_dir_path(__FILE__) . 'build/editor.css'));


    // Frontend Styles

    wp_register_style('lab-front-end-styles', plugins_url('build/style.css', __FILE__), array(), filemtime(plugin_dir_path(__FILE__) . 'build/style.css'));


    // Blocks array 

    $blocks = array(
        'lab/testimonial', // First block
        'lab/hero', // Second block
        'lab/imagentexto', // Third block
    );

    // run blocks array and register each block with register_block_type

    foreach ($blocks as $block) {
        register_block_type($block, array(
            'editor_script' => 'lab-editor-script',
            'editor_style' => 'lab-editor-styles',
            'style' => 'lab-front-end-styles',
        ));
    }



}

/**
 * Hook to register blocks on 'init' action
 */
add_action('init', 'register_blocks');
