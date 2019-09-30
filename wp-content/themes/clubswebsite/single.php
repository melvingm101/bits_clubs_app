<?php

/**
 * Template Name: Single Post
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
get_header();
?>

<section class="ml-3 mr-3" style="padding-top: 10%;">
       
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="card border-dark mb-3">
            <div class="card-body" id="bodyYo" style="background: linear-gradient(to left, #8e9eab, #eef2f3);
    color: black;">
                <div class="float-sm-right">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large', ['class' => 'mw-100', 'style' => 'height: auto;']);
                } 
                ?>
                </div>
                
                <h4 class="card-title" style="font-family: 'Montserrat', sans-serif;"><strong><?php the_title(); ?></strong></h4>
                <p class="card-text"><?php the_content(); ?></p>
            </div>
        </div>
        
        <?php endwhile; else : ?>
	        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        
        
    </section>



<?php get_footer() ?>
