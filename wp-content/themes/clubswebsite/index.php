<?php 
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */    
    
get_header(); ?>

    <div class="Site-content">
    <section class="mb-3 pb-3 pt-2">
        
        <div class="mb-2 border-dark pt-2 pb-2" style="height: 40%; background: linear-gradient(to right, #56ccf2, #2f80ed);">
            
            <div class="card-body">
                <h3 class="card-title text-center">
                    <img src="https://bitsclubs.azurewebsites.net/wp-content/uploads/2018/10/BC.svg" class="mx-auto" width="100" height="100" alt="" style="margin-top: 7.5%">
                    <p class="text-light mt-4" style="font-family: 'Montserrat', sans-serif; font-size: 1.3em;"><strong>Click here to check out the latest events!</strong></p>
                    <a class="btn btn-outline-light pl-4 pr-4 pt-2 pb-2" style="font-family: 'Montserrat', sans-serif;" href="http://bitsclubs.azurewebsites.net/events/">Check out the latest events</a>
                </h3>
                                
            </div>
            
        </div>
        
    </section>
      
    <section class="mtc ml-3 mr-3">
        <h3 class="mb-4" style="font-family: 'Montserrat', sans-serif;"><strong>Announcements</strong></h3> 
        <?php $the_query = new WP_Query( array('posts_per_page' => 3,'post__not_in'  => array( 21 ), 'category__not_in' => array( 2 ), ) ); ?>
 
       
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
 

        <div class="card mb-3 rounded-0 shadow">
            <div class="card-body" id="bodyYo" style="background: linear-gradient(to right, #7b4397, #dc2430);
    color: white;">
                <h5 class="card-title" style="font-family: 'Montserrat', sans-serif;"><strong><?php the_title(); ?></strong></h5>
                <p class="card-text" style="font-family: 'Ubuntu', sans-serif;font-size: 1.1em;"><?php the_excerpt(__('(more…)')); ?></p>
                <a href="<?php the_permalink() ?>" class="btn btn-outline-light">Check now</a>
            </div>
        </div>
        
        <?php 
            endwhile;
            wp_reset_postdata();
        ?>
        
        <a href="http://bitsclubs.azurewebsites.net/announcements/" class="pb-3">More Annoucements --></a>
    </section>
      
    <section class="mtc1 mb-5 ml-3 mr-3 mt-4">
        
            <section id="animateTest">
                <h3 class="mb-4" id="px-offset-waypoint" style="font-family: 'Montserrat', sans-serif;" id="clubs"><strong>Clubs</strong></h3> 
            </section>
            
            <div class="row">
                <div class="col-sm-6 text-center mr-0 clubCard">
                    <div class="card bg-dark text-white border-light">
                        <img src="https://bitsclubs.azurewebsites.net/wp-content/uploads/2018/10/test.svg" style="width: 100%;">
                        <div class="card-img-overlay">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 text-center clubCard">
                    <div class="card bg-dark text-dark ml-0 border-light">
                        <img src="https://bitsclubs.azurewebsites.net/wp-content/uploads/2018/10/test1.svg" style="width: 100%;">
                        <div class="card-img-overlay">
                            <h5 class="card-title"></h5>
                        </div>
                    </div>
                    
                </div>
            </div>
        
            <a class="mt-4" href="http://bitsclubs.azurewebsites.net/clubs/">Check out more clubs --></a>
            
            
    </section>
    
    </div>
      
<?php get_footer(); ?>