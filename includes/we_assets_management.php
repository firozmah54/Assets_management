
<?php 

require_once(ABSPATH . 'wp-admin/includes/plugin.php');

class Wedevs_We_Assets_Management{

    public function __construct(){
        add_action('init', [$this, 'init'] );
    }

    public function init(){
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets'] );
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_assets']);
;
    }


    public function admin_enqueue_assets($hook){
            // Get plugin version
        $plugin_data= get_plugin_data(__FILE__);

        $plugin_varsion=$plugin_data['Version'];
         
      $asset_path= plugins_url('assets/',__FILE__);
      $js_path=$asset_path.'js/';
      $css_path=$asset_path.'css/';

      wp_enqueue_style('css_admin_style_plugin', $css_path.'admin-style.css', [], $plugin_varsion);

      // if('plugins.php' == $hook || 'themes.php' == $hook){
      //   wp_enqueue_script('acc_js_admin_plugin', $js_path.'admin1.js', ['jquery'], $plugin_varsion, true);
      // }

      /**
       * best pactice
       * @var mixed
       */
      $pages=[
        'plugins.php',
        'themes.php'
      ];
      if(in_array($hook, $pages)){
        wp_enqueue_script('acc_js_admin_plugin', $js_path.'admin1.js', ['jquery'], $plugin_varsion, true);
      }
    }

    public function enqueue_assets(){
        $plugin_data= get_plugin_data(__FILE__);

        $plugin_varsion=$plugin_data['Version'];
        
      //$  $asset_path= plugins_url('assets/',__FILE__);
        
      $asset_path =plugin_dir_url(__FILE__) .'assets/';
      $js_path=$asset_path.'js/';
        //how to load js file
      wp_enqueue_script('acc_js_plugin', $js_path.'scripts1.js', ['jquery'], $plugin_varsion, true);


      //how to load css file 
      wp_enqueue_style('acc_style_plugin', $asset_path.'css/style.css', [], $plugin_varsion);
      
        
    }

}


function dump($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}