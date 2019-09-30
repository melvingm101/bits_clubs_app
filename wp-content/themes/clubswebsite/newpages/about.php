<?php

/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
get_header();
?>

<style type="text/css">
    .fly-in-text{
        list-style: none;
        text-align: center;
        margin-left: -5%;
    }
    
    .fly-in-text li{
        display: inline-block;
        color: #fff;
        font-family: 'Montserrat', Arial;
        font-size: 2em;
        font-weight: bold;
        margin-right: 10px;
        opacity: 1;
        transition: all 2.5s ease;
    }
    
    .fly-in-text li: last-child{
        margin-right: 0px;
    }
    
    .fly-in-text.hidden li{
        opacity: 0;
    }
    
    .fly-in-text.hidden li:nth-child(1){ transform: translateX(-200px) translateY(-200px);}
    .fly-in-text.hidden li:nth-child(2){ transform: translateX(-20px) translateY(10px);}
    .fly-in-text.hidden li:nth-child(3){ transform: translateX(-100px) translateY(-50px);}
    .fly-in-text.hidden li:nth-child(4){ transform: translateX(100px) translateY(70px);}
    .fly-in-text.hidden li:nth-child(5){ transform: translateX(200px) translateY(100px);}
    .fly-in-text.hidden li:nth-child(6){ transform: translateX(30px) translateY(10px);}
    .fly-in-text.hidden li:nth-child(7){ transform: translateX(-40px) translateY(-70px);}
    .fly-in-text.hidden li:nth-child(8){ transform: translateX(90px) translateY(40px);}
    .fly-in-text.hidden li:nth-child(9){ transform: translateX(-120px) translateY(-90px);}
    .fly-in-text.hidden li:nth-child(10){ transform: translateX(180px) translateY(180px);}
    
</style>

<div class="Site-content">
<div style="background: linear-gradient(to right, #000428, #004e92); height: 0px;">
    
</div>

<div style="background: linear-gradient(to right, #000428, #004e92); height: 200px; padding-top: 200px; padding-bottom: 200px;">
    <ul class="fly-in-text hidden text-center">
        <li>B</li>
        <li>I</li>
        <li>T</li>
        <li>S</li>
        <li> </li>
        <li>C</li>
        <li>L</li>
        <li>U</li>
        <li>B</li>
        <li>S</li>
    </ul>
    
    <script type="text/javascript">
        jQuery(document).ready(function(){
            setTimeout(function() {
                $('.fly-in-text').removeClass('hidden')
            }, 500);
        });
    </script>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="ml-3 mr-3 mt-3 text-center">
    <h4 style="font-family: 'Montserrat', Arial; font-weight: bold; font-size: 1.75em;">About this Website</h4>
    <div style="font-size: 1.1em;">
        <?php the_content(); ?>
    </div>
    
</div>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


</div>
<?php get_footer() ?>
