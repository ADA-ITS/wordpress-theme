<?php

require_once('class-wp-bootstrap-navwalker.php');

function ada_frontend_styles() {
    wp_enqueue_style(
        'bootstrap',
        // get_theme_file_uri ( 'css/bootstrap.min.css'),
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
        array(),
        '4.1.3',
        'all'
    );
    
    wp_enqueue_style(
        'ada-theme-fonts',
        'https://fonts.googleapis.com/css?family=Ranga',
        array(),
        null
    );
    
    wp_enqueue_style(
        'ada-styles',
        get_stylesheet_uri(),
        array('bootstrap', 'ada-theme-fonts'),
        '1.0'
    );

    wp_deregister_script('jquery');

    wp_enqueue_script( 'jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '3.3.1', true);
    wp_enqueue_script( 'popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), '1.14.3', true);
    wp_enqueue_script( 'boot2','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery','popper'), '4.1.3', true);
}
add_action( 'wp_enqueue_scripts', 'ada_frontend_styles');

if( ! function_exists( 'ada_setup') ){
    function ada_setup() {
        /**
         * it's a feature that wordpress allows you to deal with different post types.
         */
        add_theme_support( 'post-formats', [
            'gallery', 'link', 'image', 'quote', 'video'
        ]);

        /**
         * Add support for automatic feed links
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Add support for post thumbnaild
         */
        add_theme_support( 'post-thumbnails' );

        /**
         * Register nav menus.
         */
        register_nav_menus(
            [
                'main-menu'     => __( 'Menú Principal', 'ada' ),
                'footer-menu'   => __( 'Menú Secundario', 'ada')
            ]
        );
    }

    // Hook
    add_action( 'after_setup_theme', 'ada_setup');
}

function paginate($pages = '', $range = 2) 
{  
    $showitems = ($range * 2) + 1;  
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
    global $wp_query; 
    $pages = $wp_query->max_num_pages;
    
    if(!$pages)
    $pages = 1; 
    }   
    
    if(1 != $pages)
    {
        echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Página</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';

        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Página '.$paged.' de '.$pages.'</span></li>';

        if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';
        
        if($paged > 1 && $showitems < $pages) 
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';
        
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
        echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
        }
        
        if ($paged < $pages && $showitems < $pages) 
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  
        
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';
        
        echo '</ul>';
        echo '</nav>';
    }
}