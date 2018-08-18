<?php
/*
  Plugin Name: NewsList
  Plugin URI: http://www.example.com
  Description: Plugin to listing news items on demand.
  Version: 1.0
  Author: Arun Kumar
  Author URI: http://www.example.com
 */


   add_action('admin_menu', 'my_menu_pages');
   
function my_menu_pages(){
    add_menu_page('My Page Title', 'NewsOnDemand', 'manage_options', 'newslist/news.php', 'my_menu_output' );
 
  
}
 
/**
 * Display a custom menu page
 */
function my_menu_output(){
  include 'news.php';
}

 wp_register_style ( 'mysample', plugins_url ( 'assests/css/news.css', __FILE__ ) );

  register_deactivation_hook( __FILE__, 'deactivate' );
    function deactivate() {
           
  $idObj = get_category_by_slug('news_items');
  $id = $idObj->term_id;
 wp_delete_category($id) ;

}
        

         register_activation_hook(__FILE__, array('my_menu_pages', 'insert_category'));
        
           function insert_category() {
  wp_insert_term(
    'News_items',
    'category',
    array(
      'description' => 'This is an example category created with wp_insert_term.'
      
    )
  );
}
   
  add_action( 'after_setup_theme', 'insert_category' );


?>