<?php 
/**
 * Plugin Name: Custom Asets Management Plugin
 * Plugin URI: https://example.com
 * Description: A simple plugin to display related posts with custom taxonomy.
 * Version: 2.0
 * Author: Firoz mahmud
 * Author URI: https://example.com
 * License: GPL2
 */
 if(!defined('ABSPATH')) {
    exit;
 }

 class Assets_Management_Plugin{

    private static $instance;

    public static function get_instance(){
        if(!self:: $instance){
            self::$instance = new self();
        }
        return self:: $instance;
    }

    private function __construct(){
        $this->require_classes();
    }

    public function require_classes(){

        require_once __DIR__ . '/includes/we_assets_management.php';

        new Wedevs_We_Assets_Management();
    }
 }

 Assets_Management_Plugin::get_instance();