<?php
/*
Plugin Name: Vimeography Theme: Ealain
Plugin URI: https://vimeography.com/themes
Theme Name: Ealain
Theme URI: https://digilogue.net/
Version: 2.1
Description: Ealaín is based on the Harvestone base gallery theme that comes prepackaged with Vimeography.
Author: Darren Kearney
Author URI: https://digilogue.net
Copyright: Dave Kiss, Darren Kearney
*/

if ( ! class_exists('Vimeography_Themes_Ealain') ) {

  class Vimeography_Themes_Ealain {

    /**
     * The current version of this theme
     *
     * @var string
     */
    public $version = '2.1';


    /**
     * Include this theme in the Vimeography theme loader.
     */
    public function __construct() {
      add_action('plugins_loaded', array( $this, 'load_theme' ) );
    }


    /**
     * Has to be public so the wp actions can reach it.
     * @return [type] [description]
     */
    public function load_theme() {
      do_action('vimeography/load-addon-plugin', __FILE__);
    }

  }

  new Vimeography_Themes_Ealain;
}