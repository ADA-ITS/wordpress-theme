<?php get_header(); ?>

<!-- CONTENT -->
<div class="row">
    <div class="col-sm-8">
        <?php 
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
          'posts_per_page' => 10,
          'paged'          => $paged
        );
        $query = new WP_query($args);
        ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <article id="post-<?=get_the_ID()?>" <?php post_class( (is_sticky()?'sticky':'') ); ?>>
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <small><?php the_time('j \d\e F \d\e Y'); ?> por <?php the_author_posts_link(); ?></small>
            <div class="entry"><?php the_excerpt(); ?></div>
            <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
        </article>
        <?php endwhile; ?>
        <?php 
            if (function_exists("paginate")) {
                paginate($query->max_num_pages);
            } 
        ?>
        <?php else: ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif;?>
    </div>
    <div class="col-sm-4">
        <h3>Sidebar</h3>
    </div>
</div>

<?php get_footer(); ?>