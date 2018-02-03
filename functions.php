<?php
/* **************** Agregan los scripts **************** */
function servicios_script_enqueue(){
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/buscador.css', array(), '1.0.0', 'all');
	wp_enqueue_style('awesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');
	//js
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/asucasa.js', array(), '1.0.0', true);

	//Jquery
	wp_enqueue_script('jquery'); 
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true);
}
// Aca registramos nuestro scripts para qye lo tome nuestra pagina
add_action('wp_enqueue_scripts', 'servicios_script_enqueue' );

/* **************** Custom Post Type **************** */

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');


/* **************** Custom Post Type **************** */
/* **************** Registro de Custom Post Clientes **************** */
function asucasa_custom_type_post (){

	$labels = array(
		'name'=> 'Clientes', 
		'singular_name' => 'Cliente', 
		'add_new' => 'Add Item', 
		'all_items' => 'All Items', 
		'add_new_item' => 'Add Item', 
		'edit_item' => 'Edit Item', 
		'new_item' => 'New Item', 
		'view_item' => 'View Item', 
		'search_item' => 'Search Clientes', 
		'not_found' => 'No Items Found', 
		'not_found_in_trash' => 'No Items found in Trash', 
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels, 
		'public' => true, 
		'has_archive' => true, 
		'publicly_queryable' => true, 
		'query_var' => true, 
		'rewrite' => true, 
		'capability_type' => 'post', 
		'hierarchical' => false, 
		'supports' => array(
			'title', 'editor', 'excerpt', 'thumbnail', 'revisions',), 
		'menu_positions' => 5, 
		'exclude_from_search' => false, 
		'publicly_queryable' => true 
	);
	register_post_type('cliente', $args);
}
add_action ('init', 'asucasa_custom_type_post');
add_theme_support( 'post-thumbnails' ); 
/* **************** Fin Registro de Custom Post Clientes **************** */

/* **************** Taxonomias para Post Clientes **************** */
// Taxonomia Localidad
function asucasa_localidad_taxonomies() {
	$labels = array('name' => 'Localidad', 'singular_names' => 'Localidad', 'search_term' => 'Search Types', 'all_types' => 'All Types', 'parent_item' => 'Parent Items', 'parent_item_colon' => 'Parent Type:', 'edit_item' => 'Edit Item', 'update_item' => 'Update Type', 'add_new_item' => 'Add New Item', 'new_item_name' => 'New Type Name', 'menu_name' => 'Localidad');
 	$args = array('hierarchical' => true, 'labels' => $labels, 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => array('slug' => 'localidad') );
	register_taxonomy('localidad', array('cliente'), $args);
}
add_action('init', 'asucasa_localidad_taxonomies');

// Taxonomia Rubro
function asucasa_rubro_taxonomies() {
	$labels = array('name' => 'Rubros', 'singular_names' => 'Rubro', 'search_term' => 'Search Types', 'all_types' => 'All Types', 'parent_item' => 'Parent Items', 'parent_item_colon' => 'Parent Type:', 'edit_item' => 'Edit Item', 'update_item' => 'Update Type', 'add_new_item' => 'Add New Item', 'new_item_name' => 'New Type Name', 'menu_name' => 'Rubros');
	$args = array('hierarchical' => true, 'labels' => $labels, 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => array('slug' => 'rubro') );
	register_taxonomy('rubro', array('cliente'), $args);
}
add_action('init', 'asucasa_rubro_taxonomies');

// Taxonomia Detalle Rubro
function asucasa_rubro_detalle_taxonomies() {
	$labels = array('name' => 'Subsector', 'singular_names' => 'Subsector', 'search_term' => 'Search Types', 'all_types' => 'All Types', 'parent_item' => 'Parent Items', 'parent_item_colon' => 'Parent Type:', 'edit_item' => 'Edit Item', 'update_item' => 'Update Type', 'add_new_item' => 'Add New Item', 'new_item_name' => 'New Type Name', 'menu_name' => 'Subsector');
	$args = array('hierarchical' => true, 'labels' => $labels, 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => array('slug' => 'subsector') );
	register_taxonomy('subsector', array('cliente'), $args);
}
add_action('init', 'asucasa_rubro_detalle_taxonomies');

/*     **************** Registro de Menus  **************** */
function asucasa_theme_setup() {
	add_theme_support('menus');
	register_nav_menu('Primary', 'Primary header navigation');
	register_nav_menu('Footer', 'Footer navigation');
}

add_action('init', 'asucasa_theme_setup');
/*     **************** Registro de Menus  **************** */

/*     **************** Funcion Sidebar  **************** */
function asucasa_widget_setup() {

	register_sidebar(
		array(
			'name' 	=> 'Sidebar',
			'id' 	=> 'sidebar-1', 
			'class' 	=> 'custom', 
			'description' => 'Sidebar Clientes', 
			'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
			'after_widget' 	=> '</aside>', 
			'before_title'	=> '<h1 class="widget-title">', 
			'after_title' 	=> '</h1>', 
		)
	);
}
add_action('widgets_init','asucasa_widget_setup');
/*     **************** Fin Funcion Sidebar  **************** */


/* Buscador*/
/*function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'cliente' )   
  {
    return locate_template('search-archive.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');  
*/


/* Dropdowns 3*/
function my_dropdown($name, $taxonomy = 'cliente')
{
    $defaults = array(
        'taxonomy' => $taxonomy,
        'id' => $name,
        'name' => $name,
        'show_option_none' => ' - Select - ',
        'selected' => get_query_var($name)
    );

    wp_dropdown_categories($defaults);
}

add_action('pre_get_posts', 'my_customsearch');
function my_customsearch($query)
{
    $tax_query = array();
    $localidad = (int) get_query_var('localidad');
    $subsector = (int) get_query_var('subsector');

    // first dropdown
    if (!empty($subsector) && $subsector > 0) {
        $tax_query[] = array(
            'taxonomy' => 'subsector',
            'field' => 'slug',
            'terms' => $subsector
        );
    }

    // second dropdown
    if (!empty($subsector) && $subsector > 0) {
        $tax_query[] = array(
            'taxonomy' => 'subsector',
            'field' => 'slug',
            'terms' => $subsector
        );
    }

    if (sizeof($tax_query) > 0) {
        $tax_query['relation'] = 'AND';
        $query->set('tax_query', $tax_query);
    }
}

// add my custom query vars
add_filter('query_vars', 'mycustom_query_vars');

function mycustom_query_vars($query_vars)
{
    $query_vars[] = 'localidad';
    $query_vars[] = 'subsector';

    return $query_vars;
}

add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of post types instead of the default 'post' post type.
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {
	if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'cliente' ) );
    }
    return $query;
}




?>