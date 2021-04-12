<?php
/*
* Plugin Name: myplugin
* Description: Provides new Blocks
* Version: 1.0.3
* Author: Aaron Rogers
*/

defined( 'ABSPATH' ) ||  exit;

function myplugin_register_blocks($attributes) {
  wp_enqueue_script(
    'myplugin-blocks-js',
    plugins_url( '/build/blocks.js',  __FILE__ ),
    array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ),
    true,
  );

  wp_enqueue_style(
    'myplugin-css',
    plugins_url( '/build/styles/myplugin.css', __FILE__ ),
  );

  register_block_type(
    'myplugin/basic',
    array(
      'editor_script' => 'myplugin-blocks-js',
      'attributes' => [
        'title' => [
          'type' => 'string',
          'default' => null
          ],
        'content' => [
          'type' => 'string',
          ]
        ],
      'render_callback' => 'myplugin_basic_render',
    ),
  );
}


function myplugin_basic_render($attributes) {
  ob_start();
  require( 'templates/basic.php');
  $output = ob_get_clean();
  return $output;
}


add_action( 'init', 'myplugin_register_blocks' );

require_once __DIR__ . '/functions.php';
