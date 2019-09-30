<?php

/**
 * Template Name: Complaints Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 
get_header();
?>

<section class="mt-5 pb-3 pt-5">
    <div class="card mb-2 ml-3 mr-3 border-dark bg-light">
        <div class="card-body">
            
            <h3 class="card-title">
                <img src="https://bitsclubs.azurewebsites.net/wp-content/uploads/2018/10/BC.svg" class="mx-auto" width="100" height="100" alt="">
                <p>If you wish to make a complaint, click the button and fill up the details!</p>
                <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#exampleModal">
                    Add a complaint
                </button>
            </h3>
            
            
            

<!-- Modal -->


            
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complaint form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="http://bitsclubs.azurewebsites.net/complaints/?hello=true">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Topic Name</label>
                                <input type="text" name='topic' class="form-control" id="topic" placeholder="Enter topic name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Your name</label>
                                <input type="text" name='yourName' class="form-control" id="yourName" placeholder="Enter your name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Describe the issue</label>
                                <textarea name='issue' class="form-control" id="issue" rows="3" required></textarea>
                            </div>
             
                            <!--<label for="exampleFormControlFile1">Upload an image (optional)</label>
                            <input type="file" class="form-control-file mb-3" name="image" id="image">-->
                            
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                                <label class="custom-file-label" for="customFile">Upload an image (optional)</label>
                            </div>
             
             
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit" class="btn btn-primary" href='index.php?hello=true'>
                            
                            <?php if (isset($_GET['hello'])) {
                                theme_tasks();
                            }
                            
                            ?>
                            
                            <?php
                            function theme_tasks(){
                                if ( (isset($_POST['submit'])) && (strpos($_POST['yourName'], "@outlook.com")===false) ) {
        $my_post = array();
        
        $my_post['post_title']    = $_POST['topic'] . ' - By ' . $_POST['yourName'];//'My post is the bestest ever!';
        $my_post['post_content']  = $_POST['issue']; //'This is my post. Thats it. You can go now.';
        $my_post['post_status']   = 'publish';
        $my_post['post_author']   =  1;
        $my_post['post_category'] = array(2);
        // Insert the post into the database
        $pid = wp_insert_post( $my_post );
        
        $upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));
     
        $post_id = $pid; //set post id to which you need to set post thumbnail
        $filename = $upload['file'];
        $wp_filetype = wp_check_filetype($filename, null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
                    $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
                }
            }
          ?>                  
      </div>
      
    </div>
  </div>
</div>

<section class="ml-3 mr-3">
        <h3 class="mb-4" style="font-family: 'Montserrat', sans-serif;">Announcements</h3> 
        <?php $the_query = new WP_Query( array('post__not_in'  => array( 21 ), 'category__in' => array( 2 ) ) ); ?>
 
       
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
 

        <div class="card mb-3">
            
            <div class="card-body" id="bodyYo" style="background: linear-gradient(to right, #4b6cb7, #182848);
    color: white;">
                <div class="float-sm-right mr-3 mb-4">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium');
                    } 
                    ?>
                </div>
                <h4 class="card-title" style="font-family: 'Montserrat', sans-serif;"><strong><?php the_title(); ?></strong></h4>
                <p class="card-text"><?php the_excerpt(__('(more…)')); ?></p>
                <a href="<?php the_permalink() ?>" class="btn btn-outline-light">Check now</a>
            </div>
        </div>
        
        <?php 
            endwhile;
            wp_reset_postdata();
        ?>
        
        <a href="#" class="pb-3">More Annoucements --></a>
    </section>



<?php get_footer() ?>
