<?php
require_once('wp-bootstrap-navwalker.php');
//add image feature to post
add_theme_support('post-thumbnails'); 
//to add css files for style
function add_theme_style(){
    wp_enqueue_style('bootstrap-css',get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awsome',get_template_directory_uri() . '/css/all.min.css');
    wp_enqueue_style('css',get_template_directory_uri() . '/css/main.css');
}

//to add js files for style
function add_theme_scripts(){
    //remove jquery from old registeration
    wp_deregister_script( 'jquery' );
    //register jquery
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'),'',false,true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js',get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,true);
    wp_enqueue_script('main-js',get_template_directory_uri() . '/js/main.js',array(),false,true);
}
//add action to add functions
add_action('wp_enqueue_scripts','add_theme_style');
add_action('wp_enqueue_scripts','add_theme_scripts');

//add menu
function custom_menu()
{
    register_nav_menus(array(
        'bootstrap menu'=>'Navigation Bar',
        'footer menu'=>'Footer Bar',

    ));
}
function bootstrap_menu()
{
    wp_nav_menu(array(
        'theme_location' =>'bootstrap menu',
        'menu_class' =>'navbar-nav ml-auto',
        'container' => false,
        'depth'  =>'2',
        'walker' => new wp_bootstrap_navwalker()
        
        ));
}
add_action('init','custom_menu');

//change the excerpet length
function custom_excerpt_length( $length ) {
    if (is_author()) {
        return 40;
    }else {
        return 80;
    }
    
}
add_filter('excerpt_length','custom_excerpt_length');
//change the excerpet dots
function custom_excerpt_more( $more ) {
	return '[.....]';
}
add_filter('excerpt_more','custom_excerpt_more' );

//pagination 
function numbering_pagination()
{
    global $wp_query;
    $allpages=$wp_query->max_num_pages;
    $current_page=max(1,get_query_var('paged'));
    if ($allpages>1) {
        return paginate_links(array(
            'base'=>get_pagenum_link().'%_%',
            'format'=>'page/%#%',
            'current'=> $current_page
        ));
    }
}