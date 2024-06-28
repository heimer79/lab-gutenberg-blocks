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


// Agregar categoría de bloques personalizada
function lab_block_categories($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'lab-category',
                'title' => __('Lab Category', 'lab-gutenberg-blocks'),
                'icon'  => 'awards'
            )
        )
    );
}

// Usar el nuevo filtro block_categories_all si está disponible
if (has_filter('block_categories_all')) {
    add_filter('block_categories_all', 'lab_block_categories', 10, 2);
} else {
    add_filter('block_categories', 'lab_block_categories', 10, 2);
}

// Registrar bloques y encolar CSS
function register_blocks() {
    // Si Gutenberg no está disponible, no hacer nada
    if (!function_exists('register_block_type')) {
        return;
    }

    // Registrar el script del editor para los bloques
    wp_register_script(
        'lab-editor-script', // Identificador para el script del bloque
        plugins_url('build/index.js', __FILE__), // Ruta al script
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), // Dependencias
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js') // Versión basada en la fecha de modificación del archivo
    );

    // Estilos del editor
    wp_register_style(
        'lab-editor-styles', // Identificador para los estilos del editor
        plugins_url('build/editor.css', __FILE__), // Ruta a los estilos del editor
        array('wp-edit-block'), // Dependencias
        filemtime(plugin_dir_path(__FILE__) . 'build/editor.css') // Versión basada en la fecha de modificación del archivo
    );

    // Estilos del frontend
    wp_register_style(
        'lab-front-end-styles', // Identificador para los estilos del frontend
        plugins_url('build/style.css', __FILE__), // Ruta a los estilos del frontend
        array(), // Dependencias
        filemtime(plugin_dir_path(__FILE__) . 'build/style.css') // Versión basada en la fecha de modificación del archivo
    );

    // Array de bloques a registrar
    $blocks = array(
        'lab/testimonial', // Primer bloque
        // 'lab/hero', // Segundo bloque
        // 'lab/imagentexto', // Tercer bloque
    );

    // Recorrer el array de bloques y registrar cada bloque
    foreach ($blocks as $block) {
        register_block_type($block, array(
            'editor_script' => 'lab-editor-script',
            'editor_style' => 'lab-editor-styles',
            'style' => 'lab-front-end-styles',
        ));
    }
}

// Hook para registrar bloques en la acción 'init'
add_action('init', 'register_blocks');

