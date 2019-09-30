<?php
/**
 * Template Name: Events Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div  style="padding-top: 10%;"></div>
<div class="card border-dark" style="width: 100%;">
  <div class="card-body">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>