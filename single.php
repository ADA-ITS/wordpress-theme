<?php
/**
 * index.php
 * 
 * The main template
 */
?>
<?php get_header(); ?>

<!-- Main content -->
<div class="row">
        <div class="col-sm-8">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <small><?php the_time('j \d\e F \d\e Y'); ?> por <?php the_author_posts_link(); ?></small>
                <div class="entry"><?php the_content(); ?></div>
                <p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
            <?php endwhile; ?>
            <?php else: ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif;?>
        </article>
        </div>
        <div class="col-sm-4">
            <h3>Sidebar</h3>
        </div>
</div>
<?php get_footer(); ?>