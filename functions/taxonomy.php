<?php

if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Registers a Taxonomy for a Post Type
 *
 * @param 	string 			$name
 * @param 	string 			$post_type
 * @param 	array 			$args
 * @param 	array 			$labels
 * @return 	object 			Custom_Taxonomy
 *
 * @author 	Gijs Jorissen
 * @since 	0.8
 *
 */
function register_custom_taxonomy( $name, $post_type, $args = array(), $labels = array() )
{
	$taxonomy = new Custom_Taxonomy( $name, $post_type, $args, $labels );

	return $taxonomy;
}

/**
 * Get term meta
 *
 * @param   int|string 		$term     	Can be the id or the slug of the term
 * @param   string 			$taxonomy
 * @param   string 			$key
 * @return  string
 *
 * @author 	Gijs Jorissen
 * @since 	2.5
 */
function get_custom_term_meta( $term, $taxonomy, $key = null )
{
    if( empty( $taxonomy ) || empty( $term ) ) return false;

    if( ! is_numeric( $term ) )
    {
    	$term = get_term_by( 'slug', $term, $taxonomy );
    	$term = $term->term_id;
    }

    $meta = get_option( 'term_meta_' . $taxonomy . '_' . $term );

    if( $key ) if( ! empty( $meta[$key] ) ) return $meta[$key]; else return '';

    return $meta;
}

/**
 * Get term meta
 *
 * @param   int|string 		$term     	Can be the id or the slug of the term
 * @param   string 			$taxonomy
 * @param   string 			$key
 *
 * @author 	Gijs Jorissen
 * @since 	2.5
 */
function the_custom_term_meta( $term, $taxonomy, $key = null )
{
    if( empty( $term ) || empty( $taxonomy ) ) return false;

    echo get_custom_term_meta( $term, $taxonomy, $key );
}
