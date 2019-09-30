<?php

/**
 * Template Name: Home Posts Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
get_header();
?>

<section class="ml-3 mr-3 pt-5" style="padding-top: 15%;">
        <h3 class="mb-4" style="font-family: 'Montserrat', sans-serif;">Announcements</h3> 
        <?php $the_query = new WP_Query( array('post__not_in'  => array( 21 ), 'category__not_in' => array(2)) ); ?>
 
       
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
 

        <div class="card mb-3" style="font-family: 'Open Sans', sans-serif;">
            
            <div class="card-body" id="bodyYo" style=" background: linear-gradient(to right, #1488cc, #2b32b2);
    color: white;">
                <div class="float-sm-right mr-3 mb-4">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium', ['class' => 'mw-100', 'style' => 'height: auto;']);
                    } 
                    ?>
                    
                </div>
                <h4 class="card-title" style="font-family: 'Montserrat', sans-serif;"><strong><?php the_title(); ?></strong></h4>
                <p class="card-text" style="font-family: 'Quicksand', sans-serif;"><?php echo strip_tags(get_the_excerpt()); ?></p>
                <a href="<?php the_permalink() ?>" class="btn btn-outline-light">Check now</a>
            </div>
        </div>
        
        <?php 
            endwhile;
            wp_reset_postdata();
        ?>
        
        
    </section>



<?php get_footer() ?>
